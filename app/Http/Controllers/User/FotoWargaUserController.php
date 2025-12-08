<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\FotoWarga;

class FotoWargaUserController extends Controller
{
    /**
     * Menampilkan semua foto warga kepada user
     */
    public function index()
    {
        // Ambil semua foto terbaru
        $fotos = FotoWarga::latest()->get();

        // Kirim ke view user
        return view('user.page.home.foto_bersama_warga', compact('fotos'));
    }
}
