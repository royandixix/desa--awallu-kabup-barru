<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\LaporanKegiatan;

class LaporanController extends Controller
{
    public function index()
    {
        $laporanKegiatan = LaporanKegiatan::latest()->paginate(9);
        $halaman = 'laporan'; // tambahkan ini
        return view('user.page.transparansi.laporan', compact('laporanKegiatan', 'halaman'));
    }

    public function detail($id)
    {
        $laporan = LaporanKegiatan::findOrFail($id);
        $halaman = 'laporan'; // tambahkan ini juga
        return view('user.page.transparansi.laporan_detail', compact('laporan', 'halaman'));
    }
}
