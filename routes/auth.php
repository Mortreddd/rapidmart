<?php

use App\Http\Controllers\Auth\CreatePasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HumanResource\Interview\EditApplicantStatusController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HumanResource\Applicant\AcceptedApplicantController;
use App\Http\Controllers\HumanResource\Applicant\CreateApplicantController;
use App\Http\Controllers\HumanResource\Interview\AppointmentController;
use App\Http\Controllers\HumanResource\Applicant\PendingApplicantController;
use App\Http\Controllers\HumanResource\Applicant\RejectedApplicantController;
use App\Http\Controllers\HumanResource\ApplicantController;
use App\Http\Controllers\HumanResource\Attendance\UpdateAttendanceController;
use App\Http\Controllers\HumanResource\AttendanceController;
use App\Http\Controllers\HumanResource\Employee\CreateEmployeeController;
use App\Http\Controllers\HumanResource\Employee\EditEmployeeController;
use App\Http\Controllers\HumanResource\EmployeeController;
use App\Http\Controllers\HumanResource\Interview\InterviewController;
use App\Http\Controllers\HumanResource\Leave\LeaveController;
use App\Http\Controllers\HumanResource\ScheduleController;
use App\Http\Controllers\Sales\SalesReportController;
use App\Http\Controllers\Sales\CheckInventoryController;
use App\Http\Controllers\Sales\PromoInformationController;


// * CREATE A MIDDLEWARE FOR YOUR OWN PART
// * THE ROLEMIDDLEWARE IS ALREADY CONFIGURED JUST ASSIGN THE POSITIONS OR ACCESS LEVEL OF YOUR AUTHORIZED ACCOUNTS
// * role:hr IS AN EXAMPLE FOR HUMAN RESOURCE MANAGEMENT PART WHERE THE AUTHORIZED ACCOUNT ONLY IS THE HR MANAGER AND THE RECRUITER
Route::get('/employ/create-password/{employee_id}', [CreatePasswordController::class, 'index'])->name('create.password');

Route::middleware(['auth', 'verified'])->group( function() {


    Route::get('/', DashboardController::class)->name('home');
   
    Route::middleware(['role:hr'])->group(function (){
        Route::prefix('employees')->middleware(['auth'])->group(function () {
            Route::get('/', [EmployeeController::class, 'index'])->name('employee.index');
            Route::get('/edit/{employee_id}', [EditEmployeeController::class, 'index'])->name('employee.show');
            Route::put('/edit/{employee_id}', [EditEmployeeController::class, 'update'])->name('employee.update');
            Route::put('/terminate/{employee_id}', [EditEmployeeController::class, 'terminate'])->name('employee.terminate');

            Route::get('/create', [CreateEmployeeController::class, 'index'])->name('employee.create');
            Route::post('/create', [CreateEmployeeController::class, 'store'])->name('employee.store');


            Route::get('/on-leaves', [LeaveController::class, 'index'])->name('leave.index');
        });
      
        // ? APPLICANT ROUTES
        // ? http://BASE_URL/applicants
        Route::prefix('applicants')->group( function () {
            Route::get('/', ApplicantController::class)->name('applicant.index');

            Route::put('/edit/{interview_id}/{applicant_id}', [EditApplicantStatusController::class, 'edit'])->name('applicant.status.edit');
            // * ACCEPTED APPLICANT ROUTE
            Route::get('/accepted', [AcceptedApplicantController::class, 'index'])->name('applicant.accepted.index');
            Route::post('/accepted/employ/{applicant_id}', [AcceptedApplicantController::class, 'employ'])->name('applicant.employ');
            // * PENDING APPLICANT ROUTE
            Route::get('/pending', [PendingApplicantController::class, 'index'])->name('applicant.pending.index');
            Route::put('/pending/reject/{applicant_id}', [RejectedApplicantController::class, 'store'])->name('applicant.reject');
            Route::put('/pending/clear', [PendingApplicantController::class, 'clear'])->name('applicant.pending.clear');

            Route::get('/rejected', [RejectedApplicantController::class, 'index'])->name('applicant.rejected.index');
            // ! DELETE APPLICANT
            Route::delete('/rejected/delete/{applicant_id}', [RejectedApplicantController::class, 'destroy'])->name('applicant.destroy');
            // ! CLEAR ALL APPLICANTS ROW ROUTE
            // Route::delete('/rejected/delete/all', [RejectedApplicantController::class, 'clear'])->name('applicant.destroy.all');
            Route::delete('/rejected/clear', [RejectedApplicantController::class, 'clear'])->name('applicant.destroy.all');
            // * CREATE APPLICANT ROUTE
            Route::get('/create', [CreateApplicantController::class, 'index'])->name('applicant.store');
            Route::post('/create', [CreateApplicantController::class, 'store'])->name('applicant.verify.store');
            
            // ? UPDATE APPLICANT ROUTE 
            Route::get('/appoint/{applicant_id}', [AppointmentController::class, 'index'])->name('applicant.view.edit');
            Route::post('/appoint/create', [AppointmentController::class, 'store'])->name('interview.store');
            
            Route::post('/employee/{applicant_id}', [CreatePasswordController::class, 'create'])->name('employee.applicant');
            Route::post('/employ/create-password', [CreatePasswordController::class, 'store'])->name('create.password.store');
            
        });

        Route::prefix('interviews')->group(function () {
            Route::get('/', [InterviewController::class, 'index'])->name('interview.index');

            Route::get('/edit/{interview_id}', [AppointmentController::class, 'show'])->name('appointment.show');
            Route::put('/edit/{interview_id}', [InterviewController::class, 'edit'])->name('interview.edit');
            Route::put('/cancel/{interview_id}', [InterviewController::class, 'cancel'])->name('interview.cancel');
            Route::delete('/delete/{interview_id}', [AppointmentController::class, 'destroy'])->name('appointment.destroy');
            
        });

        Route::prefix('attendances')->group(function() {
            Route::get('/{department?}', [AttendanceController::class, 'index'])->name('attendance.index');

            Route::post('/update/{attendance_id}', [UpdateAttendanceController::class, 'update'])->name('attendance.update');
        });


        Route::prefix('schedules')->group(function() {
            Route::get('/', [ScheduleController::class, 'index'])->name('schedule.index');
        });
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/testing/email', fn() => view('mail.accepted-applicant'));
    
    Route::fallback(DashboardController::class);

    Route::middleware(['role:sales'])->group(function (){
        Route::prefix('sales')->group(function (){
            Route::get('/',[SalesReportController::class,'index'])->name('sales.salesreport.index');
            Route::get('/check-inventory',[CheckInventoryController::class,'index'])->name('sales.checkinventory.index');
            Route::get('/check-inventory/search',[CheckInventoryController::class,'search'])->name('sales.checkinventory.search');
            Route::get('/add-promo', [AddPromoController::class, 'index'])->name('sales.addpromo.index');
            Route::post('/add-promo', [AddPromoController::class, 'store'])->name('sales.addpromo.store');
            Route::get('/create', [RecordSalesController::class, 'create'])->name('sales.create');
            Route::post('/store', [RecordSalesController::class, 'store'])->name('sales.store');   
        });

    });
});