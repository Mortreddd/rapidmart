<?php

namespace App\Http\Controllers\HumanResource\Applicant;

use App\Http\Controllers\Controller;
use App\Models\HumanResource\Applicant;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class AcceptedApplicantController extends Controller
{
    public function index(Request $request)
    {
        $applicants = Applicant::with(['position'])
                            ->where('status', 'Accepted')
                            ->latest()
                            ->paginate(20);

        if($request->has('search') && $request->search != null){
            $applicants = Applicant::where('first_name', 'like', "%{$request->search}%")
                ->where('last_name', 'like', "%{$request->search}%")
                ->where('status', 'Accepted')
                ->latest('created_at')
                ->paginate(20);
        }


        return View::make('layouts.hr.applicants.accepted', [
            'applicants' => $applicants
        ]);
    }
}