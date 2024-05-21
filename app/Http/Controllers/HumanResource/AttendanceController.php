<?php

namespace App\Http\Controllers\HumanResource;

use App\Http\Controllers\Controller;
use App\Models\HumanResource\Attendance;
use App\Models\HumanResource\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AttendanceController extends Controller
{
    public function index()
    {
        
        $schedules = Schedule::with(['employees', 'position'])->get();
        return View::make('layouts.hr.attendance', compact('schedules'));
    }
}