<?php

use App\Enums\ROLE;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admins')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [SessionController::class, 'create'])->name('login');
        Route::post('/login', [SessionController::class, 'store'])->name('login.store');
        Route::get('/register', [registerController::class, 'create'])->name('register.create');
        Route::post('/register', [registerController::class, 'store'])->middleware('allowRegister')->name('register.store');;
    });

    Route::middleware('auth')->group(function () {
        Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');

        Route::middleware('ensureUserHasRole:viewer,admin,superadmin')->group(function() {
            Route::resource('clients', ClientController::class);
            Route::resource('projects', ProjectController::class);
            Route::resource('employees', EmployeeController::class);
        });

        Route::prefix('dashboard')->middleware('ensureUserHasRole:viewer,admins,superadmin')->group(function() {
            Route::get('stats', [DashboardController::class, 'stats'])->name('admins.dashboard.stats');
            Route::get('projects', [DashboardController::class, 'projects'])->name('admins.dashboard.projects');
            Route::get('clients', [DashboardController::class, 'clients'])->name('admins.dashboard.clients');
            Route::get('employees', [DashboardController::class, 'employees'])->name('admins.dashboard.employees');
        });
    });
});
