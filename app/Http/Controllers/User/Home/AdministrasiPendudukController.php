<?php

namespace App\Http\Controllers\User\Home;

use App\Http\Controllers\Controller;
use App\Models\AdministrasiPenduduk;
use App\Models\FotoWarga;
use App\Models\StrukturDesa;
use App\Models\Umkm; // <- import model UMKM

class AdministrasiPendudukController extends Controller
{
    public function administrasiPenduduk()
    {
        // Data administrasi penduduk
        $data = AdministrasiPenduduk::all();

        // Foto warga terbaru
        $fotos = FotoWarga::latest()->get();

        // Struktur organisasi
        $anggota = StrukturDesa::all();

        // UMKM desa
        $umkms = Umkm::all(); // <- tambahkan ini

        // Kirim semua variabel ke view
        return view('user.page.home.content', compact('data', 'fotos', 'anggota', 'umkms'));
    }
}
