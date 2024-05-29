<?php

namespace App\Http\Controllers\HumanResource;

use App\Http\Controllers\Controller;
use App\Models\HumanResource\Attendance;
use App\Models\HumanResource\Department;
use App\Models\HumanResource\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AttendanceController extends Controller
{
    public function index(Request $request, int $department)
    {
        $department_id = $department;
        $currentDateFormatted = Carbon::now()->format('Y-m-d');
        $selectedDepartment = Department::findOrFail($department_id);
        $departments = Department::all();
        $attendances = Attendance::with(['employees.position.department' => function($query) use ($department_id){
                            $query->where('id', $department_id);            
                        }, 'schedule'])
                        ->whereDate('date', '>=', Carbon::now()->subDay()->format('Y-m-d'))
                        ->get();
        return View::make('layouts.hr.attendance', compact('attendances', 'departments', 'selectedDepartment', 'currentDateFormatted'));
    }
}