<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


class LoginController extends Controller
{
    
    public function index()
    {
        return View::make('layouts.login');
    }
    
    public function login(LoginRequest $request)
    {
        if(Auth::attempt($request->validated(), $request->has('remember'))){
            return Redirect::intended(RouteServiceProvider::HOME);
        }   
        return Redirect::back()->with($request->messages());
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::route('login');
    }
}