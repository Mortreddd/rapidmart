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

        $selectedDepartment = Department::findOrFail($department);
        $currentDate = Carbon::now();
        if($request->has('date') || $request->date !== null ){
            $currentDate = Carbon::parse($request->date);
        }
        
        
        $departments = Department::all();
        $dateAttendances = Attendance::latest('date')->groupBy('date')->get();
        $onLeaveEmployees = Employee::whereHas('leave', function ($query) {
                            $query->whereNotNull('employee_id')
                                ->whereDate('start_date', '<=', Carbon::now())
                                ->whereDate('end_date', '>=', Carbon::now());
                        })->with(['leave' => function ($query) {
                            $query->whereNotNull('employee_id')
                                ->whereDate('start_date', '<=', Carbon::now())
                                ->whereDate('end_date', '>=', Carbon::now());
                        }])->get(['id'])
                        ->toArray();
        $attendances = Attendance::with(['employee.position.department'])
                        ->whereDate('date', $currentDate)
                        ->whereHas('employee', function($query) use ($department){
                            $query->where('department_id', $department);
                        })
                        ->get();

        return View::make('layouts.hr.attendance', compact(
            'attendances', 'departments', 'selectedDepartment', 'currentDate', 'dateAttendances', 'onLeaveEmployees'
        ));
    }
} 