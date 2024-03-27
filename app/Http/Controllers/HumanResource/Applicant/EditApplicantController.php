<?php

namespace App\Http\Controllers\HumanResource\Applicant;

use App\Http\Controllers\Controller;
use App\Models\HumanResource\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Applicant\EditApplicantRequest;
use Illuminate\Support\Facades\View;

class EditApplicantController extends Controller
{
    
    public function index($applicant_id)
    {   
        $applicant = Applicant::findOrFail($applicant_id);
        return View::make('layouts.hr.partials.applicant.edit', [
            'applicant' => $applicant
        ]);

    }

    public function edit(EditApplicantRequest $request, $applicant_id)
    {
        Applicant::findOrFail($applicant_id)->update([
            'status' => $request->only(['status']),
            'updated_at' => now()
        ]);
        
        return Redirect::back()->with(['editted' => 'Successfully Edited Applicant']);
    }
}