<?php

namespace App\Listeners;

use App\Events\CancellationInterviewEvent;
use App\Mail\Appointments\ApplicantInterviewCancellationNotice;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

use Illuminate\Mail\Mailables\Address;
class InterviewCancellationListener
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
    public function handle(CancellationInterviewEvent $event): void
    {
        Mail::to($event->interview->applicant->email)
            ->send(
                new ApplicantInterviewCancellationNotice($event->interview)
            );
    }
}