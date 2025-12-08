<?php

namespace App\Http\Controllers\User\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FotoWarga; // pastikan model sesuai tabel

class FotoBersamaWargaController extends Controller
{
    public function index()
    {
        // Ambil data hero pertama (atau terbaru)
        $hero = FotoWarga::latest()->first();

        // Ambil semua foto untuk galeri bawah (opsional)
        $galeri = FotoWarga::latest()->get();

        return view('user.page.home.foto_bersama_warga', compact('hero', 'galeri'));
    }
}
