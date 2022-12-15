<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelahiranController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\KKController;
use App\Http\Controllers\PendudukController;
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

Route::get('/',[DashboardController::class,'index']);
Route::resource('/penduduk',PendudukController::class);
Route::resource('/kk',KKController::class);
Route::resource('/keluarga',KeluargaController::class);
Route::resource('/kelahiran',KelahiranController::class);
