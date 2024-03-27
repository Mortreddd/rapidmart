<?php

namespace App\Http\Controllers\HumanResource\Applicant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Applicant\CreateApplicantRequest;
use App\Models\HumanResource\Applicant;
use Illuminate\Support\Facades\View;

class CreateApplicantController extends Controller
{
    public function index()
    {
        return View::make('layouts.hr.partials.applicant.create');
    }


    public function store(CreateApplicantRequest $request)
    {
        Applicant::create($request->validated());
        
        return View::make('layouts.hr.applicant')->with(['created' => 'Successfully added applicant']);
    }
}