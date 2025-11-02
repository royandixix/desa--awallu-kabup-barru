<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GaleriController extends Controller
{
    // Menampilkan semua gambar galeri
    public function index()
    {
        $path = public_path('img/user/galeri');
        $files = collect(File::files($path))->map(function ($file) {
            $name = pathinfo($file, PATHINFO_FILENAME);
            return [
                'file' => basename($file),
                'title' => ucwords(str_replace('_', ' ', $name)),
                'desc' => 'Dokumentasi kegiatan ' . ucwords(str_replace('_', ' ', $name)) . ' yang dilaksanakan di Desa Lawallu.'
            ];
        });

        $page = request()->get('page', 1);
        $perPage = 6;
        $total = count($files);
        $paginated = $files->forPage($page, $perPage);
        $totalPages = ceil($total / $perPage);

        return view('user.page.galeri.galeri', compact('paginated', 'page', 'totalPages'));
    }

    // Menampilkan detail gambar
    public function show($filename)
    {
        $path = public_path('img/user/galeri/' . $filename);

        if (!file_exists($path)) {
            abort(404, 'Gambar tidak ditemukan.');
        }

        $title = ucwords(str_replace('_', ' ', pathinfo($filename, PATHINFO_FILENAME)));
        $desc = 'Dokumentasi kegiatan ' . $title . ' yang dilaksanakan di Desa Lawallu.';

        return view('user.page.galeri.detail_gambar', compact('filename', 'title', 'desc'));
    }
}
