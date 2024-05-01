<?php

namespace App\Listeners;

use App\Events\AcceptedApplicantEvent;
use App\Models\HumanResource\Interview;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AcceptedApplicantListener
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
    public function handle(AcceptedApplicantEvent $event): void
    {
        $applicant = $event->applicant;

        // Interview::create([
        //     'applicant_id' => $applicant->id,
        //     'interview_date' => $applicant->interview_date,
        //     'interview_time' => $applicant->interview_time,
        //     'interview_location' => $applicant->interview_location,
        //     'interviewer' => $applicant->interviewer,
        //     'interview_status' => 'pending',
        // ]);
    }
}