<?php

namespace App\Http\Controllers\HumanResource;

use App\Http\Controllers\Controller;
use App\Models\HumanResource\Applicant;
use App\Http\Requests\Applicant\DeleteApplicantRequest;
use App\Http\Requests\Applicant\EditApplicantRequest;
use Illuminate\Support\Facades\Redirect;

class ApplicantController extends Controller
{
    public function index()
    {

        return view('layouts.hr.applicant', [
            'applicants' => Applicant::with(['position'])->orderBy('created_at')->paginate(10),
            'acceptedApplicant' => Applicant::where('status', 'Accepted')->get(),
            'pendingApplicant' => Applicant::where('status', 'Pending')->get(),
            'rejectedApplicant' => Applicant::where('status', 'Rejected')->get(),
            'applicantData' => Applicant::selectRaw('CONCAT(MONTHNAME(created_at), ", ", YEAR(created_at)) AS EachMonth, COUNT(*) AS TotalApplicants')
                    ->groupByRaw('YEAR(created_at), MONTH(created_at)')
                    ->orderby('created_at')
                    ->get()
        ]);
    }

    public function edit(EditApplicantRequest $request, $applicant_id)
    {
        Applicant::findOrFail($applicant_id)->update([
            'status' => $request->only(['status']),
            'updated_at' => now()
        ]);
        
        return Redirect::back()->with(['editted' => 'Successfully Edited Applicant']);
    }

    public function delete(DeleteApplicantRequest $request, $applicant_id)
    {
        Applicant::findOrFail($applicant_id)->delete();
        return Redirect::back()->with(['deleted' => 'Successfully deleted applicant']);
    }
}