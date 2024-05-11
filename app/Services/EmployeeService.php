<?php 

namespace App\Services;

use App\Mail\Employee\TerminationMail;
use App\Models\HumanResource\Employee;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class EmployeeService 
{
    

    private Employee  $employee;
    public function __construct(){
        $this->employee = new Employee();
    }

    public function getEmployees()
    {
        return $this->employee::with(['position.department'])
                        ->whereNotIn('employment_status', ['Resigned', 'Terminated'])
                        ->orderBy('created_at')
                        ->paginate(50);
    }

    public function searchEmployees($request)
    {
        return $this->employee::whereNotIn('employment_status', ['Resigned', 'Terminated'])
                ->orWhere(function($query) use ($request) {
                        $query->where('last_name', 'like', "%{$request->search}%")
                            ->where('first_name', 'like', "%{$request->search}%");
                })
                ->orderBy('created_at')
                ->paginate(50);
                
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

        $this->employee::find($employee->id)->update(['status', 'Terminated']);
        
       
    }

    public function forgotPassword()
    {
        //
    }
}