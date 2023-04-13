<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// language
Route::get('/locale/{lang}', [LanguageController::class, 'setLang']);


Route::controller(UserController::class)->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/login', 'view')->name('login.view');
    Route::post('/login', 'auth')->name('login.auth');
    Route::get('/register', 'create')->name('register.create');
    Route::post('/register', 'store')->name('register.store');
});
Route::get('/forgot-password', function () {
    return view('pages.forgot_password');
});
