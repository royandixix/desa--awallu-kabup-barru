<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// USER Controllers
use App\Http\Controllers\User\GaleriController as UserGaleriController;
use App\Http\Controllers\User\ProfilDesaController;
use App\Http\Controllers\User\TransparansiController;
use App\Http\Controllers\User\BeritaController as UserBeritaController;
use App\Http\Controllers\User\PemerintahanDesaController;
use App\Http\Controllers\User\BpdUserController;
use App\Http\Controllers\User\KarangTarunaController as UserKarangTaruna;
use App\Http\Controllers\User\StrukturController;
use App\Http\Controllers\User\UmkmController;

// ADMIN Controllers
use App\Http\Controllers\Admin\ProfilDesaController as AdminProfilDesaController;
use App\Http\Controllers\Admin\GaleriController as AdminGaleriController;
use App\Http\Controllers\Admin\Transparansi\AnggaranController as AdminAnggaranController;
use App\Http\Controllers\Admin\Transparansi\LaporanController as AdminLaporanController;
use App\Http\Controllers\Admin\Transparansi\DokumenController as AdminDokumenController;
use App\Http\Controllers\Admin\Transparansi\BumdesController as AdminBumdesController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\Home\UmkmAdminController;

// STRUKTUR ADMIN
use App\Http\Controllers\Admin\Struktur\PemerintahanDesaStrukturalController;
use App\Http\Controllers\Admin\Struktur\PemerintahanDesaAnggotaController;
use App\Http\Controllers\Admin\Struktur\BpdController;
use App\Http\Controllers\Admin\Struktur\PkkController;
use App\Http\Controllers\Admin\Struktur\LpmController;
use App\Http\Controllers\Admin\Struktur\KarangTarunaController;
use App\Http\Controllers\Admin\Struktur\PosyanduController;

/*
|--------------------------------------------------------------------------
| HALAMAN UTAMA USER
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => redirect()->route('user.home'));
Route::get('/home', fn() => view('user.page.home.content'))->name('user.home');

/*
|--------------------------------------------------------------------------
| USER ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('user')->name('user.')->group(function () {

    // Profil & Transparansi
    Route::get('/transparansi/{halaman?}', [TransparansiController::class, 'index'])->name('transparansi');
    Route::get('/profil', [ProfilDesaController::class, 'index'])->name('profil');

    // Galeri
    Route::get('/galeri', [UserGaleriController::class, 'index'])->name('galeri');
    Route::get('/galeri/{filename}', [UserGaleriController::class, 'show'])->name('galeri.detail');

    // Halaman statis
    Route::get('/keuangan', fn() => view('user.page.home.administrasipenduduk'))->name('keuangan');
    Route::get('/pembangunan', fn() => view('user.page.home.layanan_kami'))->name('pembangunan');

    // Struktur Desa
    Route::prefix('struktur')->name('struktur.')->group(function () {
        Route::get('/', fn() => view('user.page.struktur.struktur', ['halaman' => 'default']))->name('index');
        Route::get('/pemerintahan-desa', [PemerintahanDesaController::class, 'index'])->name('pemerintahan_desa');
        Route::get('/bpd', [BpdUserController::class, 'index'])->name('bpd');
        Route::get('/pkk', fn() => view('user.page.struktur.struktur', ['halaman' => 'pkk']))->name('pkk');
        Route::get('/lpm', fn() => view('user.page.struktur.struktur', ['halaman' => 'lpm']))->name('lpm');
        Route::get('/karang-taruna', [UserKarangTaruna::class, 'index'])->name('karang_taruna');
        Route::get('/posyandu', fn() => view('user.page.struktur.struktur', ['halaman' => 'posyandu']))->name('posyandu');
    });

   // Daftar UMKM (bisa optional ?all=1 via query string, bukan parameter)
Route::get('/umkm', [UmkmController::class, 'index'])->name('umkm.index');
// Halaman UMKM Selengkapnya
Route::get('/umkm/selengkap', [UmkmController::class, 'selengkap'])->name('user.umkm.umkm_selengkap_nyh');

// Detail UMKM
Route::get('/umkm/{id}', [UmkmController::class, 'show'])->name('umkm.detail');


    // Berita
    Route::get('/berita', [UserBeritaController::class, 'index'])->name('berita');
    Route::get('/berita/{slug}', [UserBeritaController::class, 'detail'])->name('berita.detail');

    // Kontak / pengaduan
    Route::get('/pengaduan', fn() => view('user.page.home.kontak_saran'))->name('pengaduan');
    Route::get('/kontak', fn() => view('user.page.home.kontak_saran'))->name('kontak');
    Route::get('/struktur-organisasi', [StrukturController::class, 'organisasi'])->name('user.struktur');
});

/*
|--------------------------------------------------------------------------
| LAYANAN USER
|--------------------------------------------------------------------------
*/
Route::prefix('layanan')->name('layanan.')->group(function () {
    Route::get('/pemerintahan', fn() => view('user.page.home.layanan_kami.pemerintahan'))->name('pemerintahan');
    Route::get('/pelayanan', fn() => view('user.page.home.layanan_kami.pelayanan'))->name('pelayanan');
    Route::get('/kesra', fn() => view('user.page.home.layanan_kami.kesra'))->name('kesra');
    Route::get('/bansos', fn() => view('user.page.home.layanan_kami.bansos'))->name('bansos');
    Route::get('/kesehatan', fn() => view('user.page.home.layanan_kami.kesehatan_posyandu'))->name('kesehatan');
    Route::get('/aspirasi', fn() => view('user.page.home.layanan_kami.aspirasi_pengaduan'))->name('aspirasi');
});

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/', fn() => redirect()->route('admin.dashboard'));
    Route::get('/dashboard', fn() => view('admin.page.dashboard.index'))->name('dashboard');

    // UMKM ADMIN (sesuai sidebar)
  
        Route::resource('umkm', UmkmAdminController::class);
   

    // CRUD Admin
    Route::resource('profil_desa', AdminProfilDesaController::class);
    Route::resource('galeri', AdminGaleriController::class);

    /*
    |--------------------------------------------------------------------------
    | Transparansi Admin
    |--------------------------------------------------------------------------
    */
    Route::prefix('transparansi')->name('transparansi.')->group(function () {
        Route::resource('anggaran', AdminAnggaranController::class);
        Route::resource('laporan', AdminLaporanController::class);
        Route::resource('dokumen', AdminDokumenController::class);
        Route::resource('bumdes', AdminBumdesController::class);
    });

    /*
    |--------------------------------------------------------------------------
    | Struktur Desa Admin
    |--------------------------------------------------------------------------
    */
    Route::prefix('struktur')->name('struktur.')->group(function () {
        // Pemerintahan Desa
        Route::prefix('pemerintahan_desa')->name('pemerintahan_desa.')->group(function () {
        Route::resource('struktural', PemerintahanDesaStrukturalController::class);
            Route::resource('anggota', PemerintahanDesaAnggotaController::class);
        });

        // Struktur Lainnya
        Route::resource('bpd', BpdController::class);
        Route::resource('pkk', PkkController::class);
        Route::resource('lpm', LpmController::class);
        Route::resource('karang_taruna', KarangTarunaController::class);
        Route::resource('posyandu', PosyanduController::class);
    });

    /*
    |--------------------------------------------------------------------------
    | Admin BPD CRUD (Manual)
    |--------------------------------------------------------------------------
    */
    Route::prefix('struktur/bpd')->name('struktur.bpd.')->group(function () {
        Route::get('/', [BpdController::class, 'index'])->name('index');
        Route::get('/create', [BpdController::class, 'create'])->name('create');
        Route::post('/store', [BpdController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [BpdController::class, 'edit'])->name('edit');
        Route::put('/{id}', [BpdController::class, 'update'])->name('update');
        Route::delete('/{id}', [BpdController::class, 'destroy'])->name('destroy');
    });

    // Berita Admin
    Route::resource('berita', AdminBeritaController::class)
        ->parameters(['berita' => 'berita']);
});


/*
|--------------------------------------------------------------------------
| FILE VIEWER PUBLIC FILES
|--------------------------------------------------------------------------
*/
Route::get('/view-file/{filename}', function ($filename) {
    $path = storage_path('app/public/uploads/transparansi_anggaran/' . $filename);
    if (!file_exists($path)) abort(404);
    return response()->file($path, [
        'Content-Type' => mime_content_type($path),
        'Content-Disposition' => 'inline; filename="' . $filename . '"'
    ]);
})->name('view.file');

/*
|--------------------------------------------------------------------------
| PROFILE AUTH USER
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
