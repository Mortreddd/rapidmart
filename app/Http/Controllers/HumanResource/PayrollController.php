<?php

namespace App\Http\Controllers\HumanResource;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payroll\UpdatePayrollRequest;
use App\Models\HumanResource\Department;
use App\Models\HumanResource\Payroll;
use App\Models\HumanResource\Deduction;
use App\Models\HumanResource\Benefit;
use App\Models\HumanResource\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class PayrollController extends Controller
{
    public function index(Request $request, int $department_id)
    {
        
    
        if(Carbon::now()->isSameDay(Carbon::now()->endOfMonth())){
            $employees = Employee::with('position')->withSum('attendance', 'total_hours')->get();
            foreach($employees as $employee){
                Payroll::create([
                    'employee_id' => $employee->id,
                    'benefit_id' => null,
                    'deduction_id' => null,
                    'total_salary' => $employee->position->salary_per_hour * $employee->attendance_sum_total_hours,
                    'net_pay' => $employee->position->salary_per_hour * $employee->attendance_sum_total_hours
                ]);
            }
        }

        $selectedDepartment = Department::findOrFail($department_id);
        $departments = Department::all();
        $deductions = Deduction::all();
        $benefits = Benefit::all();
        $employees = Employee::with(['payroll' => function($query) {
                        $query->whereDate('created_at', '>', Carbon::now()->startOfMonth())
                            ->whereDate('created_at', '<', Carbon::now()->endOfMonth())
                            ->where('status', 'Pending');
                    }, 'position.department', 'payroll.deduction', 'payroll.benefit'])
                    ->withSum('attendance', 'total_hours')
                    ->where('department_id', $department_id)
                    ->get();

        return View::make('layouts.hr.payroll', compact('employees', 'selectedDepartment', 'benefits', 'deductions', 'departments'));
    }


    public function update(UpdatePayrollRequest $request, int $department_id, int $payroll_id)
    {
        
        $payroll = Payroll::findOrFail($payroll_id);

        // Initialize total salary to the existing base salary
        $total_salary = $payroll->total_salary;

        // Check and update benefit_id
        if ($request->has('benefit_id') && $request->benefit_id !== null && $request->benefit_id !== '') {
            $payroll->benefit_id = $request->benefit_id;

            // Assuming you have a method to calculate the benefit amount
            $benefit_amount = $this->getBenefitAmount($request->benefit_id);
            $total_salary += $benefit_amount;
        }

        // Check and update deduction_id
        if ($request->has('deduction_id') && $request->deduction_id !== null && $request->deduction_id !== '') {
            $payroll->deduction_id = $request->deduction_id;

            // Assuming you have a method to calculate the deduction amount
            $deduction_amount = $this->getDeductionAmount($request->deduction_id);
            $total_salary -= $deduction_amount;
        }

        // Update the net pay
        $payroll->net_pay = $total_salary;
        $payroll->status = $request->status;
        // Save the updated payroll information
        $payroll->save();

        // Redirect back with a success message
        return Redirect::route('payroll.index', ['department_id' => $department_id])->with(['success' => 'Payroll updated successfully']);
    }

    // Dummy methods to get benefit and deduction amounts
    // You need to replace these with actual implementations
    private function getBenefitAmount($benefit_id)
    {
        // Your logic to get benefit amount by benefit_id
        // For example, fetching from the database
        return Benefit::find($benefit_id)->amount ?? 0;
    }

    private function getDeductionAmount($deduction_id)
    {
        // Your logic to get deduction amount by deduction_id
        // For example, fetching from the database
        return Deduction::find($deduction_id)->amount ?? 0;
    }

}