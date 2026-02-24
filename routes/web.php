<?php

use Illuminate\Support\Facades\Route;
// Menambahkan use untuk mengimpor BljrController
use App\Http\Controllers\BljrController;

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