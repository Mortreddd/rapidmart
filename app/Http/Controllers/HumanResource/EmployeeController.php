<?php

namespace App\Http\Controllers\HumanResource;

use App\Http\Controllers\Controller;
use App\Models\HumanResource\Department;
use App\Models\HumanResource\Employee;
use App\Models\HumanResource\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;



class EmployeeController extends Controller
{
    public function __invoke(Request $request)
    {
        // Employee::groupBy('employment_status')->selectRaw('employment_status, count(*) as total')->get()->dd();
        $employees = Employee::with(['position.department'])
                        ->whereNotIn('employment_status', ['Resigned', 'Terminated'])
                        ->orderBy('created_at')
                        ->paginate(50);

        if($request->has('search') && $request->search != null){
            $employees = Employee::whereNotIn('employment_status', ['Resigned', 'Terminated'])
                ->orWhere(function($query) use ($request) {
                    $query->where('last_name', 'like', "%{$request->search}%")
                        ->where('first_name', 'like', "%{$request->search}%");
                })
                ->orderBy('created_at')
                ->paginate(50);
        }

        return View::make('layouts.hr.employee', [
            'employees' => $employees,
            'overallEmployeeCount' => Employee::count(),
            'departments' => Department::withCount(['employees'])->get(),
            'employmentStatusCounts' => Employee::groupBy('employment_status')->selectRaw('employment_status, count(*) as total')->get(),
        ]);
    }
}