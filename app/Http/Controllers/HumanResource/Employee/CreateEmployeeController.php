<?php

namespace App\Http\Controllers\HumanResource\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\CreateEmployeeRequest;
use App\Models\HumanResource\Employee;
use App\Models\HumanResource\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CreateEmployeeController extends Controller
{
    public function index()
    {
        return View::make('layouts.hr.partials.employee.create', [
            'positions' => Position::all(),
        ]);
    }


    public function store(CreateEmployeeRequest $request)
    {

        $resume_name = null;
        if($request->hasFile('resume')){
            $resume_name = time().$request->first_name.$request->last_name.'.'.$request->file('resume')->extension();
            $request->file('resume')->storeAs('public/resumes', $resume_name);
        }
        $image_name = null;
        if($request->hasFile('image')){
            $image_name = time().$request->first_name.$request->last_name.'.'.$request->file('image')->extension();
            $request->file('image')->storeAs('public/images', $image_name);
        }

        
        Employee::create([
            'first_name' => Str::title($request->first_name),
            'middle_name' => Str::title($request->middle_name),
            'last_name' => Str::title($request->last_name),
            'gender' => Str::title($request->gender),
            'age' => $request->age,
            'birthday' => Carbon::createFromFormat('m-d-Y', $request->birthday),
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $image_name,
            'resume' => $resume_name,
            'position_id' => $request->position_id,
            'email_verified_at' => Carbon::now(),
            'department_id' => Position::find($request->position_id)->department_id,
            'notes' => $request->notes
        ]);


        return Redirect::route('employee.index');
    }
}