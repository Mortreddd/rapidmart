<?php

namespace App\Http\Controllers\Auth;

use App\Events\Auth\ForgotPasswordEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Http\Requests\Auth\ForgotPasswordVerificationRequest;
use App\Models\HumanResource\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;


class ForgotPasswordController extends Controller
{

    public function index(Request $request, string $email, $token)
    {
        return View::make('layouts.reset-password', compact('email', 'token'));
    }
    public function verify(ForgotPasswordRequest $request)
    {
        DB::table('password_reset_tokens')->upsert([
            'email' => $request->validated(['email']),
            'token' => Str::random(60),
            'created_at' => Carbon::now()
        ],['email'], ['token', 'created_at']);

        return Redirect::back()->with(['success' => 'Password reset link sent to your email.']);
    }

    public function reset(ForgotPasswordVerificationRequest $request, string $token)
    {
        $verifiedToken = DB::table('password_reset_tokens')
            ->whereBetween('created_at', [
                    Carbon::now()->subMinutes(10), 
                    Carbon::now()
                ]
            )
            ->where('token', $token)
            ->first();
        
        if(!$verifiedToken){
            return Redirect::back()->with(['error' => 'Invalid token']);
        } 

        ForgotPasswordEvent::dispatch($verifiedToken, $request->validated(['password']));
        
        return Redirect::route('login')->with(['success' => 'Password reset successful.']);

    }
}