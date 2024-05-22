<?php

namespace App\Http\Controllers\HumanResource\Interview;

use App\Events\CancellationInterviewEvent;
use App\Events\RescheduleAppointmentEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Interview\UpdateInterviewScheduleRequest;
use Carbon\Carbon;
use App\Models\HumanResource\Interview;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class InterviewController extends Controller
{
    public function index()
    {
        return View::make('layouts.hr.interviews.appointments', [
            'interviews' => Interview::with(['applicant', 'interviewer'])->latest()->get()
        ]);
    }

    public function edit(UpdateInterviewScheduleRequest $request, int $interview_id)
    {
        $interview = Interview::with(['applicant'])->find($interview_id);
        $interview->update([
            'interview_date' => Carbon::createFromFormat('m-d-Y', $request->interview_date),
            'interview_time' => $request->interview_time,
            'interviewer_id' => $request->interviewer_id,
            'status' => 'Pending',
            'updated_at' => Carbon::now()
        ]);

        RescheduleAppointmentEvent::dispatch($interview);
        return Redirect::route('interview.index')->with(['success' => 'Successfully editted appointment']);
    }

    public function cancel(int $interview_id)
    {
        $interview = Interview::with(['applicant'])->find($interview_id);
        CancellationInterviewEvent::dispatch($interview);
        
        $interview->update([
            'status' => 'Cancelled'
        ]);
        $interview->applicant->update([
            'status' => 'Reject'
        ]);
        
        return Redirect::back()->with(['cancelled' => 'Successfully cancelled appointment']);
    }
}