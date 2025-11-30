<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class GaleriController extends Controller
{
    protected $path;

    public function __construct()
    {
        $this->path = public_path('uploads/galeri');
        if (!File::exists($this->path)) {
            File::makeDirectory($this->path, 0755, true);
        }
    }

    public function index(Request $request)
    {
        // Ambil semua data galeri dari database
        $files = Galeri::orderBy('tanggal', 'desc')->get();

        // Pagination manual
        $page = $request->get('page', 1);
        $perPage = 6;
        $total = $files->count();
        $paginated = $files->forPage($page, $perPage)->values();
        $totalPages = ceil($total / $perPage);

        return view('user.page.galeri.galeri', compact(
            'paginated', 'page', 'perPage', 'totalPages'
        ));
    }

    public function show($filename)
    {
        $galeri = Galeri::where('file', $filename)->firstOrFail();
        return view('user.page.galeri.detail_gambar', compact('galeri'));
    }
}
