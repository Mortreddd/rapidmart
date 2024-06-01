<?php

namespace App\Http\Controllers\HumanResource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\HumanResource\Schedule;
use App\Models\HumanResource\Department;
use App\Models\HumanResource\Position;

class ScheduleController extends Controller
{
    public function index()
    {

        // $positions = Position::with(['employees','schedule', 'department'])->get();
        $departments = Department::with(['positions.employees', 'positions.schedule'])->get();
         return View::make('layouts.hr.schedule', compact('departments'));
    }
}