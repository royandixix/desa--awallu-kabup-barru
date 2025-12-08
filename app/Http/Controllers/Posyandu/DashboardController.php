<?php

namespace App\Http\Controllers\Posyandu;

use App\Http\Controllers\Controller;
use App\Models\Posyandu\IbuHamil;
use App\Models\Posyandu\IbuMenyusui;
use App\Models\Posyandu\Bayi;
use App\Models\Posyandu\Balita;
use App\Models\Posyandu\Appras;
use App\Models\Posyandu\Pus;
use App\Models\Posyandu\Wus;
use App\Models\Posyandu\PraLansia;
use App\Models\Posyandu\Lansia;

class DashboardController extends Controller
{
    public function index()
    {
        // Total tiap kategori
        $totalIbuHamil = IbuHamil::count();
        $totalIbuMenyusui = IbuMenyusui::count();
        $totalBayi = Bayi::count();
        $totalBalita = Balita::count();
        $totalApras = Appras::count();
        $totalPUS = Pus::count();
        $totalWUS = Wus::count();
        $totalLansia = PraLansia::count() + Lansia::count();

        // Data untuk chart
        $chartData = [
            'labels' => ['Ibu Hamil', 'Ibu Menyusui', 'Bayi', 'Balita', 'Apras', 'PUS', 'WUS', 'Pra Lansia + Lansia'],
            'data' => [
                $totalIbuHamil,
                $totalIbuMenyusui,
                $totalBayi,
                $totalBalita,
                $totalApras,
                $totalPUS,
                $totalWUS,
                $totalLansia
            ]
        ];

        // Jika kamu pakai table per posyandu, contoh data dummy:
        $posyanduData = []; // nanti bisa query database posyandu
        $grandTotals = [
            'ibu_hamil' => $totalIbuHamil,
            'balita' => $totalBalita,
            'lansia' => $totalLansia,
            'total' => $totalIbuHamil + $totalIbuMenyusui + $totalBayi + $totalBalita + $totalApras + $totalPUS + $totalWUS + $totalLansia
        ];

        return view('admin_posyandu.page.dashboard.index', compact(
            'totalIbuHamil',
            'totalIbuMenyusui',
            'totalBayi',
            'totalBalita',
            'totalApras',
            'totalPUS',
            'totalWUS',
            'totalLansia',
            'chartData',
            'posyanduData',
            'grandTotals'
        ));
    }
}
