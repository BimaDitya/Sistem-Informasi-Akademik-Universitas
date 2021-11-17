<?php

use App\Models\Grades;
use App\Models\Payment;
use App\Models\Account;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;

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
Route::post('/', [LoginController::class, 'authAccount']);
Route::post('/Logout', [LoginController::class, 'logoutAccount']);

// Student Sections
// Bagian Beranda
Route::get('/Beranda', [StudentController::class, 'readHome'])->middleware('auth');
// View Halaman Mahasiswa
Route::get('/Mahasiswa/Detail/{Account}', [StudentController::class, 'detailStudent', function (Account $Account){
	return $Account;
}])->middleware('auth');
// Bagian Biodata
Route::post('/Mahasiswa/Store/Biodata/', [StudentController::class, 'storeStudent']);
Route::get('/Mahasiswa/Update/Biodata/{Account}', [StudentController::class, 'updateBiodata', function (Account $Account){
	return $Account;
}])->middleware('auth');
Route::post('/Mahasiswa/Update/Student/{Account}', [StudentController::class, 'updateStudent', function (Account $Account){
	return $Account;
}]);
// Bagian Alamat
Route::post('/Mahasiswa/Store/Alamat/', [StudentController::class, 'storeAddress']);
Route::get('/Mahasiswa/Update/Alamat/{Account}', [StudentController::class, 'updateAlamat', function (Account $Account){
	return $Account;
}])->middleware('auth');
Route::post('/Mahasiswa/Update/Address/{Account}', [StudentController::class, 'updateAddress', function (Account $Account){
	return $Account;
}]);
// Bagian Sekolah
Route::post('/Mahasiswa/Store/Sekolah', [StudentController::class, 'storeSchool']);
Route::get('/Mahasiswa/Update/Sekolah/{Account}', [StudentController::class, 'updateSekolah', function (Account $Account){
	return $Account;
}])->middleware('auth');
Route::post('/Mahasiswa/Update/School/{Account}', [StudentController::class, 'updateSchool', function (Account $Account){
	return $Account;
}]);
// Bagian Orang Tua
Route::post('/Mahasiswa/Store/OrangTua', [StudentController::class, 'storeParent']);
Route::get('/Mahasiswa/Update/OrangTua/{Account}', [StudentController::class, 'updateOrangTua', function (Account $Account){
	return $Account;
}])->middleware('auth');
Route::post('/Mahasiswa/Update/Parent/{Account}', [StudentController::class, 'updateParent', function (Account $Account){
	return $Account;
}]);
// Update Image
Route::post('/Mahasiswa/Store/Image',  [StudentController::class, 'storeImage']);
Route::get('/Mahasiswa/Update/{Account}', [StudentController::class, 'updateGambar', function (Account $Account){
	return $Account;
}])->middleware('auth');
Route::post('/Mahasiswa/Update/Image/{Account}', [StudentController::class, 'updateImage', function (Account $Account){
	return $Account;
}]);

// Halaman Perkuliahan
Route::get('Mahasiswa/Perkuliahan/{Account}', [StudentController::class, 'readCourse', function (Account $Account){
	return $Account;
}]);
Route::get('Mahasiswa/Informasi/{Account}', [StudentController::class, 'readPayment', function (Account $Account){
	return $Account;
}]);

// Admin Section //
// Mahasiswa
Route::get('/Admin/Mahasiswa/{Account}', [AdminController::class, 'readAccount'])->middleware('auth');
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