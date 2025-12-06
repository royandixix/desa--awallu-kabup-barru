<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\KarangTaruna;

class KarangTarunaController extends Controller
{
    public function index()
    {
        $karangTarunas = KarangTaruna::latest()->get();
        $halaman = 'karang_taruna';
        return view('user.page.struktur.karang_taruna', compact('karangTarunas', 'halaman'));
    }
}
