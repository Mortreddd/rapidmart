<?php

namespace App\Http\Controllers\HumanResource\Applicant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Applicant\DeleteApplicantRequest;
use App\Models\HumanResource\Applicant;
use Illuminate\Support\Facades\Redirect;


class DeleteApplicantController extends Controller
{


    public function __invoke($applicant_id)
    {
        Applicant::findOrFail($applicant_id)->delete();
        return Redirect::back()->with(['deleted' => 'Successfully deleted applicant']);
    }
}