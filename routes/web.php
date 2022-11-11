<?php

use App\Http\Controllers\ClientController;
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

//Route::get('/projects', [ProjectController::class, 'index']);
//Route::get('/projects/create', [ProjectController::class, 'create']);
//Route::get('/projects/{project}', [ProjectController::class, 'show']);
//Route::get('/projects/{project}/edit', [ProjectController::class, 'edit']);
//
//Route::post('/projects/store', [ProjectController::class, 'store']);
//Route::patch('/projects', [ProjectController::class, 'update']);
//Route::delete('/projects/{project}', [ProjectController::class, 'destroy']);
