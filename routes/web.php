<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route; 
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
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
    Route::get('otp', [AuthController::class ,'otp'])->name('otp');
    Route::get('otpp', function(){
        return view('emails.otpverification');
    });
    Route::post('otp', [AuthController::class ,'otp_verify'])->name('otp-verify');
    Route::get('switch/{lang}', [languageController::class ,'index'])->name('lang');
    

});

Route::middleware('auth')->group(function(){

    Route::get('dashboard', [AuthController::class, 'dashboardshow'])->name('dashboard');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('prevetGetLogout');
    Route::resource('products', ProductController::class);
    Route::resource('category', CategoryController::class);
    

    
});



