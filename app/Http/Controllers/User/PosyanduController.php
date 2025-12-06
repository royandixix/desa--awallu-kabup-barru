<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Posyandu;

class PosyanduController extends Controller
{
    public function index()
    {
        // ambil data Posyandu terbaru dengan pagination 9 per halaman
        $posyandus = Posyandu::orderBy('created_at', 'desc')->paginate(9);

        // kirim data ke view, plus halaman agar header bisa baca $halaman
        return view('user.page.struktur.posyandu', [
            'posyandus' => $posyandus,
            'halaman' => 'posyandu', 
        ]);
    }
}
