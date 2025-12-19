<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

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

    // INDEX
    public function index()
    {
        $images = Galeri::latest()->paginate(12);
        return view('admin.page.galeri.index', compact('images'));
    }

    // CREATE
    public function create()
    {
        return view('admin.page.galeri.create');
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'judul'    => 'required|string|max:255',
            'desc'     => 'nullable|string',
            'lokasi'   => 'nullable|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'tanggal'  => 'nullable|date',
            'file'     => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $file = $request->file('file');
        $filename = time() . '_' . Str::slug($request->judul) . '.' . $file->getClientOriginalExtension();
        $file->move($this->path, $filename);

        Galeri::create([
            'judul'    => $request->judul,
            'desc'     => $request->desc,
            'lokasi'   => $request->lokasi,
            'kategori' => $request->kategori,
            'tanggal'  => $request->tanggal ? Carbon::parse($request->tanggal) : null,
            'file'     => $filename,
        ]);

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Gambar berhasil ditambahkan!');
    }

    // EDIT
    public function edit(Galeri $galeri)
    {
        return view('admin.page.galeri.edit', compact('galeri'));
    }

    // UPDATE
    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'judul'    => 'required|string|max:255',
            'desc'     => 'nullable|string',
            'lokasi'   => 'nullable|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'tanggal'  => 'nullable|date',
            'file'     => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('file')) {
            if (File::exists($this->path . '/' . $galeri->file)) {
                File::delete($this->path . '/' . $galeri->file);
            }

            $file = $request->file('file');
            $filename = time() . '_' . Str::slug($request->judul) . '.' . $file->getClientOriginalExtension();
            $file->move($this->path, $filename);

            $galeri->file = $filename;
        }

        $galeri->update([
            'judul'    => $request->judul,
            'desc'     => $request->desc,
            'lokasi'   => $request->lokasi,
            'kategori' => $request->kategori,
            'tanggal'  => $request->tanggal ? Carbon::parse($request->tanggal) : null,
            'file'     => $galeri->file,
        ]);

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Gambar berhasil diperbarui!');
    }

    // DELETE
    public function destroy(Galeri $galeri)
    {
        if (File::exists($this->path . '/' . $galeri->file)) {
            File::delete($this->path . '/' . $galeri->file);
        }

        $galeri->delete();

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Gambar berhasil dihapus!');
    }
}
