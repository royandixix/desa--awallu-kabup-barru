<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\TransparansiAnggaran;

class TransparansiController extends Controller
{
    public function index($halaman = 'anggaran')
    {
        $anggarans = null;
        $rekap = null;

        switch ($halaman) {

            case 'anggaran':
                // Data utama anggaran
                $anggarans = TransparansiAnggaran::latest()->get();
 
                // Rekap (dipakai oleh anggaran.blade)
                $rekap = TransparansiAnggaran::select('tahun', 'pemasukan', 'pengeluaran')
                    ->orderBy('tahun', 'desc')
                    ->get();
                break;

            case 'laporan':
                break;

            case 'dokumen':
                break;

            case 'bumdes':
                break;

            default:
                abort(404);
        }

        return view('user.page.transparansi.transparansi', compact(
            'halaman',
            'anggarans',
            'rekap'
        ));
    }
}
