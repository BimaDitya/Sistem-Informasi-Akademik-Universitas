<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\DataMahasiswaController;
use App\Models\College;

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

// Halaman Data Mahasiswa
Route::get('/Beranda', [BerandaController::class, 'index'])->middleware('auth');
Route::get('/Mahasiswa/Detail/', [BerandaController::class, 'detailStudent'])->middleware('auth');
// Bagian Biodata
Route::post('/Mahasiswa/Store/Biodata', [BerandaController::class, 'storeStudent']);
Route::get('/Mahasiswa/Update/Biodata', [BerandaController::class, 'updateStudentDetail'])->middleware('auth');
Route::post('/Mahasiswa/Update/Student', [BerandaController::class, 'updateStudent']);
// Bagian Alamat
Route::post('/Mahasiswa/Store/Alamat', [BerandaController::class, 'storeAddress']);
Route::get('/Mahasiswa/Update/Alamat', [BerandaController::class, 'updateAddressDetail'])->middleware('auth');
Route::post('/Mahasiswa/Update/Address', [BerandaController::class, 'updateAddress']);
// Bagian Sekolah
Route::post('/Mahasiswa/Store/Sekolah', [BerandaController::class, 'storeSchool']);
Route::get('/Mahasiswa/Update/Sekolah', [BerandaController::class, 'updateSchoolDetail'])->middleware('auth');
Route::post('/Mahasiswa/Update/School', [BerandaController::class, 'updateSchool']);
// Bagian Orang Tua
Route::post('/Mahasiswa/Store/OrangTua', [BerandaController::class, 'storeParent']);
Route::get('/Mahasiswa/Update/OrangTua', [BerandaController::class, 'updateParentDetail'])->middleware('auth');
Route::post('/Mahasiswa/Update/Parent', [BerandaController::class, 'updateParent']);

// Halaman Data Kuliah
Route::get('/Kuliah/Detail', [BerandaController::class, 'detailCollege'])->middleware('auth');
Route::get('/KRS/Detail', [BerandaController::class, 'detailKRS'])->middleware('auth');

Route::get('/Admin', [AdminController::class, 'index']);
Route::post('/Admin', [AdminController::class, 'storeAccount']);
Route::get('/Admin/Mahasiswa', [AdminController::class, 'detail']);
Route::post('/Admin/Mahasiswa/Update', [AdminController::class, 'updateAccount']);
Route::delete('/Admin/Mahasiswa/Hapus', [AdminController::class, 'delete']);

// Perkuliahan
Route::get('/Admin/Perkuliahan', [CollegeController::class, 'readCollege']);
Route::post('/Admin/Perkuliahan', [CollegeController::class, 'storeCollege']);
Route::get('/Admin/Perkuliahan/Detail', [CollegeController::class, 'detailCollege']);
Route::post('/Admin/Perkuliahan/Update', [CollegeController::class, 'updateCollege']);
Route::delete('/Admin/Perkuliahan/Hapus', [CollegeController::class, 'deleteCollege']);