<?php

namespace App\Observers\Applicant;

use App\Models\HumanResource\Applicant;

class ApplicantObserver
{
    /**
     * Handle the Applicant "created" event.
     */
    public function created(Applicant $applicant): void
    {
        //
    }

    /**
     * Handle the Applicant "updated" event.
     */
    public function updated(Applicant $applicant): void
    {
        //
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