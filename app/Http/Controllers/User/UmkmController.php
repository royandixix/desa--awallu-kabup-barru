<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Umkm;

class UmkmController extends Controller
{
    /**
     * Tampilkan daftar UMKM.
     *
     * @param  int|null $all
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $all = request('all');

        if ($all == 1) {
            // Tampilkan semua UMKM
            $umkms = Umkm::all();
            return view('user.page.home.umkm.umkm_selengkap_nyh', compact('umkms'));
        }

        // Homepage, tampilkan UMKM terbatas
        $umkms = Umkm::latest()->take(6)->get();
        return view('user.page.home.umkm.umkm', compact('umkms'));
    }


    /**
     * Tampilkan detail UMKM berdasarkan ID
     *
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $umkm = Umkm::findOrFail($id);
        return view('user.page.home.umkm.detail_umkm', compact('umkm'));
    }
}
