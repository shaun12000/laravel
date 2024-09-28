<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route; 
use Illuminate\Support\Facades\Auth;

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

Route::middleware('guest')->group(function(){

    Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('register',[AuthController::class,'createRegistrationForm']);
    Route::post('login', [AuthController::class, 'loginattempt']);
    

});

Route::middleware('auth')->group(function(){

    Route::get('dashboard', [AuthController::class, 'dashboardshow'])->name('dashboard');
    
});


