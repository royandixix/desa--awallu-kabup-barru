<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\LaporanKegiatan;
use App\Models\TransparansiAnggaran;
use App\Models\TransparansiDokumen;
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
                $anggarans = TransparansiAnggaran::latest()->get();
                $rekap = TransparansiAnggaran::select('tahun', 'pemasukan', 'pengeluaran')
                    ->orderBy('tahun', 'desc')
                    ->get();
                break;

            case 'laporan':
                // Gunakan LaporanKegiatan dari admin
                $laporans = LaporanKegiatan::latest()->paginate(10);
                break;

            case 'dokumen':
                $dokumens = TransparansiDokumen::latest()->paginate(10);
                break;

            case 'bumdes':
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
