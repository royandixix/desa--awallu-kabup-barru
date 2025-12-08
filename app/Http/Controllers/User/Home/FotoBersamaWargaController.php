<?php

namespace App\Http\Controllers\User\Home;

use App\Http\Controllers\Controller;
use App\Models\FotoWarga;

class FotoBersamaWargaController extends Controller
{
    public function index()
{
    $hero = FotoWarga::latest()->first();

    return view('user.page.home.layanan_kami.foto_bersama_warga', compact('hero'));
}

}