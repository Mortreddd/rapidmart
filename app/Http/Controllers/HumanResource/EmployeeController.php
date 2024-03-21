<?php

namespace App\Http\Controllers\HumanResource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class EmployeeController extends Controller
{
    public function __invoke()
    {
        return view('layouts.hr.employee');
    }
}