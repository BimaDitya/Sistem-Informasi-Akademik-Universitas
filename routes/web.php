<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BerandaController;
use App\Models\Grades;
use App\Models\Payment;

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

// Student Sections
// Data Mahasiswa
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

// Admin Section //
// Mahasiswa
Route::get('/Admin/Mahasiswa/', [AdminController::class, 'readAccount']);
Route::post('/Admin/Mahasiswa/', [AdminController::class, 'storeAccount']);
Route::get('/Admin/Mahasiswa/{id}', [AdminController::class, 'detailAccount']);
Route::post('/Admin/Mahasiswa/Update/{id}', [AdminController::class, 'updateAccount']);
Route::delete('/Admin/Mahasiswa/Hapus/{id}', [AdminController::class, 'deleteAccount']);
// Perkuliahan
Route::get('/Admin/Perkuliahan/', [AdminController::class, 'readCourse']);
Route::post('/Admin/Perkuliahan/', [AdminController::class, 'storeCourse']);
Route::get('/Admin/Perkuliahan/{id}', [AdminController::class, 'detailCourse']);
Route::post('/Admin/Perkuliahan/Update/{id}', [AdminController::class, 'updateCourse']);
Route::delete('/Admin/Perkuliahan/Hapus/{id}', [AdminController::class, 'deleteCourse']);
// Transkrip Nilai
Route::get('/Admin/Transkrip/', [AdminController::class, 'readGrades']);
Route::post('/Admin/Transkrip/', [AdminController::class, 'storeGrades']);
Route::get('/Admin/Transkrip/{Grades}', [AdminController::class, 'detailGrades', function(Grades $Grades){
	return $Grades; }]);
Route::post('/Admin/Transkrip/Update/{Grades}', [AdminController::class, 'updateGrades', function(Grades $Grades){
	return $Grades; }]);
Route::delete('/Admin/Transkrip/Hapus/{id}', [AdminController::class, 'deleteGrades']);

// Pembaayaran UKT
Route::get('/Admin/Pembayaran/', [AdminController::class, 'readPayment']);
Route::post('/Admin/Pembayaran/', [AdminController::class, 'storePayment']);
Route::get('/Admin/Pembayaran/{Payment}', [AdminController::class, 'detailPayment', function(Payment $Payment){
	return $Payment; }]);
Route::post('/Admin/Pembayaran/Update/{Payment}', [AdminController::class, 'updatePayment', function(Payment $Payment){
	return $Payment; }]);
Route::delete('/Admin/Pembayaran/Hapus/{id}', [AdminController::class, 'deletePayment']);