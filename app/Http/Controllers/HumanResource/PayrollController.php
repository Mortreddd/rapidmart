<?php

namespace App\Http\Controllers\HumanResource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PayrollController extends Controller
{
    public function index()
    {

        
        return View::make('layouts.hr.payroll');
    }
}