<?php 

namespace App\Services;

use App\Mail\EmployedApplicantMail;
use App\Mail\Employee\TerminationMail;
use App\Models\HumanResource\Applicant;
use App\Models\HumanResource\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EmployeeService 
{
    

    public function __construct(  
        private Employee  $employee = new Employee()
    ){}

    public function getEmployees(Request $request)
    {
        $employees = $this->employee->with(['position.department']);
        if($request->has('department') && ($request->department !== "All")){
            $employees->where('department_id', $request->department);
        }
        else if($request->department == "All"){
            $employees->where('department_id', operator: '!=', value: null);
        }
        if($request->has('search') || $request->search !== null){
            $employees->orWhere(function($query) use ($request){
                $query->where('last_name', 'like', "%{$request->search}%")
                ->orWhere('first_name', 'like', "%{$request->search}%")
                ->orWhere('email', 'like', "%{$request->search}%");
            });
        }

       
        
        return $employees;
    }

    public function terminateEmployee(Employee $employee, $request)
    {
        // Storage::delete('public/resumes/'.$employee->resume);
        
        Mail::to($employee->email)->send(
            new TerminationMail(
                $employee,
                $this->employee->find(Auth::user()->id),
                $request->validated(['reason']),
                Carbon::now()->addDays($request->validated(['remaining_days']))->format('F d, Y')
            )
        );

        $employee->updateOrFail(['employment_status' => "Terminated"]);
        
       
    }   

    public function forgotPassword()
    {
        //
    }

    public function employApplicant(Applicant $applicant, string $start_date)
    {
        // * Put the id of position allowed to have an account in here
        $employee = $this->employee::with(['position'])->create([
            'first_name' => $applicant->first_name,
            'middle_name' => $applicant->middle_name,
            'last_name' => $applicant->last_name,
            'gender' => $applicant->gender,
            'age' => $applicant->age,
            'resume' => $applicant->resume,
            'birthday' => $applicant->birthday, // '2002-03-15
            'phone' => $applicant->phone,
            'image' => null,
            'address' => $applicant->address,
            'position_id' => $applicant->position_id,
            'department_id' => $applicant->department_id,
            'email' => $applicant->email,
            'password' => null,
            'employment_status' => 'Training',
            'email_verified_at' => Carbon::now(),
            'salary' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => null,
            'notes' => $applicant->notes
        ]);

        Mail::to($applicant->email)->send(
            new EmployedApplicantMail(
                $employee,
                $start_date
            )
        );
    }
}