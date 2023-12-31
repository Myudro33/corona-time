<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;

Route::get('/locale/{lang}', [LanguageController::class, 'setLang']);

Route::controller(AuthController::class)->group(function () {
	Route::view('/login', 'pages.login')->name('login.view')->middleware('guest');
	Route::post('/login', 'login')->name('login')->middleware('verify');
	Route::view('/register', 'pages.register')->name('register.create')->middleware('guest');
	Route::post('/register', 'register')->name('register')->middleware('guest');
	Route::post('/logout', 'logout')->name('logout')->middleware('auth');
});
Route::controller(VerificationController::class)->group(function () {
	Route::get('/verify-email/{token}', 'verifyEmail')->name('verification.verify')->middleware('guest');
	Route::view('/confirmation', 'pages.confirmation')->name('confirmation')->middleware('guest');
	Route::view('/confirmed', 'pages.confirmed')->name('confirmed.show')->middleware('guest');
});

Route::controller(ResetPasswordController::class)->group(function () {
	Route::view('/forgot-password', 'pages.forgot_password')->name('forgot-password.index')->middleware('guest');
	Route::get('/password-update/{token}', 'show')->name('password-update.show')->middleware('guest');
	Route::view('/password-confirmed', 'pages.password-update-confirmed')->name('password-confirmed.view')->middleware('guest');
	Route::post('/password-update/{token}', 'reset_password')->name('password.reset')->middleware('guest');
	Route::post('/forgot-password', 'send_reset_password_mail')->name('password.email')->middleware('guest');
});

Route::controller(DashboardController::class)->group(function () {
	Route::middleware('auth')->group(function () {
		Route::get('/', 'index')->name('worldwide');
		Route::get('/bycountry', 'show')->name('bycountry');
	});
});
