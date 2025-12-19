<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Umkm;

class UserUmkmController extends Controller
{
    public function index()
    {
        $umkms = Umkm::orderBy('created_at', 'desc')->paginate(10);
        return view('user.page.home.umkm.umkm', compact('umkms'));
    }

    public function show($id)
    {
        $umkm = Umkm::with('produk')->findOrFail($id);
        return view('user.page.home.umkm.detail_umkm', compact('umkm'));
    }

    public function selengkap()
    {
        $umkms = Umkm::orderBy('created_at', 'desc')->paginate(12); // pagination optional
        return view('user.page.home.umkm.umkm_selengkap_nyh', compact('umkms'));
    }
}
