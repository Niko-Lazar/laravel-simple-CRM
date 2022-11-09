<?php

use App\Enums\ProjectStatus;
use App\Models\Client;
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

Route::get('/', function () {
    return view('index', [
        'clients' => Client::all(),
    ]);
});

Route::get('/client/{client}', function (Client $client) {
    return view('client', [
        'client' => $client
    ]);
});
