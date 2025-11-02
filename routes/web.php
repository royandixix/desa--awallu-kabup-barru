<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\GaleriController;
use Illuminate\Support\Facades\Route;

// =======================
// 🔹 HALAMAN UTAMA → tampil halaman user tanpa login
// =======================
Route::get('/', fn() => view('user.page.home.conten'))->name('user.home');

// =======================
// 🔹 USER PAGES (akses publik)
// =======================
Route::prefix('user')->name('user.')->group(function () {

    // -----------------------
    // Transparansi
    // -----------------------
    Route::get('/transparansi/anggaran', fn() => view('user.page.transparansi.anggaran'))
        ->name('transparansi.anggaran');
    Route::get('/transparansi/laporan', fn() => view('user.page.transparansi.laporan'))
        ->name('transparansi.laporan');
    Route::get('/transparansi/dokumen', fn() => view('user.page.transparansi.dokumen'))
        ->name('transparansi.dokumen');
    Route::get('/transparansi/bumdes', fn() => view('user.page.transparansi.bumdes'))
        ->name('transparansi.bumdes');

    // -----------------------
    // Profil Desa
    // -----------------------
    Route::get('/profil', fn() => view('user.page.profil_desa.profil_desa'))
        ->name('profil');

    // -----------------------
    // Galeri
    // -----------------------
    Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');
    Route::get('/galeri/{filename}', [GaleriController::class, 'show'])->name('galeri.detail');

    // -----------------------
    // Keuangan & Pembangunan
    // -----------------------
    Route::get('/keuangan', fn() => view('user.page.home.administrasipenduduk'))
        ->name('keuangan');
    Route::get('/pembangunan', fn() => view('user.page.home.layanan_kami'))
        ->name('pembangunan');

    // -----------------------
    // Struktur
    // -----------------------
    Route::get('/struktur', fn() => view('user.page.home.struktur_organisasi'))
        ->name('struktur');
    Route::get('/bpd', fn() => view('user.page.home.visimisi'))
        ->name('bpd');
    Route::get('/karangtaruna', fn() => view('user.page.home.menelusuri_keindahan'))
        ->name('karangtaruna');

    // -----------------------
    // Berita, Pengaduan, Kontak
    // -----------------------
    Route::get('/berita', fn() => view('user.page.home.sambutan'))
        ->name('berita');
    Route::get('/pengaduan', fn() => view('user.page.home.kontak_saran'))
        ->name('pengaduan');
    Route::get('/kontak', fn() => view('user.page.home.kontak_saran'))
        ->name('kontak');
});

// =======================
// 🔹 ADMIN ROUTES (memerlukan login & verified)
// =======================
Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', fn() => view('admin.dashboard'))->name('admin.dashboard');
});

// =======================
// 🔹 PROFILE ROUTES (untuk user login saja)
// =======================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// =======================
// 🔹 LOGIN & AUTH ROUTES
// =======================
require __DIR__ . '/auth.php';
