<?php

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
//Route::get('/employees', [EmployeeController::class, 'index']);
//Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy']);
//Route::get('/employees/create', [EmployeeController::class, 'create']);
//Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit']);
//Route::get('/employees/{employee}', [EmployeeController::class, 'show']);
//
//Route::put('/employees', [EmployeeController::class, 'store']);

