<?php

namespace App\Http\Controllers\HumanResource;

use App\Http\Controllers\Controller;
use App\Models\HumanResource\Attendance;
use App\Models\HumanResource\Department;
use App\Models\HumanResource\Schedule;
use App\Models\HumanResource\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class AttendanceController extends Controller
{
    public function index(Request $request, int $department)
    {
        $employees = Employee::with(['position.schedule', 'position.department'])->get();

        $latestAttendance = Attendance::latest('date')->first();


        if ($latestAttendance && Carbon::parse($latestAttendance->date)->isYesterday()) {
            foreach ($employees as $employee) {
                Attendance::create([
                    'schedule_id' => $employee->position->schedule->id,
                    'employee_id' => $employee->id,
                    'leave_id' => $employee->leave->id ?? null,
                    'date' => Carbon::now()->startOfDay(),
                    'check_in' => null,
                    'check_out' => null,
                    'total_hours' => null,
                    'created_at' => Carbon::now()
                ]);
            }
        }

        $department_id = $department;
        $currentDateFormatted = Carbon::now()->format('Y-m-d');
        $selectedDepartment = Department::findOrFail($department_id);
        $departments = Department::all();
        $attendances = Attendance::with(['employee.position.department'])
                        ->whereDate('date', Carbon::now())
                        ->whereHas('employee', function($query) use ($department_id){
                            $query->where('department_id', $department_id);
                        })
                        ->get();

        return View::make('layouts.hr.attendance', compact('attendances', 'departments', 'selectedDepartment', 'currentDateFormatted'));
    }
} 