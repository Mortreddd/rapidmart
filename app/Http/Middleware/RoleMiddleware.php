<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if(!Auth::check()){
            return Redirect::route('login');
        }

        if(!self::checkRole($role)){
            return Redirect::route('home');
        }

        return $next($request);
        
    }

    private static function checkRole($role) : bool{
        switch ($role) {
            case 'hr':
                return Auth::user()->position_id == 1 || Auth::user()->position_id == 2;
            case 'sales':
                return Auth::user()->position_id == 5;
            default:
                return false;
        }
    }
}