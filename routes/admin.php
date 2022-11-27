<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\ProjectController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginView'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/register', [AuthController::class, 'registerView'])->name('auth.register.view');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

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
