<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;

// language
Route::get('/locale/{lang}', [LanguageController::class, 'setLang']);

// user
Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/login', 'view')->name('login.view')->middleware('guest');
    Route::post('/login', 'login')->name('login')->middleware('verify.api');
    Route::get('/register', 'create')->name('register.create')->middleware('guest');
    Route::post('/register', 'register')->name('register')->middleware('guest');
    Route::post('/logout', 'logout')->name('logout')->middleware('auth');
});
Route::controller(VerificationController::class)->group(function () {
    Route::get('/verify-email/{token}', 'verifyEmail')->name('verification.verify');
    Route::get('/confirmation', 'view')->name('confirmation')->name('verification.notice');
    Route::get('/confirmed', 'show')->name('confirmed.show');
});

Route::controller(ResetPasswordController::class)->group(function () {
    Route::get('/forgot-password', 'index')->name('forgot-password.index');
    Route::get('/password-update/{token}', 'show')->name('password-update.show');
    Route::get('/password-confirmed', 'view')->name('password-confirmed.view');
    Route::post('/password-update/{token}', 'reset_password')->name('password.reset');
    Route::post('/forgot-password', 'send_reset_password_mail')->name('password.email');
});


Route::controller(DashboardController::class)->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/worldwide', 'index')->name('worldwide');
        Route::get('/bycountry', 'show')->name('bycountry');
    });
});
