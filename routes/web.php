<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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



require __DIR__.'/auth.php';