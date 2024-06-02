<?php

namespace App\Http\Controllers\HumanResource\Deduction;

use App\Http\Controllers\Controller;
use App\Http\Requests\Deduction\CreateDeductionRequest;
use App\Models\HumanResource\Deduction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class DeductionController extends Controller
{
    
    public function index()
    {

        $deductions = Deduction::all();
        return View::make('layouts.hr.deduction.index', compact('deductions'));
    }

    public function store(CreateDeductionRequest $request)
    {
        Deduction::create($request->validated());


        return Redirect::back()->with(['success' => 'Successfully created']);
    }

    public function update(CreateDeductionRequest $request, int $deduction_id)
    {
        Deduction::findOrFail($deduction_id)->update($request->validated());

        return Redirect::back()->with(['success' => 'Successfully updated']);
    }
}