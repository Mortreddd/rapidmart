<?php

namespace App\Listeners;

use App\Events\ProcessRejectedApplicantEvent;
use App\Mail\EmailRejectedApplicant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class RejectedApplicantListener
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
    public function handle(ProcessRejectedApplicantEvent $event): void
    {
        // dd($event->applicant);
        // * Send email to the rejected applicant
        Mail::to($event->applicant->email)
            ->send(
                new EmailRejectedApplicant($event->applicant)
            );
    }
} 