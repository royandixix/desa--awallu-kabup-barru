<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Lpm;

class LpmController extends Controller
{
    /**
     * Menampilkan halaman struktur LPM Desa
     */
    public function index()
    {
        // Ambil semua data LPM terbaru
        $lpms = Lpm::latest()->get();

        // Menandai halaman untuk header agar menampilkan judul/deskripsi yang sesuai
        $halaman = 'lpm';

        // Kirim data ke view
        return view('user.page.struktur.lpm', compact('lpms', 'halaman'));
    }
}
