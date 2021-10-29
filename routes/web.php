<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerijinanController;

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

Route::get('/', [PerijinanController::class, 'calendar']);
Route::get('/dashboard', [PerijinanController::class, 'dashboard']);
Route::get('/dosen', [PerijinanController::class, 'dosen']);
Route::get('/mahasiswa', [PerijinanController::class, 'mahasiswa']);
Route::get('/request', [PerijinanController::class, 'request']);
