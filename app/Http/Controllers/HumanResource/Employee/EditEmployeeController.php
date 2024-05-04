<?php

namespace App\Http\Controllers\HumanResource\Employee;

use App\Http\Controllers\Controller;
use App\Models\HumanResource\Employee;
use App\Models\HumanResource\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class EditEmployeeController extends Controller
{
    public function index(int $employee_id)
    {
        return View::make('layouts.hr.partials.employee.edit', [
            'employee' => Employee::with(['position', 'department'])->find($employee_id),
            'positions' => Position::all(),
        ]);
    }

    public function update(Request $request, int $employee_id)
    {
        $employee = Employee::find($employee_id);
        $employee->update($request->validated());
        // 
    }
}