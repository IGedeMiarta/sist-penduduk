<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelahiranController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\KKController;
use App\Http\Controllers\PendudukController;
use Illuminate\Support\Facades\Auth;
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
Route::group(['middleware'=>"guest"],function(){
    Route::get('/',function(){
        return redirect('login');
    });
    Route::get('/login',[AuthController::class,'login'])->name('login.get');
    Route::post('/login',[AuthController::class,'authicated'])->name('login.post');
    Route::get('/regist',[AuthController::class,'register'])->name('regist.get');
    Route::post('/regist',[AuthController::class,'registerPost'])->name('regist.post');

});
Route::group(['middleware'=>"auth"],function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('home');
    Route::resource('/penduduk',PendudukController::class);
    Route::resource('/kk',KKController::class);
    Route::resource('/keluarga',KeluargaController::class);
    Route::resource('/kelahiran',KelahiranController::class);
    Route::post('logout',[AuthController::class,'logout']);
});