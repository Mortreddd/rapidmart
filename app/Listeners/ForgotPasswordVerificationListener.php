<?php

namespace App\Listeners;

use App\Events\Auth\ForgotPasswordEvent;
use App\Mail\Auth\SendForgotPasswordMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\HumanResource\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
        Employee::where('email', $event->verifiedToken->email)->update([
            'password' => Hash::make($event->password) 
        ]);

        Mail::to($event->verifiedToken->email)->send(
            new SendForgotPasswordMail($event->verifiedToken->email, $event->verifiedToken->token)
        );
        $event->verifiedToken->delete();
    }
}