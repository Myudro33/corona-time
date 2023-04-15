<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;

// language
Route::get('/locale/{lang}', [LanguageController::class, 'setLang']);

// user
Route::controller(UserController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/login', 'view')->name('login.view');
    Route::post('/login/user', 'auth')->name('login.auth');
    Route::get('/register', 'create')->name('register.create');
    Route::post('/register', 'store')->name('register.store');
});
Route::controller(VerificationController::class)->group(function () {
    Route::get('/verify-email/{token}', 'verifyEmail')->name('verification.verify');
    Route::get('/reset-password/{token}', 'ResetPassword')->name('verification.verify');
    Route::get('/confirmation', 'view');
    Route::get('/confirmed', 'show');
});

Route::controller(ResetPasswordController::class)->group(function(){
    Route::get('/forgot-password', 'index');
    Route::get('/password-update/{user}', 'show');
    Route::get('/password-confirmed', 'view');
    Route::post('/password-update/{user}', 'store')->name('password.store');
    Route::post('/forgot-password', 'update')->name('reset.password');
});