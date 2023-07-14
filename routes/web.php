<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// -------------------------------------------------- //

// Untuk Halaman Login

Route::get('/', [LoginController::class, 'index']);

Route::post('/', [LoginController::class, 'login']);

// -------------------------------------------------- //

// Untuk Halaman Dashboard

Route::get('/dashboard', [DashboardController::class, 'index']);

// -------------------------------------------------- //

// Untuk Halaman Events

Route::get('/event/create', [EventController::class, 'index_create']);

Route::post('/event/create', [EventController::class, 'create_event']);
