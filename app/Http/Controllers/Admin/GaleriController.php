<?php

namespace App\Http\Controllers\Admin;

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
            'title'    => 'required|string|max:255',
            'desc'     => 'nullable|string',
            'lokasi'   => 'nullable|string|max:100',
            'kategori' => 'nullable|string|max:100',
            'tanggal'  => 'nullable|date',
            'file'     => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $file = $request->file('file');
        $filename = time() . '_' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
        $file->move($this->path, $filename);

        Galeri::create([
            'title'    => $request->title,
            'desc'     => $request->desc,
            'lokasi'   => $request->lokasi,
            'kategori' => $request->kategori,
            'tanggal'  => $request->tanggal,
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
            'title'    => 'required|string|max:255',
            'desc'     => 'nullable|string',
            'lokasi'   => 'nullable|string|max:100',
            'kategori' => 'nullable|string|max:100',
            'tanggal'  => 'nullable|date',
            'file'     => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('file')) {

            if (File::exists($this->path . '/' . $galeri->file)) {
                File::delete($this->path . '/' . $galeri->file);
            }

            $file = $request->file('file');
            $filename = time() . '_' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
            $file->move($this->path, $filename);

            $galeri->file = $filename;
        }

        $galeri->update([
            'title'    => $request->title,
            'desc'     => $request->desc,
            'lokasi'   => $request->lokasi,
            'kategori' => $request->kategori,
            'tanggal'  => $request->tanggal,
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
