<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\GaleriController;
use Illuminate\Support\Facades\Route;

// =======================
// HALAMAN UTAMA USER
// =======================
Route::get('/', fn() => view('user.page.home.conten'))->name('user.home');

// =======================
// USER PAGES (PUBLIK)
// =======================
Route::prefix('user')->name('user.')->group(function () {

    // Transparansi
    Route::get('/transparansi/anggaran', fn() =>
        view('user.page.transparansi.transparansi', ['halaman' => 'anggaran'])
    )->name('transparansi.anggaran');

    Route::get('/transparansi/laporan', fn() =>
        view('user.page.transparansi.transparansi', ['halaman' => 'laporan'])
    )->name('transparansi.laporan');

    Route::get('/transparansi/dokumen', fn() =>
        view('user.page.transparansi.transparansi', ['halaman' => 'dokumen'])
    )->name('transparansi.dokumen');

    Route::get('/transparansi/bumdes', fn() =>
        view('user.page.transparansi.transparansi', ['halaman' => 'bumdes'])
    )->name('transparansi.bumdes');

    // Profil Desa
    Route::get('/profil', fn() => view('user.page.profil_desa.profil_desa'))->name('profil');

    // Galeri
    Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');
    Route::get('/galeri/{filename}', [GaleriController::class, 'show'])->name('galeri.detail');

    // Keuangan & Pembangunan
    Route::get('/keuangan', fn() => view('user.page.home.administrasipenduduk'))->name('keuangan');
    Route::get('/pembangunan', fn() => view('user.page.home.layanan_kami'))->name('pembangunan');

    // Struktur Organisasi
    Route::prefix('struktur')->name('struktur.')->group(function () {
        Route::get('/', fn() => view('user.page.struktur.struktur', ['halaman' => 'default']))->name('index');
        Route::get('/pemerintahan-desa', fn() => view('user.page.struktur.struktur', ['halaman' => 'pemerintahan_desa']))->name('pemerintahan_desa');
        Route::get('/bpd', fn() => view('user.page.struktur.struktur', ['halaman' => 'bpd']))->name('bpd');
        Route::get('/pkk', fn() => view('user.page.struktur.struktur', ['halaman' => 'pkk']))->name('pkk');
        Route::get('/lpm', fn() => view('user.page.struktur.struktur', ['halaman' => 'lpm']))->name('lpm');
        Route::get('/karang-taruna', fn() => view('user.page.struktur.struktur', ['halaman' => 'karang_taruna']))->name('karang_taruna');
        Route::get('/posyandu', fn() => view('user.page.struktur.struktur', ['halaman' => 'posyandu']))->name('posyandu');
    });

    // Halaman lainnya
    Route::get('/bpd', fn() => view('user.page.home.visimisi'))->name('bpd');
    Route::get('/karangtaruna', fn() => view('user.page.home.menelusuri_keindahan'))->name('karangtaruna');

    // Berita
    Route::get('/berita', fn() => view('user.page.berita.berita'))->name('berita');
    Route::get('/berita/{slug}', fn($slug) =>
        view('user.page.berita.berita_detail', ['slug' => $slug])
    )->name('berita.detail');

    // Pengaduan & Kontak
    Route::get('/pengaduan', fn() => view('user.page.home.kontak_saran'))->name('pengaduan');
    Route::get('/kontak', fn() => view('user.page.home.kontak_saran'))->name('kontak');

    // Transparansi Umum
    Route::get('/transparansi', fn() => view('user.page.transparansi.transparansi'))->name('transparansi');
});



// =======================
// ROUTES LAYANAN (USER)
// =======================
Route::prefix('layanan')->name('layanan.')->group(function () {

    Route::get('/pemerintahan', fn() =>
        view('user.page.home.layanan_kami.pemerintahan', ['halaman' => 'pemerintahan'])
    )->name('pemerintahan');

    Route::get('/pelayanan', fn() =>
        view('user.page.home.layanan_kami.pelayanan', ['halaman' => 'pelayanan'])
    )->name('pelayanan');

    Route::get('/kesra', fn() =>
        view('user.page.home.layanan_kami.kesra', ['halaman' => 'kesra'])
    )->name('kesra');

    Route::get('/bansos', fn() =>
        view('user.page.home.layanan_kami.bansos', ['halaman' => 'bansos'])
    )->name('bansos');

    Route::get('/kesehatan', fn() =>
        view('user.page.home.layanan_kami.kesehatan_posyandu', ['halaman' => 'kesehatan'])
    )->name('kesehatan');

    Route::get('/aspirasi', fn() =>
        view('user.page.home.layanan_kami.aspirasi_pengaduan', ['halaman' => 'aspirasi'])
    )->name('aspirasi');

    Route::get('/pelayanan_kesehatan_posyandu', fn() =>
        view('user.page.home.layanan_kami.kesehatan_posyandu', ['halaman' => 'kesehatan'])
    )->name('pelayanan.kesehatan_posyandu');

    Route::get('/informasi_bantuan', fn() =>
        view('user.page.home.layanan_kami.informasi_bantuan', ['halaman' => 'informasi_bantuan'])
    )->name('informasi_bantuan');

    Route::get('/layanan_aspirasi_pengaduan', fn() =>
        view('user.page.home.layanan_kami.layanan_aspirasi_pengaduan', ['halaman' => 'aspirasi'])
    )->name('layanan_aspirasi_pengaduan');
});



// =======================
// ADMIN (TANPA LOGIN)
// =======================
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/', fn() => redirect()->route('admin.dashboard'));

    Route::get('/dashboard', fn() =>
        view('admin.page.dashboard.index')
    )->name('dashboard');

    Route::get('/beranda', fn() =>
        view('admin.page.beranda.index')
    )->name('beranda');

    // CRUD Profil Desa
    Route::resource('profil_desa', App\Http\Controllers\Admin\ProfilDesaController::class);
});


// =======================
// PROFILE (BUTUH LOGIN)
// =======================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Login & Auth
require __DIR__ . '/auth.php';
