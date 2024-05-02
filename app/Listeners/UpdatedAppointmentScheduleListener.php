<?php

namespace App\Listeners;

use App\Events\RescheduleAppointmentEvent;
use App\Mail\Appointments\RescheduledAppointmentNotice;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class UpdatedAppointmentScheduleListener
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
    public function handle(RescheduleAppointmentEvent $event): void
    {
        Mail::to($event->interview->applicant->email)
            ->send(
                new RescheduledAppointmentNotice($event->interview)
            );
    }
}