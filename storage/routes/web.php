<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// =======================
// 🔹 HALAMAN UTAMA → langsung tampil halaman user tanpa login
// =======================
Route::get('/', fn() => redirect()->route('user.home'));

Route::prefix('user')->name('user.')->group(function () {

    // Halaman Utama / Profil / Galeri
    Route::get('/home', fn() => view('user.page.home.conten'))->name('home');
    Route::get('/profil', fn() => view('user.page.profil_desa.profil_desa'))->name('profil');
    Route::get('/galeri', fn() => view('user.page.home.foto_bersama_warga'))->name('galeri');
    Route::get('/galeri/{filename}', [App\Http\Controllers\User\GaleriController::class, 'show'])
        ->name('galeri.detail');

    // Transparansi Dropdown
    Route::get('/transparansi/anggaran', fn() => view('user.page.transparansi.anggaran'))
        ->name('transparansi.anggaran');
    Route::get('/transparansi/laporan', fn() => view('user.page.transparansi.laporan'))
        ->name('transparansi.laporan');
    Route::get('/transparansi/dokumen', fn() => view('user.page.transparansi.dokumen'))
        ->name('transparansi.dokumen');
    Route::get('/transparansi/bumdes', fn() => view('user.page.transparansi.bumdes'))
        ->name('transparansi.bumdes');

    // Menu Lain
    Route::get('/berita', fn() => view('user.page.home.berita'))->name('berita');
    Route::get('/bpd', fn() => view('user.page.home.bpd'))->name('bpd');
    Route::get('/karangtaruna', fn() => view('user.page.home.karangtaruna'))->name('karangtaruna');
    Route::get('/keuangan', fn() => view('user.page.home.keuangan'))->name('keuangan');
    Route::get('/kontak', fn() => view('user.page.home.kontak'))->name('kontak');
    Route::get('/pembangunan', fn() => view('user.page.home.pembangunan'))->name('pembangunan');
    Route::get('/pengaduan', fn() => view('user.page.home.pengaduan'))->name('pengaduan');
    Route::get('/struktur', fn() => view('user.page.home.struktur'))->name('struktur');
});

// =======================
// 🔹 ADMIN ROUTES (login & verified)
// =======================
Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', fn() => view('admin.dashboard'))->name('admin.dashboard');
});

// =======================
// 🔹 PROFILE ROUTES (login required)
// =======================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// =======================
// 🔹 AUTH
// =======================
require __DIR__ . '/auth.php';
