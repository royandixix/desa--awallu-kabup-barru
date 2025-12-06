<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\TransparansiAnggaran;
use App\Models\TransparansiDokumen;
use App\Models\TransparansiLaporan;
use App\Models\TransparansiBumdes;

class TransparansiController extends Controller
{
    public function index($halaman = 'anggaran')
    {
        $anggarans = null;
        $rekap = null;
        $dokumens = null;
        $laporans = null;
        $bumdes = null;

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
                // Kirim data laporan agar tidak undefined
                $laporans = TransparansiLaporan::latest()->paginate(10);
                break;

            case 'dokumen':
                // Data dokumen dari database
                $dokumens = TransparansiDokumen::latest()->paginate(10);
                break;

            case 'bumdes':
                // Kirim data bumdes agar tidak undefined
                $bumdes = TransparansiBumdes::latest()->paginate(10);
                break;

            default:
                abort(404);
        }

        return view('user.page.transparansi.transparansi', compact(
            'halaman',
            'anggarans',
            'rekap',
            'dokumens',
            'laporans',
            'bumdes'
        ));
    }
}
