<?php

namespace App\Http\Controllers\HumanResource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\HumanResource\Schedule;

class ScheduleController extends Controller
{
    public function index()
    {
        return View::make('layouts.hr.schedule', [
            'schedules' => Schedule::with(['position.department', 'posiiton.employees'])->paginate(50)
        ]);
    }

    
}