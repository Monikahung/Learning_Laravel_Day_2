<?php

use Illuminate\Support\Facades\Route;
// Menambahkan use untuk mengimpor BljrController
use App\Http\Controllers\BljrController;
// Menambahkan use untuk mengimpor JurusanController
use App\Http\Controllers\JurusanController;
// Menambahkan use untuk mengimpor MahasiswaController
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('welcome');
});

// Membuat route /coba untuk menampilkan halaman dengan teks "Hai"
Route::get('/coba', function () {
    return 'Haiii';
});

// Membuat route /coba/cobasaja untuk menampilkan halaman dengan teks "Haii saja"
Route::get('/coba/cobasaja', function () {
    return 'Haii saja';
});

// Membuat route /coba/cobalagi untuk menampilkan halaman cobaview dari views
Route::get('/coba/cobalagi', function () {
    return view('cobaview');
});

// Membuat route /cobacontroller untuk menampilkan hasil dari function tampil di controller BljrController
Route::get(
    '/cobacontroller', 
    [BljrController::class, 'tampil']
);

// Membuat route /cobacontroller2 untuk menampilkan hasil dari function tampil2 di controller BljrController
Route::get(
    '/cobacontroller2', 
    [BljrController::class, 'tampil2']
);

// Membuat route /cobacontroller3 untuk menampilkan hasil dari function tampil3 di controller BljrController (view)
Route::get(
    '/cobacontroller3', 
    [BljrController::class, 'tampil3']
);

// Membuat route /cobacontroller4 untuk menampilkan hasil dari function tampil4 di controller BljrController (view di dalam folder home)
Route::get(
    '/cobacontroller4',
    [BljrController::class, 'tampil4']
);

// ADMIN LTE
// Membuat route /cobadmin untuk menampilkan hasil dari function tampiladmin di controller BljrController (view dashboard di dalam folder admin)
Route::get(
    '/cobaadmin',
    [BljrController::class, 'tampiladmin']
)->name('dashboardadmin'); // Menambahkan nama route untuk dashboard admin

// Membuat route /login untuk menampilkan hasil dari function login di controller BljrController (view login di dalam folder admin)
Route::get(
    '/login',
    [BljrController::class, 'login']
);

// Membuat route /listbarang untuk menampilkan hasil dari function listbarang di controller BljrController (view listbarang di dalam folder admin berupa table)
Route::get(
    '/listbarang', 
    [BljrController::class, 'listbarang']
)->name('databarang'); // Menambahkan nama route untuk list barang

// Membuat route /formhitung untuk menampilkan hasil dari function fhitung di controller BljrController (view formhitung di dalam folder admin berupa form penjumlahan)
Route::get(
    '/formhitung',
    [BljrController::class, 'fhitung']
)->name('formhitung');

// Membuat route /proseshitung untuk memproses data dari formhitung dengan method POST dan menampilkan hasil penjumlahan dari angka1 dan angka2 yang diinputkan di formhitung, menggunakan function calculate di controller BljrController
Route::post(
    '/proseshitung',
    [BljrController::class, 'calculate']
)->name('proseshitung');

// Membuat route /formregister untuk menampilkan hasil dari function formregister di controller BljrController (view formregister di dalam folder admin berupa form registrasi)
Route::get(
    '/formregister',
    [BljrController::class, 'fregister']
)->name('formregister');

// Membuat route /prosesregister untuk memproses data dari formregister dengan method POST dan menampilkan hasil dari registrasi di formregister, menggunakan function daftar di controller BljrController
Route::post(
    '/prosesregister',
    [BljrController::class, 'daftar']
)->name('prosesregister');

// Membuat route /edituser/{id} untuk menampilkan form edit data user yang dipilih
Route::get(
    '/edituser/{id}',
    [BljrController::class, 'editUser']
)->name('useredit');

// Membuat route /updateuser/{id} untuk memperbarui data user yang telah diedit
Route::post(
    '/updateuser/{id}',
    [BljrController::class, 'updateUser']
)->name('updateuser');

// Membuat route /userdelete/{id} untuk menghapus data user dari tabel 'data_user'
Route::Delete(
    '/userdelete/{id}',
    [BljrController::class, 'deleteUser']
)->name('userdelete');

// Membuat route /listgempa untuk menampilkan hasil dari function listgempa di controller BljrController (view datagempa di dalam folder admin berupa table)
Route::get(
    '/listgempa',
    [BljrController::class, 'listgempa']
)->name(name: 'datagempa');

// Route untuk resource jurusan
Route::get('/jurusan', [JurusanController::class, 'index']);
Route::get('/jurusan/create', [JurusanController::class, 'create']);
Route::post('/jurusan/store', [JurusanController::class, 'store']);
Route::get('/jurusan/edit/{id}', [JurusanController::class, 'edit']);
Route::post('/jurusan/update/{id}', [JurusanController::class, 'update']);
Route::get('/jurusan/delete/{id}', [JurusanController::class, 'destroy']);

// Route untuk resource mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create']);
Route::post('/mahasiswa/store', [MahasiswaController::class, 'store']);
Route::get('/mahasiswa/edit/{id}', [MahasiswaController::class, 'edit']);
Route::post('/mahasiswa/update/{id}', [MahasiswaController::class, 'update']);
Route::get('/mahasiswa/delete/{id}', [MahasiswaController::class, 'destroy']);
