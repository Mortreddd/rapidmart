<?php

namespace App\Http\Controllers\HumanResource\Leave;

use App\Http\Controllers\Controller;
use App\Http\Requests\Leave\CreateLeaveRequest;
use App\Models\HumanResource\Employee;
use App\Models\HumanResource\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class LeaveController extends Controller
{
    

    public function index()
    {
        $onLeaveEmployees = Employee::withWhereHas('leave', 
                                fn ($query) => 
                                    $query->whereNotNull('employee_id')
                                )->latest('created_at')
                                ->get();
        
        $employees = Employee::whereDoesntHave('leave')->with('position')->get();
        return View::make('layouts.hr.leave.index', compact('onLeaveEmployees', 'employees'));
    }

    public function store(CreateLeaveRequest $request)
    {
        // dd($request->all());
        // Leave::create([
        //     'employee_id' => $request->validated('employee_id'),
        //     'start_date' => $request->validated('start_date'),
        //     'end_date' => $request->validated('end_date'),
        // ]);
        Leave::create($request->validated());
        // return Redirect::route('leave.index');
        return Redirect::back();
    }
}