<?php

namespace App\Http\Controllers\HumanResource\Applicant;

use App\Http\Controllers\Controller;
use App\Models\HumanResource\Applicant;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\HumanResource\Employee;
use App\Services\EmployeeService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AcceptedApplicantController extends Controller
{

    public function __construct(
        private EmployeeService $employeeService
    ){}
    public function index(Request $request)
    {
        $applicants = Applicant::with(['position'])
                            ->where('status', 'Accepted')
                            ->latest()
                            ->paginate(20);

        if($request->has('search') && $request->search != null){
            $applicants = Applicant::where('first_name', 'like', "%{$request->search}%")
                ->orWhere('last_name', 'like', "%{$request->search}%")
                ->where('status', 'Accepted')
                ->latest('created_at')
                ->paginate(20);
        }


        return View::make('layouts.hr.applicants.accepted', [
            'applicants' => $applicants
        ]);
    }

    public function employ(Request $request, int $applicant_id)
    {

        $validated = Validator::make($request->all(), [
            'start_date' => 'required'
        ]);
        
        $applicant = Applicant::with(['position'])->findOrFail($applicant_id);

        // @return Employee
        $this->employeeService->employApplicant($applicant,  $validated->validated()['start_date']);

        return Redirect::route('applicant.accepted.index')->with(['success', 'Applicant has been employed']);
    }

    
}