<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    // Daftar berita
    public function index()
    {
        $beritas = Berita::latest()->paginate(9);
        return view('user.page.berita.berita', compact('beritas'));
    }

    // Detail berita
    public function detail($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();

        // Ambil berita terkait: kategori sama, kecuali berita ini sendiri, limit 3
        $relatedBerita = Berita::where('kategori', $berita->kategori)
            ->where('id', '<>', $berita->id)
            ->latest()
            ->take(3)
            ->get();

        return view('user.page.berita.berita_detail', compact('berita', 'relatedBerita'));
    }
}
