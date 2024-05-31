<?php

namespace App\Http\Controllers\HumanResource\Attendance;

use App\Http\Controllers\Controller;
use App\Models\HumanResource\Attendance;
use App\Models\HumanResource\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CreateAttendanceController extends Controller
{
    

    public function new()
    {
        // if(Attendance::latest('date')->get()->last() === Carbon::now()->subDay()){
        //     return Redirect::back();
        // }
        $employees = Employee::with(['schedule', 'position.department'])->get();
        foreach($employees as $employee){
            Attendance::create([
                'schedule_id' => $employee->schedule->id,
                'employee_id' => $employee->id,
                'leave_id' => $employee->leave->id ?? null,
                'date' => Carbon::now(),
                'check_in' => null,
                'check_out' => null,
                'total_hours' => null,
                'created_at' => Carbon::now()
            ]);
        }

        return Redirect::route('attendance.index');
    }
}