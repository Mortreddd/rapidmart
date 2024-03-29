<?php

namespace App\Http\Controllers\HumanResource\Applicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HumanResource\Applicant;
use Illuminate\Support\Facades\View;


class PendingApplicantController extends Controller
{
    public function index(Request $request)
    {
        $applicants = Applicant::with(['position'])
                ->where('status', 'Pending')
                ->latest('created_at')
                ->paginate(50);

        if($request->has('search') && $request->search != null){
            $applicants = Applicant::where('first_name', 'like', "%{$request->search}%")
                ->orWhere('last_name', 'like', "%{$request->search}%")
                ->where('status', 'Pending')
                ->latest('created_at')
                ->paginate(50);
        }

        return View::make('layouts.hr.applicants.pending', [
            'applicants' => $applicants ,
        ]);
    }
}