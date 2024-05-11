<?php

namespace App\Http\Controllers\HumanResource\Interview;

use App\Events\AcceptedApplicantEvent;
use App\Events\ProcessRejectedApplicantEvent;
use App\Events\RescheduleAppointmentEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Interview\EditInterviewStatusRequest;
use App\Models\HumanResource\Applicant;
use App\Models\HumanResource\Interview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EditApplicantStatusController extends Controller
{
    public function edit(EditInterviewStatusRequest $request, int $interview_id, int $applicant_id)
    {
        Interview::findOrFail($interview_id)->update($request->validated());
        $applicant = Applicant::find($applicant_id);
        switch($request->validated('status')){
            case 'Accepted':
                $applicant->update(['status' => 'Accepted']);
                AcceptedApplicantEvent::dispatch($applicant);
                break;
            case 'Cancelled':
                $applicant->update(['status' => 'Cancelled']);
                RescheduleAppointmentEvent::dispatch($applicant);
                break;
            case 'Rejected':
                $applicant->update(['status' => 'Rejected']);
                ProcessRejectedApplicantEvent::dispatch($applicant);
                break;
            default:
                $applicant->update(['status' => 'Pending']);
                break;
        }

        
        return Redirect::route('interview.index')->with(['success' => 'Applicant status updated successfully']);
    }
}