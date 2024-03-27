<?php

namespace App\Http\Controllers\HumanResource\Applicant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Applicant\DeleteApplicantRequest;
use App\Models\HumanResource\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\View;

class DeleteApplicantController extends Controller
{
    public function index($applicant_id)
    {
        $applicant = Applicant::findOrFail($applicant_id);
        return View::make('layouts.hr.partials.applicant.delete', [
            'applicant' => $applicant
        ]);
    }


    public function destroy(DeleteApplicantRequest $request, $applicant_id)
    {
        Applicant::findOrFail($applicant_id)->delete();
        return Redirect::back()->with(['deleted' => 'Successfully deleted applicant']);
    }
}