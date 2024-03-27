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
            'allApplicants' => Applicant::all(),
            'applicantData' => Applicant::selectRaw('CONCAT(MONTHNAME(created_at), ", ", YEAR(created_at)) AS EachMonth, COUNT(*) AS TotalApplicants')
                    ->groupByRaw('YEAR(created_at), MONTH(created_at)')
                    ->orderby('created_at')
                    ->get()
        ]);
    }
    
}