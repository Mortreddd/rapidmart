<?php

namespace App\Listeners;

use App\Events\Auth\ForgotPasswordEvent;
use App\Mail\Auth\SendForgotPasswordMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\HumanResource\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Exceptions\ExpiredTokenException;
use Carbon\Carbon;

class ForgotPasswordVerificationListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ForgotPasswordEvent $event): void
    {
        $verifiedToken = DB::table('password_reset_tokens')
            ->where('email', $event->email)
            ->where('token', $event->token)
            ->first();
        if(!$verifiedToken)
        {
            throw new Exception('Not Found');
        }
        else if(Carbon::parse($verifiedToken->created_at)->addMinutes(15)->isPast)
        {
            throw new ExpiredTokenException();
        }
        

        Employee::where('email', $event->email)->update([
            'password' => Hash::make($event->password) 
        ]);
        
        $verifiedToken->delete();
        
    }
}