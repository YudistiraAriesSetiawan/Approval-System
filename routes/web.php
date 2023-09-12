<?php

use App\Http\Controllers\PengajuanController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('Pengajuan/Store', [PengajuanController::class, 'store']);
Route::get('/Pengajuan/UpdateToApprove/{id}', [PengajuanController::class, 'updateToApprove']);
Route::get('/Pengajuan/UpdateToReject/{id}', [PengajuanController::class, 'updateToReject']);
Route::get('/Pengajuan/Destroy/{id}', [PengajuanController::class, 'destroy']);