<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\InstructorController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Auth\AuthenController;
use App\Http\Controllers\Client\InstructorController as ClientInstructorController;
use App\Http\Controllers\Client\StudentController as ClientStudentController;
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
    return view('client.index');
});

// Authen 
Route::controller(AuthenController::class)
    ->group(function () {
        Route::get('register', 'showFormRegister')->name('register');
        Route::post('register', 'handleRegister');

        Route::get('login', 'showFormLogin')->name('login');
        Route::post('login', 'handleLogin');

        Route::post('logout', 'logout')->name('logout');
    });

// Admin
Route::prefix('admin')
    ->name('admin.')
    // ->middleware(['auth', 'role:admin'])
    ->group(function () {
        Route::controller(AdminController::class)
            ->group(function () {
                Route::get('/', 'dashboard')->name('dashboard');
                Route::get('/search', 'search')->name('search');
            });

        Route::prefix('students')
            ->name('students.')
            ->controller(StudentController::class)
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('create', 'create')->name('create');
            });

        Route::prefix('instructors')
            ->name('instructors.')
            ->controller(InstructorController::class)
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{instructor}/show', 'show')->name('show');
                Route::get('/{instructor}/edit', 'edit')->name('edit');
                Route::put('/{instructor}', 'update')->name('update');
                Route::delete('/{instructor}/destroy', 'destroy')->name('destroy');

                Route::get('/trash', 'trash')->name('trash');
                Route::post('/trash/{instructor}/restore', 'restore')->name('restore');
                Route::delete('/trash/{instructor}/force-destroy', 'forceDestroy')->name('force-destroy');
            });
    });

// Client
Route::name('client.')
    // ->middleware(['auth', 'role:admin'])
    ->group(function () {
        Route::prefix('students')
            ->name('students.')
            ->controller(ClientStudentController::class)
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('car_registration', 'car_registration')->name('car_registration');
                Route::get('bike_registration', 'bike_registration')->name('bike_registration');
                Route::get('schedule', 'schedule')->name('schedule');
                Route::get('edit_schedule', 'edit_schedule')->name('edit_schedule');
            });

        Route::prefix('instructors')
            ->name('instructors.')
            ->controller(ClientInstructorController::class)
            ->group(function () {
                Route::get('/', 'index')->name('index');
            });
    });
