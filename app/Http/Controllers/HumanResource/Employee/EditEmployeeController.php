<?php

namespace App\Http\Controllers\HumanResource\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\EditEmployeeRequest;
use App\Http\Requests\Employee\TerminationEmployeeRequest;
use App\Models\HumanResource\Employee;
use App\Models\HumanResource\Position;
use App\Services\EmployeeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class EditEmployeeController extends Controller
{
    public function __construct(
        private EmployeeService $employeeService = new EmployeeService()
    ){}
    public function index(int $employee_id)
    {
        return View::make('layouts.hr.partials.employee.edit', [
            'employee' => Employee::with(['position', 'department'])->find($employee_id),
            'positions' => Position::all(),
        ]);
    }

    public function update(EditEmployeeRequest $request, int $employee_id)
    {
        Employee::find($employee_id)->update($request->validated()); 

        return Redirect::route('employee.index')->with(['success' => 'Employee updated successfully']);
    }

    public function terminate(TerminationEmployeeRequest $request, int $employee_id)
    {
        $this->employeeService->terminateEmployee(Employee::find($employee_id), $request);

        return Redirect::route('employee.index')->with(['success' => 'Employee terminated successfully']);
    }
}