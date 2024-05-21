<?php

namespace App\Http\Controllers\HumanResource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\HumanResource\Schedule;
use App\Models\HumanResource\Department;

class ScheduleController extends Controller
{
    public function index()
    {

        $departments = Department::with(['positions.schedules', 'positions.employees'])->get();
        
        return View::make('layouts.hr.schedule', compact('departments'));
    }

    
}