<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdministrasiPenduduk;
use App\Models\Umkm;
use App\Models\Berita;
use App\Models\Pengaduan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPenduduk = AdministrasiPenduduk::sum('jumlah') ?? 0;
        $totalUMKM = Umkm::count();
        $totalBerita = Berita::count();
        $pengaduanPending = Pengaduan::where('status', 'pending')->count();

        return view('admin.page.dashboard.index', compact(
            'totalPenduduk',
            'totalUMKM',
            'totalBerita',
            'pengaduanPending'
        ));
    }
}
