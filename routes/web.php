<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
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
use App\Http\Controllers\User\LaporanController as UserLaporanController;
use App\Http\Controllers\User\PengaduanController;
use App\Http\Controllers\User\KontakSaranController;
use App\Http\Controllers\User\Home\AdministrasiPendudukController;
use App\Http\Controllers\User\Home\FotoBersamaWargaController;
use App\Http\Controllers\Admin\ProfilDesaController as AdminProfilDesaController;
use App\Http\Controllers\Admin\GaleriController as AdminGaleriController;
use App\Http\Controllers\Admin\Transparansi\AnggaranController as AdminAnggaranController;
use App\Http\Controllers\Admin\Transparansi\LaporanController as AdminLaporanController;
use App\Http\Controllers\Admin\Transparansi\DokumenController as AdminDokumenController;
use App\Http\Controllers\Admin\Transparansi\BumdesController as AdminBumdesController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\PengaduanController as AdminPengaduanController;
use App\Http\Controllers\Admin\KontakSaranController as AdminKontakSaranController;
use App\Http\Controllers\Admin\Struktur\PemerintahanDesaStrukturalController;
use App\Http\Controllers\Admin\Struktur\PemerintahanDesaAnggotaController;
use App\Http\Controllers\Admin\Struktur\BpdController;
use App\Http\Controllers\Admin\Struktur\PkkController;
use App\Http\Controllers\Admin\Struktur\LpmController;
use App\Http\Controllers\Admin\Struktur\KarangTarunaController as AdminKarangTarunaController;
use App\Http\Controllers\Admin\Struktur\PosyanduController as AdminPosyanduController;
use App\Http\Controllers\Admin\Home\AdministrasiController;
use App\Http\Controllers\Admin\Home\FotoWargaController;
use App\Http\Controllers\Admin\Home\KeindahanController;
use App\Http\Controllers\Admin\Home\SambutanController;
use App\Http\Controllers\Admin\Home\StrukturController;
use App\Http\Controllers\Admin\Home\VisimisiController;
use App\Http\Controllers\Posyandu\ApprasController;
use App\Http\Controllers\Posyandu\IbuHamilController;
use App\Http\Controllers\Posyandu\IbuMenyusuiController;
use App\Http\Controllers\Posyandu\BayiController;
use App\Http\Controllers\Posyandu\BalitaController;
use App\Http\Controllers\Posyandu\PusController;
use App\Http\Controllers\Posyandu\WusController;
use App\Http\Controllers\Posyandu\PraLansiaController;
use App\Http\Controllers\Posyandu\LansiaController;
use App\Http\Controllers\Posyandu\DashboardController as PosyanduDashboardController;
use App\Http\Controllers\Admin\Home\UmkmAdminController;
use App\Http\Controllers\Admin\Home\UmkmController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\User\FotoWargaUserController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', fn() => redirect()->route('user.home'));
Route::get('/home', [AdministrasiPendudukController::class, 'administrasiPenduduk'])->name('user.home');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('home/umkm', [UmkmController::class, 'index'])->name('home.umkm.index');
    Route::get('home/umkm/create', [UmkmController::class, 'create'])->name('home.umkm.create');
    Route::post('home/umkm', [UmkmController::class, 'store'])->name('home.umkm.store');
    Route::get('home/umkm/{umkm}/edit', [UmkmController::class, 'edit'])->name('home.umkm.edit');
    Route::put('home/umkm/{umkm}', [UmkmController::class, 'update'])->name('home.umkm.update');
    Route::get('home/umkm/{umkm}', [UmkmController::class, 'show'])->name('home.umkm.show');
    Route::delete('home/umkm/{umkm}', [UmkmController::class, 'destroy'])->name('home.umkm.destroy');
    Route::resource('profil_desa', AdminProfilDesaController::class);
    Route::resource('galeri', AdminGaleriController::class);
    Route::resource('berita', AdminBeritaController::class)->parameters(['berita' => 'berita']);
    Route::resource('kontak-saran', AdminKontakSaranController::class)->only(['index', 'show', 'destroy']);
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
        Route::resource('posyandu', AdminPosyanduController::class);
    });
    Route::prefix('home')->name('home.')->group(function () {
        Route::resource('administrasi', AdministrasiController::class);
        Route::resource('foto-warga', FotoWargaController::class)->names([
            'index' => 'foto_warga.index',
            'create' => 'foto_warga.create',
            'store' => 'foto_warga.store',
            'show' => 'foto_warga.show',
            'edit' => 'foto_warga.edit',
            'update' => 'foto_warga.update',
            'destroy' => 'foto_warga.destroy',
        ]);
        Route::get('/keindahan', [KeindahanController::class, 'index'])->name('keindahan.index');
        Route::get('/sambutan', [SambutanController::class, 'index'])->name('sambutan.index');
        Route::get('/struktur', [StrukturController::class, 'index'])->name('struktur.index');
        Route::get('/visimisi', [VisimisiController::class, 'index'])->name('visimisi.index');
        Route::prefix('home')->name('home.')->group(function () {
            Route::resource('umkm', UmkmAdminController::class);
        });
    });
    Route::get('pengaduan', [AdminPengaduanController::class, 'index'])->name('pengaduan.index');
    Route::get('pengaduan/{id}', [AdminPengaduanController::class, 'show'])->name('pengaduan.show');
    Route::post('pengaduan/{id}/status', [AdminPengaduanController::class, 'updateStatus'])->name('pengaduan.updateStatus');
    Route::delete('pengaduan/{id}', [AdminPengaduanController::class, 'destroy'])->name('pengaduan.destroy');
});

Route::prefix('admin-posyandu')->name('admin_posyandu.')->group(function () {
    Route::get('/dashboard', [PosyanduDashboardController::class, 'index'])->name('dashboard');
    Route::get('/ibu-hamil', [IbuHamilController::class, 'index'])->name('ibu-hamil.index');
    Route::get('/ibu-hamil/create', [IbuHamilController::class, 'create'])->name('ibu-hamil.create');
    Route::post('/ibu-hamil', [IbuHamilController::class, 'store'])->name('ibu-hamil.store');
    Route::get('/ibu-hamil/{ibu_hamil}/edit', [IbuHamilController::class, 'edit'])->name('ibu-hamil.edit');
    Route::put('/ibu-hamil/{ibu_hamil}', [IbuHamilController::class, 'update'])->name('ibu-hamil.update');
    Route::delete('/ibu-hamil/{ibu_hamil}', [IbuHamilController::class, 'destroy'])->name('ibu-hamil.destroy');
    Route::get('/ibu-menyusui', [IbuMenyusuiController::class, 'index'])->name('ibu-menyusui.index');
    Route::get('/ibu-menyusui/create', [IbuMenyusuiController::class, 'create'])->name('ibu-menyusui.create');
    Route::post('/ibu-menyusui', [IbuMenyusuiController::class, 'store'])->name('ibu-menyusui.store');
    Route::get('/ibu-menyusui/{id}/edit', [IbuMenyusuiController::class, 'edit'])->name('ibu-menyusui.edit');
    Route::put('/ibu-menyusui/{id}', [IbuMenyusuiController::class, 'update'])->name('ibu-menyusui.update');
    Route::delete('/ibu-menyusui/{id}', [IbuMenyusuiController::class, 'destroy'])->name('ibu-menyusui.destroy');
    Route::get('/bayi-0-sampai-12-bulan', [BayiController::class, 'index'])->name('bayi_0_sampai_12_bulan.index');
    Route::get('/bayi-0-sampai-12-bulan/create', [BayiController::class, 'create'])->name('bayi_0_sampai_12_bulan.create');
    Route::post('/bayi-0-sampai-12-bulan', [BayiController::class, 'store'])->name('bayi_0_sampai_12_bulan.store');
    Route::get('/bayi-0-sampai-12-bulan/{id}/edit', [BayiController::class, 'edit'])->name('bayi_0_sampai_12_bulan.edit');
    Route::put('/bayi-0-sampai-12-bulan/{id}', [BayiController::class, 'update'])->name('bayi_0_sampai_12_bulan.update');
    Route::delete('/bayi-0-sampai-12-bulan/{id}', [BayiController::class, 'destroy'])->name('bayi_0_sampai_12_bulan.destroy');
    Route::prefix('balita')->name('balita.')->group(function () {
        Route::get('/', [BalitaController::class, 'index'])->name('index');
        Route::get('/create', [BalitaController::class, 'create'])->name('create');
        Route::post('/', [BalitaController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [BalitaController::class, 'edit'])->name('edit');
        Route::put('/{id}', [BalitaController::class, 'update'])->name('update');
        Route::delete('/{id}', [BalitaController::class, 'destroy'])->name('destroy');
    });
    Route::resource('pus', PusController::class);
    Route::resource('wus', WusController::class);
    Route::resource('pra_lansia', PraLansiaController::class);
    Route::resource('lansia', LansiaController::class);
    Route::get('/apras', [ApprasController::class, 'index'])->name('apras.index');
    Route::get('/apras/create', [ApprasController::class, 'create'])->name('apras.create');
    Route::post('/apras', [ApprasController::class, 'store'])->name('apras.store');
    Route::get('/apras/{id}/edit', [ApprasController::class, 'edit'])->name('apras.edit');
    Route::put('/apras/{id}', [ApprasController::class, 'update'])->name('apras.update');
    Route::delete('/apras/{id}', [ApprasController::class, 'destroy'])->name('apras.destroy');
});

Route::resource('appras', ApprasController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/foto-bersama-warga', [FotoWargaUserController::class, 'index'])->name('user.foto_warga');

Route::get('/view-file/{filename}', function ($filename) {
    $path = storage_path('app/public/uploads/transparansi_anggaran/' . $filename);
    if (!file_exists($path)) abort(404);
    return response()->file($path, [
        'Content-Type' => mime_content_type($path),
        'Content-Disposition' => 'inline; filename="' . $filename . '"'
    ]);
})->name('view.file');

Route::prefix('user')->name('user.')->group(function () {
    Route::get('/transparansi/laporan', [UserLaporanController::class, 'index'])->name('laporan.index');
    Route::get('/transparansi/laporan/{id}', [UserLaporanController::class, 'detail'])->name('laporan.detail');
    Route::get('/transparansi/{halaman?}', [TransparansiController::class, 'index'])->name('transparansi');
    Route::get('/profil', [ProfilDesaController::class, 'index'])->name('profil');
    Route::get('/galeri', [UserGaleriController::class, 'index'])->name('galeri');
    Route::get('/galeri/{filename}', [UserGaleriController::class, 'show'])->name('galeri.detail');
    Route::get('/berita', [UserBeritaController::class, 'index'])->name('berita');
    Route::get('/berita/{slug}', [UserBeritaController::class, 'detail'])->name('berita.detail');
    Route::get('/keuangan', fn() => view('user.page.home.administrasipenduduk'))->name('keuangan');
    Route::get('/pembangunan', fn() => view('user.page.home.layanan_kami'))->name('pembangunan');
    Route::get('/kontak', fn() => view('user.page.home.kontak_saran'))->name('kontak');
    Route::post('/kontak', [KontakSaranController::class, 'store'])->name('kontak.store');
    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
    Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');
    Route::get('/foto_bersama_warga', [FotoBersamaWargaController::class, 'index'])->name('foto_bersama_warga');
    Route::get('/umkm', [\App\Http\Controllers\User\UserUmkmController::class, 'index'])->name('umkm.index');
    Route::get('/umkm/selengkap', [\App\Http\Controllers\User\UserUmkmController::class, 'selengkap'])->name('umkm.umkm_selengkap_nyh');
    Route::get('/umkm/{id}', [\App\Http\Controllers\User\UserUmkmController::class, 'show'])->name('umkm.detail');
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
