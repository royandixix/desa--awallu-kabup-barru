<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\GaleriController;

// =======================
// 🔹 HALAMAN UTAMA (USER)
// =======================
Route::get('/', fn() => redirect()->route('user.home'));

Route::prefix('user')->name('user.')->group(function () {
    Route::get('/home', fn() => view('user.page.home.content'))->name('home');
    Route::get('/profil', fn() => view('user.page.profil_desa.profil_desa'))->name('profil');
    Route::get('/galeri', fn() => view('user.page.home.foto_bersama_warga'))->name('galeri');
    Route::get('/galeri/{filename}', [GaleriController::class, 'show'])->name('galeri.detail');

    Route::get('/transparansi/anggaran', fn() => view('user.page.transparansi.anggaran'))->name('transparansi.anggaran');
    Route::get('/transparansi/laporan', fn() => view('user.page.transparansi.laporan'))->name('transparansi.laporan');
    Route::get('/transparansi/dokumen', fn() => view('user.page.transparansi.dokumen'))->name('transparansi.dokumen');
    Route::get('/transparansi/bumdes', fn() => view('user.page.transparansi.bumdes'))->name('transparansi.bumdes');

    Route::get('/berita', fn() => view('user.page.home.berita'))->name('berita');
    Route::get('/pengaduan', fn() => view('user.page.pengaduan.pengaduan'))->name('pengaduan');
});

// =======================
// 🔹 ADMIN ROUTES
// =======================
Route::prefix('admin')
    ->middleware(['auth', 'verified'])
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', fn() => view('admin.page.dashboard.index'))->name('dashboard');
        Route::get('/beranda', fn() => view('admin.page.beranda.index'))->name('beranda');
        Route::get('/berita', fn() => view('admin.page.berita.index'))->name('berita');
        Route::get('/galeri', fn() => view('admin.page.galeri.index'))->name('galeri');
        // dst...
    });



// =======================
// 🔹 PROFILE ROUTES
// =======================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// =======================
// 🔹 AUTH ROUTES
// =======================
require __DIR__ . '/auth.php';
