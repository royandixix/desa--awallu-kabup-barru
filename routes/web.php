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
    Route::get('/transparansi/anggaran', function () {
        return view('user.page.transparansi.transparansi', ['halaman' => 'anggaran']);
    })->name('transparansi.anggaran');

    Route::get('/transparansi/laporan', function () {
        return view('user.page.transparansi.transparansi', ['halaman' => 'laporan']);
    })->name('transparansi.laporan');

    Route::get('/transparansi/dokumen', function () {
        return view('user.page.transparansi.transparansi', ['halaman' => 'dokumen']);
    })->name('transparansi.dokumen');

    Route::get('/transparansi/bumdes', function () {
        return view('user.page.transparansi.transparansi', ['halaman' => 'bumdes']);
    })->name('transparansi.bumdes');

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
    Route::prefix('struktur')->name('struktur.')->group(function () {

        Route::get('/', fn() => view('user.page.struktur.struktur'))
            ->name('index'); // Halaman utama struktur

        Route::get('/pemerintahan-desa', fn() => view('user.page.struktur.pemerintahan_desa'))
            ->name('pemerintahan_desa');

        Route::get('/bpd', fn() => view('user.page.struktur.bpd'))
            ->name('bpd');

        Route::get('/pkk', fn() => view('user.page.struktur.pkk'))
            ->name('pkk');

        Route::get('/lpm', fn() => view('user.page.struktur.lpm'))
            ->name('lpm');

        Route::get('/karang-taruna', fn() => view('user.page.struktur.karang_taruna'))
            ->name('karang_taruna');

        Route::get('/posyandu', fn() => view('user.page.struktur.posyandu'))
            ->name('posyandu');
    });



    Route::get('/bpd', fn() => view('user.page.home.visimisi'))
        ->name('bpd');
    Route::get('/karangtaruna', fn() => view('user.page.home.menelusuri_keindahan'))
        ->name('karangtaruna');

    // -----------------------
    // Berita, Pengaduan, Kontak
    // -----------------------
    // -----------------------
    // Berita, Pengaduan, Kontak
    // -----------------------
    Route::get('/berita', fn() => view('user.page.berita.berita'))
        ->name('berita'); // jadi user.berita

    Route::get('/berita/{slug}', function ($slug) {
        return view('user.page.berita.berita_detail', ['slug' => $slug]);
    })->name('berita.detail'); // jadi user.berita.detail

    Route::get('/pengaduan', fn() => view('user.page.home.kontak_saran'))
        ->name('pengaduan');

    Route::get('/kontak', fn() => view('user.page.home.kontak_saran'))
        ->name('kontak');


    // -----------------------
    // Transparansi umum
    // -----------------------
    Route::get('/transparansi', function () {
        return view('user.page.transparansi.transparansi');
    })->name('transparansi');
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
