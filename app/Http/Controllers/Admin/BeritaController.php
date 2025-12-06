<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->paginate(10);
        return view('admin.page.berita.index', compact('beritas'));
    }

    public function create()
    {
        $kategoriList = Berita::distinct()->pluck('kategori');
        return view('admin.page.berita.create', compact('kategoriList'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'author' => 'nullable|string|max:255',
            'konten' => 'required|string',
            'image' => 'nullable|image|max:10240'
        ]);

        $validated['slug'] = Str::slug($validated['judul']);

        // === UPLOAD KE PUBLIC/uploads/berita ===
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();

            $file->move(public_path('uploads/berita'), $filename);

            $validated['image'] = 'uploads/berita/'.$filename;
        }

        Berita::create($validated);
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(Berita $berita)
    {
        $kategoriList = Berita::distinct()->pluck('kategori');
        return view('admin.page.berita.edit', compact('berita', 'kategoriList'));
    }

    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'author' => 'nullable|string|max:255',
            'konten' => 'required|string',
            'image' => 'nullable|image|max:10240'
        ]);

        $validated['slug'] = Str::slug($validated['judul']);

        // === UPDATE GAMBAR ===
        if ($request->hasFile('image')) {

            // Hapus file lama
            if ($berita->image && file_exists(public_path($berita->image))) {
                unlink(public_path($berita->image));
            }

            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();

            $file->move(public_path('uploads/berita'), $filename);

            $validated['image'] = 'uploads/berita/'.$filename;
        }

        $berita->update($validated);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil diupdate.');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->image && file_exists(public_path($berita->image))) {
            unlink(public_path($berita->image));
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
