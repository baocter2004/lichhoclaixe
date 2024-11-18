<?php

use App\Http\Controllers\Auth\AuthenController;
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

// Authen 
Route::controller(AuthenController::class)
    ->group(function () {
        Route::get('register',  'showFormRegister')->name('register');
        Route::post('register',  'handleRegister');

        Route::get('login',  'showFormLogin')->name('login');
        Route::post('login',  'handleLogin');

        Route::post('logout',  'logout')->name('logout');
    });
// Member

// Admin