<?php

use App\Http\Controllers\LanguageController;
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
    Route::get('/confirmation', 'view');
    Route::get('/confirmed', 'show');
});

Route::get('/forgot-password', function () {
    return view('pages.forgot_password');
});
