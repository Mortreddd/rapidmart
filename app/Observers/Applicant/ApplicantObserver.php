<?php

namespace App\Observers\Applicant;

use App\Models\HumanResource\Applicant;
use App\Models\System\Notification;
use Illuminate\Support\Facades\Auth;

class ApplicantObserver
{
    /**
     * Handle the Applicant "created" event.
     */
    public function created(Applicant $applicant): void
    {
        // **
        // **   Create Notification
        // **
        Notification::create([
            'employee_id' => Auth::id(),
            'message' => 'New applicant added',
            'status' => 'unread'
        ]);


    }

    /**
     * Handle the Applicant "updated" event.
     */
    public function updated(Applicant $applicant): void
    {
        Notification::create([
            'employee_id' => Auth::id(),
            'message' => 'Applicant '.$applicant->first_name.' has been updated',
            'status' => 'unread'
        ]);
    }

    /**
     * Handle the Applicant "deleted" event.
     */
    public function deleted(Applicant $applicant): void
    {
        //
    }

    /**
     * Handle the Applicant "restored" event.
     */
    public function restored(Applicant $applicant): void
    {
        //
    }

    /**
     * Handle the Applicant "force deleted" event.
     */
    public function forceDeleted(Applicant $applicant): void
    {
        //
    }
}