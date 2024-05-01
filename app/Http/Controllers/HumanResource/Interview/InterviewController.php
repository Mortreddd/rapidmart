<?php

namespace App\Http\Controllers\HumanResource\Interview;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HumanResource\Applicant;
use App\Models\HumanResource\Employee;
use App\Models\HumanResource\Interview;
use Illuminate\Support\Facades\View;

class InterviewController extends Controller
{
    public function index()
    {
        return View::make('layouts.hr.interviews.appointments', [
            'interviews' => Interview::with(['applicant', 'interviewer'])->get()
        ]);
    }

    public function store(Request $request)
    {
        
    }
}