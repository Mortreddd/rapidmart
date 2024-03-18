<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View as FacadesView;

class LoginController extends Controller
{
    
    public function index()
    {
        return view('layouts.login');
    }
    
    public function login(Request $request)
    {
        return Redirect::intended(RouteServiceProvider::HOME);
        // $credentials = $request->only(['email', 'password']);
        // if(Auth::attempt($credentials, $request->remember)){
        //     return Redirect::intended(RouteServiceProvider::HOME);
        // }   

        // return Redirect::back()->withErrors($request->messages());
    }
}