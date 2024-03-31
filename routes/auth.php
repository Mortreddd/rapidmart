<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HumanResource\Applicant\CreateApplicantController;
use App\Http\Controllers\HumanResource\Applicant\DeleteApplicantController;
use App\Http\Controllers\HumanResource\Applicant\EditApplicantController;
use App\Http\Controllers\HumanResource\Applicant\PendingApplicantController;
use App\Http\Controllers\HumanResource\Applicant\RejectedApplicantController;
use App\Http\Controllers\HumanResource\ApplicantController;
use App\Http\Controllers\HumanResource\EmployeeController;
use App\Http\Requests\Applicant\EditApplicantRequest;
use App\Http\Controllers\Sales\SalesReportController;
use App\Http\Controllers\Sales\CheckInventoryController;
use App\Http\Controllers\Sales\PromoInformationController;

Route::middleware(['auth'])->group( function() {
    Route::get('/', DashboardController::class)->name('home');
    
});


Route::prefix('employees')->middleware(['auth'])->group( function() {
    Route::get('/', EmployeeController::class)->name('employee.index');
});

// ?
// ? APPLICANT ROUTES
// ?
Route::prefix('applicants')->middleware(['auth'])->group( function () {
    Route::get('/', [ApplicantController::class, 'index'])->name('applicant.index');

    // * PENDING APPLICANT ROUTE
    Route::get('/pending', [PendingApplicantController::class, 'index'])->name('applicant.pending.index');

    
    Route::get('/rejected', [RejectedApplicantController::class, 'index'])->name('applicant.rejected.index');
    // ! CLEAR ALL APPLICANTS ROW ROUTE
    Route::delete('/delete/all', [RejectedApplicantController::class, 'clear'])->name('applicant.destroy.all');
    // * CREATE APPLICANT ROUTE
    Route::get('/create', [CreateApplicantController::class, 'index'])->name('applicant.store');
    Route::post('/create', [CreateApplicantController::class, 'store'])->name('applicant.verify.store');
    // ? UPDATE APPLICANT ROUTE
    Route::get('/edit/{applicant_id}', [EditApplicantController::class, 'index'])->name('applicant.view.edit');
    Route::put('/edit/{applicant_id}', [EditApplicantController::class, 'edit'])->name('applicant.edit');
    // ! DELETING APPLICANT ROUTE
    Route::delete('/delete/{applicant_id}', DeleteApplicantController::class)->name('applicant.destroy');

});

Route::prefix('sales')->middleware(['auth'])->group(function (){
    Route::get('/',[SalesReportController::class,'index'])->name('sales.salesreport.index');
    Route::get('/check-inventory',[CheckInventoryController::class,'index'])->name('sales.checkinventory.index');
    Route::get('/check-inventory/search',[CheckInventoryController::class,'search'])->name('sales.checkinventory.search');   
    Route::get('/promo',[PromoInformationController::class,'index'])->name('sales.promoinformation.index');   
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');