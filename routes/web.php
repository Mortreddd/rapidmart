<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HumanResource\ApplicantController;
use App\Http\Controllers\HumanResource\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// * COMMENTED FOR TESTING
Route::middleware('guest')->group( function() {
    Route::get('/login', [LoginController::class, 'index'])->name('login'); 
    Route::post('/login', [LoginController::class, 'login'])->name('login.verify');
});


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

    // * UPDATE APPLICANT ROUTE
    Route::put('/update/{applicant_id}', [ApplicantController::class, 'edit'])->name('applicant.edit');
    // ! DELETING APPLICANT ROUTE
    Route::delete('/delete/{applicant_id}', [ApplicantController::class, 'delete'])->name('applicant.delete');
});