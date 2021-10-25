<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BerandaController;

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

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authMahasiswa']);
Route::post('/Logout', [LoginController::class, 'logoutMahasiswa']);

Route::get('/Beranda', [BerandaController::class, 'index'])->middleware('auth');

Route::get('/Admin', [AdminController::class, 'index']);
Route::post('/Admin', [AdminController::class, 'store']);
Route::get('/Admin/{id}', [AdminController::class, 'detail']);
Route::post('/Admin/{id}/Update', [AdminController::class, 'update']);
Route::delete('/Admin/{id}/Hapus', [AdminController::class, 'delete']);