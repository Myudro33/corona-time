<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;

// language
Route::get('/locale/{lang}', [LanguageController::class, 'setLang']);

// user
Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'index')->middleware('auth')->name('dashboard');
    Route::get('/login', 'view')->name('login.view')->middleware('guest');
    Route::post('/login/user', 'login')->name('login')->middleware('verify.api');
    Route::get('/register', 'create')->name('register.create');
    Route::post('/register', 'register')->name('register');
    Route::post('/logout', 'logout')->name('logout')->middleware('auth');
});
Route::controller(VerificationController::class)->group(function () {
    Route::get('/verify-email/{token}', 'verifyEmail')->name('verification.verify');
    Route::get('/reset-password/{token}', 'ResetPassword')->name('verification.verify');
    Route::get('/confirmation', 'view')->name('confirmation')->name('verification.notice');
    Route::get('/confirmed', 'show');
});

Route::controller(ResetPasswordController::class)->group(function () {
    Route::get('/forgot-password', 'index');
    Route::get('/password-update/{user}', 'show');
    Route::get('/password-confirmed', 'view');
    Route::post('/password-update/{user}', 'store')->name('password.store');
    Route::post('/forgot-password', 'update')->name('password.update');
});
