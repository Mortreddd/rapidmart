<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\HumanResource\Employee;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class CreatePasswordController extends Controller
{
    public function index(Request $request, int $employee_id)
    {
        $employee = Employee::findOrFail($employee_id);
        return View::make('layouts.create-password', compact('employee'));
    }

    public function create(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'employee_id' => 'required|exists:employees,id',
            'password' => 'required|confirmed|min:8',
        ])
        ->validate();
        Employee::findOrFail($validated['employee_id'])->updateOrFail([
            'password' => Hash::make($validated['password'])
        ]);


        return Redirect::route('login');
    }
}