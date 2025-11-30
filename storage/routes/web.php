<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\GaleriController;
use App\Http\Controllers\User\TransparansiController;

// Root
Route::get('/', fn() => redirect()->route('user.home'))->name('root');

// =======================
// USER ROUTES (PUBLIC)
// =======================
Route::prefix('user')->name('user.')->group(function () {

    // Home User
    Route::get('/home', fn() => view('user.page.home.conten'))->name('home');

    // Profil
    Route::get('/profil', fn() => view('user.page.profil_desa.profil_desa'))->name('profil');

    // Galeri
    Route::get('/galeri', fn() => view('user.page.home.foto_bersama_warga'))->name('galeri');
    Route::get('/galeri/{filename}', [GaleriController::class, 'show'])->name('galeri.detail');

    // Layanan
    Route::get('/layanan', fn() => view('user.page.home.layanan_kami.layanan_kami'))->name('layanan');
    Route::get('/layanan/pemerintahan', fn() => view('user.page.home.layanan_kami.pemerintahan'))->name('layanan.pemerintahan');
    Route::get('/layanan/pelayanan', fn() => view('user.page.home.layanan_kami.pelayanan'))->name('layanan.pelayanan');
    Route::get('/layanan/kesra', fn() => view('user.page.home.layanan_kami.kesra'))->name('layanan.kesra');
    Route::get('/layanan/informasi-bantuan', fn() => view('user.page.home.layanan_kami.informasi_bantuan'))->name('layanan.informasi_bantuan');
    Route::get('/layanan/kesehatan-posyandu', fn() => view('user.page.home.layanan_kami.kesehatan_posyandu'))->name('layanan.kesehatan_posyandu');
    Route::get('/layanan/aspirasi-pengaduan', fn() => view('user.page.home.layanan_kami.aspirasi_pengaduan'))->name('layanan.aspirasi_pengaduan');

    // Transparansi
    Route::prefix('transparansi')->name('transparansi.')->group(function () {
        Route::get('/', [TransparansiController::class, 'index'])->name('index');
        Route::get('/anggaran', [TransparansiController::class, 'index'])->name('anggaran');
        Route::get('/laporan', [TransparansiController::class, 'index'])->name('laporan');
        Route::get('/dokumen', [TransparansiController::class, 'index'])->name('dokumen');
        Route::get('/bumdes', [TransparansiController::class, 'index'])->name('bumdes');
    });

    // Berita
    Route::get('/berita', fn() => view('user.page.home.berita'))->name('berita');

    // Pengaduan
    Route::get('/pengaduan', fn() => view('user.page.pengaduan.pengaduan'))->name('pengaduan');
});

// =======================
// ADMIN ROUTES
// =======================
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', fn() => view('admin.page.dashboard.index'))->name('dashboard');
    Route::get('/beranda', fn() => view('admin.page.beranda.index'))->name('beranda');
    Route::get('/berita', fn() => view('admin.page.berita.index'))->name('berita');
    Route::get('/galeri', fn() => view('admin.page.galeri.index'))->name('galeri');
    Route::get('/transparansi/anggaran', fn() => view('admin.page.transparansi.anggaran.index'))->name('transparansi.anggaran');
    Route::get('/transparansi/anggaran/create', fn() => view('admin.page.transparansi.anggaran.create'))->name('transparansi.anggaran.create');
});

// =======================
// PROFILE
// =======================
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
