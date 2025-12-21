<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FotoWarga;

class FotoWargaController extends Controller
{
    // Tampilkan semua foto
    public function index()
    {
        $fotos = FotoWarga::latest()->get();
        return view('admin.home.foto_warga.index', compact('fotos'));
    }

    // Form tambah foto
    public function create()
    {
        return view('admin.home.foto_warga.create');
    }

    // Simpan foto baru
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|image|max:2048',
        ]);

        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();

        // Simpan langsung ke public/uploads/foto_warga
        $file->move(public_path('uploads/foto_warga'), $filename);

        FotoWarga::create([
            'gambar' => 'uploads/foto_warga/' . $filename,
        ]);

        return redirect()->route('admin.home.foto_warga.index')
                         ->with('success', 'Foto berhasil ditambahkan.');
    }

    // Form edit foto
    public function edit(FotoWarga $fotoWarga)
    {
        return view('admin.home.foto_warga.edit', compact('fotoWarga'));
    }

    // Update foto
    public function update(Request $request, FotoWarga $fotoWarga)
    {
        $request->validate([
            'file' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('file')) {
            // Hapus file lama
            if ($fotoWarga->gambar && file_exists(public_path($fotoWarga->gambar))) {
                unlink(public_path($fotoWarga->gambar));
            }

            // Upload file baru
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/foto_warga'), $filename);

            $fotoWarga->gambar = 'uploads/foto_warga/' . $filename;
        }

        $fotoWarga->save();

        return redirect()->route('admin.home.foto_warga.index')
                         ->with('success', 'Foto berhasil diperbarui.');
    }

    // Hapus foto
    public function destroy(FotoWarga $fotoWarga)
    {
        if ($fotoWarga->gambar && file_exists(public_path($fotoWarga->gambar))) {
            unlink(public_path($fotoWarga->gambar));
        }

        $fotoWarga->delete();

        return redirect()->route('admin.home.foto_warga.index')
                         ->with('success', 'Foto berhasil dihapus.');
    }
}
