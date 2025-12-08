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
            'judul' => 'required|string|max:255',
            'file' => 'required|image|max:2048',
        ]);

        $filePath = $request->file('file')->store('foto_warga', 'public');

        FotoWarga::create([
            'judul' => $request->judul,
            'file_path' => $filePath,
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
            'judul' => 'required|string|max:255',
            'file' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($fotoWarga->file_path);
            $filePath = $request->file('file')->store('foto_warga', 'public');
            $fotoWarga->file_path = $filePath;
        }

        $fotoWarga->judul = $request->judul;
        $fotoWarga->save();

        return redirect()->route('admin.home.foto_warga.index')
                         ->with('success', 'Foto berhasil diperbarui.');
    }

    public function destroy(FotoWarga $fotoWarga)
    {
        Storage::disk('public')->delete($fotoWarga->file_path);
        $fotoWarga->delete();

        return redirect()->route('admin.home.foto_warga.index')
                         ->with('success', 'Foto berhasil dihapus.');
    }
}
