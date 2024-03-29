<?php

namespace App\Http\Controllers\HumanResource\Applicant;

use App\Events\ClearRejectedApplicantsEvent;
use App\Http\Controllers\Controller;
use App\Jobs\ApplicantJob;
use App\Models\HumanResource\Applicant;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;



class RejectedApplicantController extends Controller
{
    public function index(Request $request)
    {
        $applicants = Applicant::with(['position'])
                ->where('status', 'Rejected')
                ->latest('updated_at')
                ->paginate(50);

        if($request->has('search') && $request->search != null){
            $applicants = Applicant::where('first_name', 'like', "%{$request->search}%")
                ->orWhere('last_name', 'like', "%{$request->search}%")
                ->where('status', 'Rejected')
                ->orderBy('updated_at')
                ->paginate(50);
        }

        return View::make('layouts.hr.applicants.rejected', [
            'applicants' => $applicants ,
        ]);
    }


    // !
    // ! CLEAR ALL METHOD
    // !
    public function clear()
    {
        ApplicantJob::dispatch()
            ->delay(now()->addSeconds(30));
        return Redirect::route('applicant.index')
            ->with('deleted', 'All rejected applicants are being deleted.');
    }
}