<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProjectController;
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

// Clients
Route::resource('clients', ClientController::class);
// Projects
Route::resource('projects', ProjectController::class);
// Employees
Route::resource('employees', EmployeeController::class);

Route::get('/admins/stats', [AdminController::class, 'stats']);
Route::get('/admins/projects', [AdminController::class, 'projects']);
Route::get( '/admins/clients', [AdminController::class, 'clients']);
Route::get( '/admins/employees', [AdminController::class, 'employees']);
