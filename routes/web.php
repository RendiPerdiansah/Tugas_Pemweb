<?php

use App\Http\Controllers\c_dosen;
use App\Http\Controllers\c_home;
use App\Http\Controllers\c_login;
use App\Http\Controllers\c_mahasiswa;
use App\Http\Controllers\c_register;
use App\Http\Controllers\c_user;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('v_index');
// });

// Route::get('/dosen', [c_dosen::class, 'dosens'])->name('dosen');
// Route::get('/mahasiswa', [c_mahasiswa::class, 'mahasiswas']);
// Route::view('/about', 'v_about', [
//     'name' => 'Rendi Perdiansah',
//     'alamat' => 'Subang',
// ]);
// Route::view('/contact', 'v_contact',);
// Route::view('/login', 'v_login',);
// Route::view('/barang', 'v_barang',);
// Route::view('/admin', 'admin.v_dashboard',);

// Route::get('/home', [c_home::class, 'index']);
// Route::get('/home/about/{id}', [c_home::class, 'about']);
// Route::get('/dosen', [c_dosen::class, 'index']);
// Route::get('/mahasiswa', [c_mahasiswa::class, 'index']);
// Route::get('/user', [c_user::class, 'index']);
// Route::get('/register', [c_register::class, 'index']);
// Route::get('/', [c_login::class, 'index']);




// Route::view ('/contact', 'v_contact', [
//     'name' => 'Rendi Perdiansah',
//     'email' => 'Rendipperdiansah@gmail.com',
// ]);

// Route::get ('/contact', function() {
//     return view('v_contact', [ 'name' => 'Rendi Perdiansah',
//     'email' => 'rendipperdiansah@gmail.com',]);
// });

// Route::get('/about', function () {
//     return 'Halaman About';
// });
// Route::get('/kali', function () {
//     return 9 * 9;
// });

// // route::view('/admin', 'admin/v_admin');

// route::view('/admin', 'admin.v_admin');

// // Route::get('/mahasiswa/', function ($nama_mahasiswa = 'Rendi Perdiansah') {
// //     return view ('mahasiswa', ['nama_mahasiswa' => $nama_mahasiswa]);
// // });

// // route::view('/about', 'about',
// // ['name' => 'Rendi Perdiansah',
// // 'alamat' => 'Subang']);

// Route::view('/', 'v_login');
// Route::get('/home', [c_home::class, 'index']);
// Route::get('/about', [c_home::class, 'about']);
// Route::get('/about2/{id}', [c_home::class, 'about2']);
Route::get('/datadosen', [c_dosen::class, 'index'])->name('dosen');
Route::get('/datadosen/detail/{id_dosen}', [c_dosen::class, 'detail']);
Route::get('/datadosen/add', [c_dosen::class, 'add']);
Route::post('/datadosen/insert', [c_dosen::class, 'insert']);
Route::post('/dosen/insert', [c_dosen::class, 'insert']);
Route::get('/datadosen/edit/{id_dosen}', [c_dosen::class, 'edit']);
Route::post('/datadosen/update/{id_dosen}', [c_dosen::class, 'update']);
Route::get('/datadosen/delete/{id_dosen}', [c_dosen::class, 'delete']);
Route::get('/datadosen/print', [c_dosen::class, 'print']);
// Route::get('/user', [c_user::class, 'index']);
// Route::get('/register', [c_register::class, 'index']);
// Route::get('/mahasiswa', [c_mahasiswa::class, 'index'])->name('mahasiswa');
// Route::get('/mahasiswa/detail/{id_mahasiswa}', [c_mahasiswa::class, 'detail']);
// Route::get('/mahasiswa/add', [c_mahasiswa::class, 'add']);
// Route::post('/mahasiswa/insert', [c_mahasiswa::class, 'insert']);
// Route::get('/mahasiswa/edit/{id_mahasiswa}', [c_mahasiswa::class, 'edit']);
// Route::post('/mahasiswa/update/{id_mahasiswa}', [c_mahasiswa::class, 'update']);
// Route::get('/mahasiswa/delete/{id_mahasiswa}', [c_mahasiswa::class, 'delete']);
// Route::view('/dashboard', 'admin/v_dashboard');

// Login, Register, Logout
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\UserController;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\DosenMiddleware;
use App\Http\Middleware\MahasiswaMiddleware;

Route::get('/', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerPage']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
});

Route::middleware([MahasiswaMiddleware::class])->group(function () {
    Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
});

Route::middleware([UserMiddleware::class])->group(function () {
    Route::get('/user', [UserController::class, 'index']);
});

Route::middleware([DosenMiddleware::class])->group(function () {
    Route::get('/dosen', [DosenController::class, 'index']);
    
});

Route::view('/home','home');
Route::view('/about','v_about');
Route::view('/dashboarduser','v_user');
Route::view('/dashboardmahasiswa','mahasiswa');
Route::view('/chart','v_chart');
Route::view('/invoice','v_invoice');


//Update Route
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\ProdiController;

//Dosen
// Route::get('/dosen', [DosenController::class, 'index']);
// Route::get('/dosen/create', [DosenController::class, 'create']);
// Route::post('/dosen', [DosenController::class, 'store']);
// Route::get('/dosen/{nip}/edit', [DosenController::class, 'edit']);
// Route::put('/dosen/{nip}', [DosenController::class, 'update']);
// Route::delete('/dosen/{nip}', [DosenController::class, 'destroy']);
//Mahasiswa
// Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
// Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
// Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
// Route::get('/mahasiswa/{nim}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
// Route::put('/mahasiswa/{nim}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
// Route::delete('/mahasiswa/{nim}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
// //Jurusan
// Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan.index');
// Route::get('/jurusan/create', [JurusanController::class, 'create'])->name('jurusan.create');
// Route::post('/jurusan', [JurusanController::class, 'store'])->name('jurusan.store');
// Route::get('/jurusan/{id}/edit', [JurusanController::class, 'edit'])->name('jurusan.edit');
// Route::put('/jurusan/{id}', [JurusanController::class, 'update'])->name('jurusan.update');
// Route::delete('/jurusan/{id}', [JurusanController::class, 'destroy'])->name('jurusan.destroy');
// //prodi
// Route::get('/prodi', [ProdiController::class, 'index'])->name('prodi.index');
// Route::get('/prodi/create', [ProdiController::class, 'create'])->name('prodi.create');
// Route::post('/prodi', [ProdiController::class, 'store'])->name('prodi.store');
// Route::get('/prodi/{id}/edit', [ProdiController::class, 'edit'])->name('prodi.edit');
// Route::put('/prodi/{id}', [ProdiController::class, 'update'])->name('prodi.update');
// Route::delete('/prodi/{id}', [ProdiController::class, 'destroy'])->name('prodi.destroy');

