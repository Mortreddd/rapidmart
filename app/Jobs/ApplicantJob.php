<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\HumanResource\Applicant;
use App\Models\System\Notification;
use Illuminate\Support\Facades\Auth;


class ApplicantJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    // ! EXECUTE DELETE ALL REJECTED APPLICATNS
    // ! DELETE ALL REJECTED APPLICANTS
    public function handle(): void
    {

        Applicant::withoutEvents(fn () => 
            Applicant::where('status', 'Rejected')->delete()
        );
        
        Notification::create([
            'employee_id' => Auth::id(),
            'message' => 'All rejected applicants has been deleted.',
            'status' => 'unread'
        ]);
    }
}