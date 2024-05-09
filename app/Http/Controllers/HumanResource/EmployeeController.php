<?php

namespace App\Http\Controllers\HumanResource;

use App\Http\Controllers\Controller;
use App\Models\HumanResource\Department;
use App\Models\HumanResource\Employee;
use App\Models\HumanResource\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Services\EmployeeService;


class EmployeeController extends Controller
{

    private EmployeeService $employeeService;
    public function __construct()
    {
        $this->employeeService = new EmployeeService();
    }
    public function index(Request $request)
    {
        $employees = $this->employeeService->getEmployees();

        if($request->has('search') && $request->search != null){
            $employees = $this->employeeService->searchEmployees($request);
        }

        return View::make('layouts.hr.employee', [
            'employees' => $employees,
            'overallEmployeeCount' => Employee::count(),
            'departments' => Department::withCount(['employees'])->get(),
            'employmentStatusCounts' => Employee::groupBy('employment_status')->selectRaw('employment_status, count(*) as total')->get(),
        ]);
    }
}