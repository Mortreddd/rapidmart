<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HumanResource\Applicant\CreateApplicantController;
use App\Http\Controllers\HumanResource\Applicant\DeleteApplicantController;
use App\Http\Controllers\HumanResource\Applicant\EditApplicantController;
use App\Http\Controllers\HumanResource\ApplicantController;
use App\Http\Controllers\HumanResource\EmployeeController;
use App\Http\Requests\Applicant\EditApplicantRequest;

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
    
    // * CREATE APPLICANT ROUTE
    Route::get('/create', [CreateApplicantController::class, 'index'])->name('applicant.store');
    Route::post('/create', [CreateApplicantController::class, 'store'])->name('applicant.verify.store');
    // ? UPDATE APPLICANT ROUTE
    Route::get('/edit/{applicant_id}', [EditApplicantController::class, 'index'])->name('applicant.view.edit');
    Route::put('/edit/{applicant_id}', [EditApplicantController::class, 'edit'])->name('applicant.edit');
    // ! DELETING APPLICANT ROUTE
    Route::get('/delete/{applicant_id}', [DeleteApplicantController::class, 'index'])->name('applicant.view.destroy');
    Route::delete('/delete/{applicant_id}', [ApplicantController::class, 'destroy'])->name('applicant.destroy');

});


Route::post('/logout', [LoginController::class, 'logout'])->name('logout');