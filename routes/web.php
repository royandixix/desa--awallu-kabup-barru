<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\GaleriController as UserGaleriController;
use App\Http\Controllers\User\ProfilDesaController;
use App\Http\Controllers\User\TransparansiController;
use App\Http\Controllers\User\BeritaController as UserBeritaController;
use App\Http\Controllers\User\PemerintahanDesaController;
use App\Http\Controllers\User\BpdUserController;
use App\Http\Controllers\User\KarangTarunaController;
use App\Http\Controllers\User\LpmController as UserLpmController;
use App\Http\Controllers\User\PosyanduController as UserPosyanduController;
use App\Http\Controllers\Admin\ProfilDesaController as AdminProfilDesaController;
use App\Http\Controllers\Admin\GaleriController as AdminGaleriController;
use App\Http\Controllers\Admin\Transparansi\AnggaranController as AdminAnggaranController;
use App\Http\Controllers\Admin\Transparansi\LaporanController as AdminLaporanController;
use App\Http\Controllers\Admin\Transparansi\DokumenController as AdminDokumenController;
use App\Http\Controllers\Admin\Transparansi\BumdesController as AdminBumdesController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\PengaduanController;
use App\Http\Controllers\Admin\Struktur\PemerintahanDesaStrukturalController;
use App\Http\Controllers\Admin\Struktur\PemerintahanDesaAnggotaController;
use App\Http\Controllers\Admin\Struktur\BpdController;
use App\Http\Controllers\Admin\Struktur\PkkController;
use App\Http\Controllers\Admin\Struktur\LpmController;
use App\Http\Controllers\Admin\Struktur\KarangTarunaController as AdminKarangTarunaController;
use App\Http\Controllers\Admin\Struktur\PosyanduController;

Route::get('/', fn() => redirect()->route('user.home'));
Route::get('/home', fn() => view('user.page.home.content'))->name('user.home');

Route::prefix('user')->name('user.')->group(function () {
    Route::get('/transparansi/{halaman?}', [TransparansiController::class, 'index'])->name('transparansi');
    Route::get('/profil', [ProfilDesaController::class, 'index'])->name('profil');
    Route::get('/galeri', [UserGaleriController::class, 'index'])->name('galeri');
    Route::get('/galeri/{filename}', [UserGaleriController::class, 'show'])->name('galeri.detail');
    Route::get('/keuangan', fn() => view('user.page.home.administrasipenduduk'))->name('keuangan');
    Route::get('/pembangunan', fn() => view('user.page.home.layanan_kami'))->name('pembangunan');
    Route::get('/berita', [UserBeritaController::class, 'index'])->name('berita');
    Route::get('/berita/{slug}', [UserBeritaController::class, 'detail'])->name('berita.detail');
    Route::get('/kontak', fn() => view('user.page.home.kontak_saran'))->name('kontak');
    Route::get('/pengaduan', [App\Http\Controllers\User\PengaduanController::class, 'index'])->name('pengaduan.index');
    Route::post('/pengaduan', [App\Http\Controllers\User\PengaduanController::class, 'store'])->name('pengaduan.store');

    Route::prefix('struktur')->name('struktur.')->group(function () {
        Route::get('/', fn() => view('user.page.struktur.struktur', ['halaman' => 'default']))->name('index');
        Route::get('/pemerintahan-desa', [PemerintahanDesaController::class, 'index'])->name('pemerintahan_desa');
        Route::get('/bpd', [BpdUserController::class, 'index'])->name('bpd');
        Route::get('/pkk', fn() => view('user.page.struktur.struktur', ['halaman' => 'pkk']))->name('pkk');
        Route::get('/lpm', [UserLpmController::class, 'index'])->name('lpm');
        Route::get('/karang-taruna', [KarangTarunaController::class, 'index'])->name('karang_taruna');
        Route::get('/posyandu', [UserPosyanduController::class, 'index'])->name('posyandu');
    });
});

Route::prefix('layanan')->name('layanan.')->group(function () {
    $layanan = [
        'pemerintahan' => 'user.page.home.layanan_kami.pemerintahan',
        'pelayanan' => 'user.page.home.layanan_kami.pelayanan',
        'kesra' => 'user.page.home.layanan_kami.kesra',
        'bansos' => 'user.page.home.layanan_kami.bansos',
        'kesehatan' => 'user.page.home.layanan_kami.kesehatan_posyandu',
        'aspirasi' => 'user.page.home.layanan_kami.aspirasi_pengaduan'
    ];
    foreach ($layanan as $route => $view) {
        Route::get("/$route", fn() => view($view, ['halaman' => $route]))->name($route);
    }
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', fn() => redirect()->route('admin.dashboard'));
    Route::get('/dashboard', fn() => view('admin.page.dashboard.index'))->name('dashboard');
    Route::resource('profil_desa', AdminProfilDesaController::class);
    Route::resource('galeri', AdminGaleriController::class);
    Route::resource('berita', AdminBeritaController::class)->parameters(['berita' => 'berita']);
    Route::prefix('transparansi')->name('transparansi.')->group(function () {
        Route::resource('anggaran', AdminAnggaranController::class);
        Route::resource('laporan', AdminLaporanController::class);
        Route::resource('dokumen', AdminDokumenController::class);
        Route::resource('bumdes', AdminBumdesController::class);
    });
    Route::prefix('struktur')->name('struktur.')->group(function () {
        Route::prefix('pemerintahan_desa')->name('pemerintahan_desa.')->group(function () {
            Route::resource('struktural', PemerintahanDesaStrukturalController::class);
            Route::resource('anggota', PemerintahanDesaAnggotaController::class);
        });
        Route::resource('bpd', BpdController::class);
        Route::resource('pkk', PkkController::class);
        Route::resource('lpm', LpmController::class);
        Route::resource('karang_taruna', AdminKarangTarunaController::class);
        Route::resource('posyandu', PosyanduController::class);
    });
    Route::prefix('struktur/bpd')->name('struktur.bpd.')->group(function () {
        Route::get('/', [BpdController::class, 'index'])->name('index');
        Route::get('/create', [BpdController::class, 'create'])->name('create');
        Route::post('/store', [BpdController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [BpdController::class, 'edit'])->name('edit');
        Route::put('/{id}', [BpdController::class, 'update'])->name('update');
        Route::delete('/{id}', [BpdController::class, 'destroy'])->name('destroy');
    });
    Route::get('pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
    Route::get('pengaduan/{id}', [PengaduanController::class, 'show'])->name('pengaduan.show');
    Route::post('pengaduan/{id}/status', [PengaduanController::class, 'updateStatus'])->name('pengaduan.updateStatus');
    Route::delete('pengaduan/{id}', [PengaduanController::class, 'destroy'])->name('pengaduan.destroy');
});

Route::get('/view-file/{filename}', function ($filename) {
    $path = storage_path('app/public/uploads/transparansi_anggaran/' . $filename);
    if (!file_exists($path)) abort(404);
    return response()->file($path, [
        'Content-Type' => mime_content_type($path),
        'Content-Disposition' => 'inline; filename="' . $filename . '"'
    ]);
})->name('view.file');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
