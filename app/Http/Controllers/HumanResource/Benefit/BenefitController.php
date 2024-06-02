<?php

namespace App\Http\Controllers\HumanResource\Benefit;

use App\Http\Controllers\Controller;
use App\Http\Requests\Benefit\CreateBenefitRequest;
use App\Models\HumanResource\Benefit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class BenefitController extends Controller
{
    public function index()
    {
        $benefits = Benefit::all();
        return View::make('layouts.hr.benefit.index', compact('benefits'));
    }



    public function store(CreateBenefitRequest $request)
    {

        Benefit::create($request->validated());

        return Redirect::back()->with(['success' => 'Successfully created']);
    }

    public function update(CreateBenefitREquest $request, int $benefit_id)
    {
        Benefit::findOrFail($benefit_id)->update($request->validated());

        return Redirect::back()->with(['success' => 'Successfully updated']);
    }
}