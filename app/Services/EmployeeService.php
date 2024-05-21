<?php 

namespace App\Services;

use App\Mail\Employee\TerminationMail;
use App\Models\HumanResource\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class EmployeeService 
{
    

    public function __construct(  
        private Employee  $employee = new Employee()
    ){}

    public function getEmployees(Request $request)
    {
        $employees = $this->employee::with(['position.department'])
                        ->whereNotIn('employment_status', ['Resigned', 'Terminated'])
                        ->orderBy('created_at');


        if($request->has('department') && ($request->department != "All")){
            $employees->where('department_id', $request->department);
        }
        else if($request->department == "All"){
            $employees->where('department_id', operator: '!=', value: null);
        }
        
        
        return $employees;
    }


    public function employEmployee() {
        // return $this->employee::create
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
}