<?php

namespace App\Http\Controllers\HumanResource\Leave;

use App\Http\Controllers\Controller;
use App\Models\HumanResource\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class LeaveController extends Controller
{
    

    public function index()
    {
        $leaves = Leave::with(['employee'])->get();

        return View::make('layouts.hr.leave.index');
    }
}