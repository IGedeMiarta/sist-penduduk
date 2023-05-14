<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelahiranController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\KematianController;
use App\Http\Controllers\KKController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PendatangCntroller;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\PindahController;
use App\Http\Controllers\UserController;
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
    Route::resource('penduduk',PendudukController::class);
    Route::resource('kk',KKController::class);
    Route::resource('keluarga',KeluargaController::class);
    Route::resource('kelahiran',KelahiranController::class);
    Route::resource('pendatang',PendatangCntroller::class);
    Route::resource('kematian',KematianController::class);
    Route::resource('pindah',PindahController::class);
    Route::get('user-info',[UserController::class,'index']);
    Route::post('add-user',[UserController::class,'addUser']);
    Route::post('user-update',[UserController::class,'update'])->name('user.update');
    Route::post('logout',[AuthController::class,'logout']);

    Route::get('lap-kelahiran',[LaporanController::class,'lapKelahiran']);
    Route::get('lap-kematian',[LaporanController::class,'lapKematian']);
    Route::get('lap-pendatang',[LaporanController::class,'lapPendatang']);
    Route::get('lap-pindah',[LaporanController::class,'lapPindah']);

    Route::get('export-kelahiran',[LaporanController::class,'exportKelahiran']);
    Route::get('export-kematian',[LaporanController::class,'exportKematian']);
    Route::get('export-pendatang',[LaporanController::class,'exportPendatang']);
    Route::get('export-pindah',[LaporanController::class,'exportPindah']);


    Route::get('surat',[LaporanController::class,'surat']);
    Route::get('cetak-surat',[LaporanController::class,'suratKos']);
    Route::post('buat-surat',[LaporanController::class,'buatSurat']);
    Route::get('surat-keterangan/{id}',[LaporanController::class,'suratKet']);
});