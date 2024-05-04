<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\HumanResource\Employee;
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
        // * ADD AUTHORIZE ACCOUNT ONLY FOR SPECIFIC POSITION
        // * example : FOR HUMAN RESOURCE ONLY THOSE AUTHORIZE TO HAVE AN ACCOUNT IS 
        // * HR : HR MANAGER(1), RECRUITMENT OFFICER(2)

        // ? THERE ARE SEVERAL EMPLOYMENT STATUS FOR THE EMPLOYEE SINCE THE GOAL IS ALWAYS FILTER OUT ALL REJECTED OR TERMINATED
        // ? SINCE THIS IS UNDER THE SCOPE OF HUMAN RESOURCE MANAGEMENT THE ONLY CONCERN IS YOUR ACCOUNT FOR DEVELOPMENT
        // ? FEEL FREE TO CUSTOMIZE ON WHAT POSITION WHAT YOU WANT TO ASSIGN FOR AUTHORIZATION
        $AUTHORIZE_POSITION_IDS = [1, 2];
        if(Auth::attemptWhen(
            $request->validated(), 
            (fn (Employee $employee) => 
                in_array($employee->position_id, $AUTHORIZE_POSITION_IDS) || 
                !in_array($employee->employment_status, ['Rejected', 'Terminated'])
            ),
            $request->has('remember')
            )
        ){
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