<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\StrukturDesa;

class PemerintahanDesaController extends Controller
{
    public function index()
    {
        // Bagian STRUKTURAL
        $bagan = StrukturDesa::where('kategori', 'pemerintahan_desa_bagan')->first();

        // Bagian ANGGOTA
        $anggota = StrukturDesa::where('kategori', 'pemerintahan_desa')
            ->orderBy('id')
            ->get();

        $halaman = 'pemerintahan_desa';

        return view('user.page.struktur.pemerintahan_desa', compact('bagan', 'anggota', 'halaman'));
    }
}
