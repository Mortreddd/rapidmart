<?php

namespace App\Http\Controllers\HumanResource\Attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\HumanResource\Attendance;
use Illuminate\Support\Facades\Redirect;
class UpdateAttendanceController extends Controller
{
    
    public function update(Request $request, int $attendance_id)
    {
        $attendance = Attendance::findOrFail($attendance_id);

        $check_in = Carbon::parse($request->input('check_in'))->format('H:i');
        $check_out = $request->has('check_out') ? Carbon::parse($request->input('check_out'))->format('H:i') : null;
        $total_hours = null;

        if ($check_out) {
            // Convert check_in and check_out to Carbon instances for time difference calculation
            $checkInTime = Carbon::parse($request->input('check_in'));
            $checkOutTime = Carbon::parse($request->input('check_out'));

            // Adjust for overnight span
            if ($checkOutTime->lessThan($checkInTime)) {
                $checkOutTime->addDay();
            }

            // Calculate the total hours worked
            $total_hours = $checkInTime->diffInHours($checkOutTime);
        }

        // Update the attendance record
        $attendance->updateOrFail([
            'check_in' => $check_in,
            'check_out' => $check_out,
            'total_hours' => $total_hours
        ]);

        // Redirect to the attendance index page with department id
        return Redirect::route('attendance.index', ['department' => 1]);
    }
}