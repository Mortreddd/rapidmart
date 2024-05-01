<?php

namespace App\Http\Controllers\HumanResource\Applicant;

use App\Events\ProcessRejectedApplicantEvent;
use App\Http\Controllers\Controller;
use App\Jobs\ApplicantJob;
use App\Models\HumanResource\Applicant;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RejectedApplicantController extends Controller
{
    public function index(Request $request)
    {
        $applicants = Applicant::with(['position'])
                ->where('status', 'Rejected')
                ->latest('created_at')
                ->paginate(50);

        if($request->has('search') && $request->search != null){
            $applicants = Applicant::where('first_name', 'like', "%{$request->search}%")
                ->orWhere('last_name', 'like', "%{$request->search}%")
                ->where('status', 'Rejected')
                ->orderBy('created_at')
                ->paginate(50);
        }

        return View::make('layouts.hr.applicants.rejected', [
            'applicants' => $applicants ,
        ]);
    }


    public function store($applicant_id)
    {
        $applicant = Applicant::findOrFail($applicant_id);
        if(!$applicant->update([
            'status' => 'Rejected',
            'updated_at' => now()
        ])){
            return Redirect::back()->with(['error' => 'Something went wrong rejecting applicant']);
        }

        ProcessRejectedApplicantEvent::dispatch($applicant);
        if(Storage::disk('public')->exists('resumes/'.$applicant->resume) && $applicant->resume != null){
            Storage::delete('public/resumes/'.$applicant->resume);
        }
        return Redirect::back()->with(['rejected' => 'Successfully rejected applicant']);
    }

    // ! DELETE AN APPLICANT
    public function destroy($applicant_id)
    {
        $applicant = Applicant::findOrFail($applicant_id);
        // if(Storage::disk('public')->exists('resumes/'.$applicant->resume) && $applicant->resume != null){
        //     Storage::delete('public/resumes/'.$applicant->resume);
        // }
        
        $applicant->delete();
        return Redirect::back()->with(['deleted' => 'Successfully deleted an applicant']);
    }
    
    // ! CLEAR ALL METHOD
    // ! DANGER ZONE
    public function clear()
    {
        Applicant::where('status', 'Rejected')
                ->get()
                ->map(function($applicant) {
                    if(Storage::disk('public')->exists('resumes/'.$applicant->resume) && $applicant->resume != null){
                        Storage::delete('public/resumes/'.$applicant->resume);
                    }
                    $applicant->delete();
                });
        return Redirect::route('applicant.index')
            ->with('deleted', 'All rejected applicants are being deleted.');
    }
}