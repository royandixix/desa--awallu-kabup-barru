<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FotoWarga;
use Illuminate\Support\Facades\Storage;

class FotoWargaController extends Controller
{
    public function index()
    {
        $fotos = FotoWarga::latest()->get();
        return view('admin.home.foto_warga.index', compact('fotos'));
    }

    public function create()
    {
        return view('admin.home.foto_warga.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|image|max:2048',
        ]);

        $filePath = $request->file('file')->store('foto_warga', 'public');

        FotoWarga::create([
            'gambar' => $filePath,
        ]);

        return redirect()->route('admin.home.foto_warga.index')
                         ->with('success', 'Foto berhasil ditambahkan.');
    }

    public function edit(FotoWarga $fotoWarga)
    {
        return view('admin.home.foto_warga.edit', compact('fotoWarga'));
    }

    public function update(Request $request, FotoWarga $fotoWarga)
    {
        $request->validate([
            'file' => 'nullable|image|max:2048',
        ]);

        // jika upload file baru
        if ($request->hasFile('file')) {
            // hapus file lama
            Storage::disk('public')->delete($fotoWarga->gambar);

            // upload file baru
            $filePath = $request->file('file')->store('foto_warga', 'public');
            $fotoWarga->gambar = $filePath;
        }

        $fotoWarga->save();

        return redirect()->route('admin.home.foto_warga.index')
                         ->with('success', 'Foto berhasil diperbarui.');
    }

    public function destroy(FotoWarga $fotoWarga)
    {
        // hapus file dari storage
        Storage::disk('public')->delete($fotoWarga->gambar);

        // hapus dari database
        $fotoWarga->delete();

        return redirect()->route('admin.home.foto_warga.index')
                         ->with('success', 'Foto berhasil dihapus.');
    }
}
