<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\InstructorController;
use App\Http\Controllers\Admin\StudentController;
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

Route::get('/', function () {
    return view('clients.index');
});

// Authen 
Route::controller(AuthenController::class)
    ->group(function () {
        Route::get('register',  'showFormRegister')->name('register');
        Route::post('register',  'handleRegister');

        Route::get('login',  'showFormLogin')->name('login');
        Route::post('login',  'handleLogin');

        Route::post('logout',  'logout')->name('logout');
    });
// Admin

Route::prefix('admin')
    ->name('admin.')
    // ->middleware(['auth', 'role:admin'])
    ->group(function () {
        Route::prefix('students')
            ->name('students.')
            ->controller(StudentController::class)
            ->group(function () {
                Route::get('/', 'index')->name('index');
            });

        Route::prefix('instructors')
            ->name('instructors.')
            ->controller(InstructorController::class)
            ->group(function () {
                Route::get('/', 'index')->name('index');
            });

        Route::prefix('admins')
            ->name('admins.')
            ->controller(AdminController::class)
            ->group(function () {
                Route::get('/', 'index')->name('index');
            });
    });
