<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// User Controllers
use App\Http\Controllers\User\GaleriController as UserGaleriController;
use App\Http\Controllers\User\ProfilDesaController;
use App\Http\Controllers\User\TransparansiController;

// Admin Controllers
use App\Http\Controllers\Admin\GaleriController as AdminGaleriController;
use App\Http\Controllers\Admin\Transparansi\AnggaranController as AdminAnggaranController;
use App\Http\Controllers\Admin\Transparansi\LaporanController as AdminLaporanController;
use App\Http\Controllers\Admin\Transparansi\DokumenController as AdminDokumenController;
use App\Http\Controllers\Admin\Transparansi\BumdesController as AdminBumdesController;


// =======================
// HALAMAN UTAMA USER
// =======================
Route::get('/', fn() => redirect()->route('user.home'));
Route::get('/home', fn() => view('user.page.home.content'))->name('user.home');


// =======================
// USER ROUTES (PUBLIC)
// =======================
Route::prefix('user')->name('user.')->group(function () {

    // Transparansi Dinamis
    Route::get('/transparansi/{halaman?}', [TransparansiController::class, 'index'])
        ->name('transparansi');

    // Profil Desa
    Route::get('/profil', [ProfilDesaController::class, 'index'])->name('profil');

    // Galeri User
    Route::get('/galeri', [UserGaleriController::class, 'index'])->name('galeri');
    Route::get('/galeri/{filename}', [UserGaleriController::class, 'show'])->name('galeri.detail');

    // Keuangan & Pembangunan
    Route::get('/keuangan', fn() => view('user.page.home.administrasipenduduk'))->name('keuangan');
    Route::get('/pembangunan', fn() => view('user.page.home.layanan_kami'))->name('pembangunan');

    // Struktur
    Route::prefix('struktur')->name('struktur.')->group(function () {
        Route::get('/', fn() => view('user.page.struktur.struktur', ['halaman' => 'default']))->name('index');
        Route::get('/pemerintahan-desa', fn() => view('user.page.struktur.struktur', ['halaman' => 'pemerintahan_desa']))->name('pemerintahan_desa');
        Route::get('/bpd', fn() => view('user.page.struktur.struktur', ['halaman' => 'bpd']))->name('bpd');
        Route::get('/pkk', fn() => view('user.page.struktur.struktur', ['halaman' => 'pkk']))->name('pkk');
        Route::get('/lpm', fn() => view('user.page.struktur.struktur', ['halaman' => 'lpm']))->name('lpm');
        Route::get('/karang-taruna', fn() => view('user.page.struktur.struktur', ['halaman' => 'karang_taruna']))->name('karang_taruna');
        Route::get('/posyandu', fn() => view('user.page.struktur.struktur', ['halaman' => 'posyandu']))->name('posyandu');
    });

    // Berita
    Route::get('/berita', fn() => view('user.page.berita.berita'))->name('berita');
    Route::get('/berita/{slug}', fn($slug) => view('user.page.berita.berita_detail', ['slug' => $slug]))->name('berita.detail');

    // Kontak & Pengaduan
    Route::get('/pengaduan', fn() => view('user.page.home.kontak_saran'))->name('pengaduan');
    Route::get('/kontak', fn() => view('user.page.home.kontak_saran'))->name('kontak');
});


// =======================
// LAYANAN USER
// =======================
Route::prefix('layanan')->name('layanan.')->group(function () {
    Route::get('/pemerintahan', fn() => view('user.page.home.layanan_kami.pemerintahan', ['halaman' => 'pemerintahan']))->name('pemerintahan');
    Route::get('/pelayanan', fn() => view('user.page.home.layanan_kami.pelayanan', ['halaman' => 'pelayanan']))->name('pelayanan');
    Route::get('/kesra', fn() => view('user.page.home.layanan_kami.kesra', ['halaman' => 'kesra']))->name('kesra');
    Route::get('/bansos', fn() => view('user.page.home.layanan_kami.bansos', ['halaman' => 'bansos']))->name('bansos');
    Route::get('/kesehatan', fn() => view('user.page.home.layanan_kami.kesehatan_posyandu', ['halaman' => 'kesehatan']))->name('kesehatan');
    Route::get('/aspirasi', fn() => view('user.page.home.layanan_kami.aspirasi_pengaduan', ['halaman' => 'aspirasi']))->name('aspirasi');
});


// =======================
// ADMIN TANPA LOGIN
// =======================
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/', fn() => redirect()->route('admin.dashboard'));
    Route::get('/dashboard', fn() => view('admin.page.dashboard.index'))->name('dashboard');

    // CRUD Profil Desa
    Route::resource('profil_desa', App\Http\Controllers\Admin\ProfilDesaController::class);

    // CRUD Galeri
    Route::resource('galeri', AdminGaleriController::class);

    // CRUD Transparansi
    Route::prefix('transparansi')->name('transparansi.')->group(function () {

        Route::resource('anggaran', AdminAnggaranController::class);
        Route::resource('laporan', AdminLaporanController::class);
        Route::resource('dokumen', AdminDokumenController::class);
        Route::resource('bumdes', AdminBumdesController::class);

    });
});


Route::get('/view-file/{filename}', function ($filename) {
    $path = storage_path('app/public/uploads/transparansi_anggaran/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path, [
        'Content-Type' => mime_content_type($path),
        'Content-Disposition' => 'inline; filename="' . $filename . '"'
    ]);
})->name('view.file');


// =======================
// PROFILE (HANYA JIKA LOGIN)
// =======================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// =======================
// LOGIN ROUTES
// =======================
require __DIR__ . '/auth.php';
