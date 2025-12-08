<?php

namespace App\Http\Controllers\User\Home;

use App\Http\Controllers\Controller;
use App\Models\AdministrasiPenduduk;
use App\Models\FotoWarga;

class AdministrasiPendudukController extends Controller
{
    public function administrasiPenduduk()
    {
        $data = AdministrasiPenduduk::all();

        // Tambahan untuk galeri foto
        $fotos = FotoWarga::latest()->get();

        return view('user.page.home.content', compact('data', 'fotos'));
    }
}
