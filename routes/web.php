<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// =======================
// 🔹 HALAMAN UTAMA → tampil halaman user tanpa login
// =======================
Route::get('/', function () {
    return view('user.page.home.conten'); // langsung ke home
})->name('user.home');

// =======================
// 🔹 USER PAGES (akses publik)
// =======================
Route::prefix('user')->group(function () {

    // Profil Desa
    Route::get('/profil', function () {
        return view('user.page.profil_desa.profil_desa');
    })->name('user.profil');

    // Galeri
    Route::get('/galeri', function () {
        return view('user.page.galeri.galeri'); // langsung ke galeri.blade.php
    })->name('user.galeri');



    // Transparansi
    Route::get('/keuangan', function () {
        return view('user.page.home.administrasipenduduk');
    })->name('user.keuangan');

    Route::get('/pembangunan', function () {
        return view('user.page.home.layanan_kami');
    })->name('user.pembangunan');

    // Struktur
    Route::get('/struktur', function () {
        return view('user.page.home.struktur_organisasi');
    })->name('user.struktur');

    Route::get('/bpd', function () {
        return view('user.page.home.visimisi');
    })->name('user.bpd');

    Route::get('/karangtaruna', function () {
        return view('user.page.home.menelusuri_keindahan');
    })->name('user.karangtaruna');

    // Berita, Pengaduan, Kontak
    Route::get('/berita', function () {
        return view('user.page.home.sambutan');
    })->name('user.berita');

    Route::get('/pengaduan', function () {
        return view('user.page.home.kontak_saran');
    })->name('user.pengaduan');

    Route::get('/kontak', function () {
        return view('user.page.home.kontak_saran');
    })->name('user.kontak');
});

// =======================
// 🔹 ADMIN ROUTES (masih butuh login & verified)
// =======================
Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
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
