<?php

namespace App\Listeners;

use App\Events\AppointmentCreationEvent;
use App\Mail\ApplicantAppointmentMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class AppointmentNoticeListener
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
    public function handle(AppointmentCreationEvent $event): void
    {
        Mail::to($event->interview->applicant->email)->send(new ApplicantAppointmentMail($event->interview));
        
    }
}