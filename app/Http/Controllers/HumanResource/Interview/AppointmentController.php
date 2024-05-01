<?php

namespace App\Http\Controllers\HumanResource\Interview;

use App\Events\AppointmentCreationEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Interview\CreateInterviewRequest;
use App\Models\HumanResource\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use App\Models\HumanResource\Employee;
use App\Models\HumanResource\Interview;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    
    public function index($applicant_id)
    {   
        return View::make('layouts.hr.partials.applicant.appointment', [
            'applicant' => Applicant::find($applicant_id),
            'interviewers' => Employee::whereIn('position_id', [1, 2])->get()
        ]);

    }

    public function store(CreateInterviewRequest $request)
    {
        AppointmentCreationEvent::dispatch(
            Interview::with(['applicant.position'])->create([
                'applicant_id' => $request->applicant_id,
                'interview_date' => Carbon::createFromFormat('m-d-Y', $request->interview_date),
                'interview_time' => $request->interview_time,
                'interview_note' => $request->interview_note,
                'interviewer_id' => $request->interviewer_id
            ])
        );
        
        return Redirect::route('applicant.index')->with(['created' => 'Interview has been scheduled successfully']);
    }
}