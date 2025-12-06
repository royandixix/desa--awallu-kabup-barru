<?php

namespace App\Http\Controllers\Admin\Struktur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KarangTaruna;
use Illuminate\Support\Facades\File;

class KarangTarunaController extends Controller
{
    // Tampilkan semua foto
    public function index()
    {
        $karangTarunas = KarangTaruna::latest()->paginate(12);
        return view('admin.page.struktur.karang_taruna.index', compact('karangTarunas'));
    }

    // Form upload baru
    public function create()
    {
        return view('admin.page.struktur.karang_taruna.create');
    }

    // Simpan foto baru
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // Buat folder jika belum ada
            $path = public_path('karang_taruna');
            if (!File::exists($path)) {
                File::makeDirectory($path, 0777, true);
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            
            // Simpan langsung ke public/karang_taruna
            $file->move($path, $filename);

            KarangTaruna::create(['gambar' => $filename]);

            return redirect()->route('admin.struktur.karang_taruna.index')
                ->with('success', 'Foto berhasil diupload.');
        }

        return back()->withErrors(['gambar' => 'File tidak ditemukan']);
    }

    // Form edit
    public function edit(KarangTaruna $karangTaruna)
    {
        return view('admin.page.struktur.karang_taruna.edit', compact('karangTaruna'));
    }

    // Update foto
    public function update(Request $request, KarangTaruna $karangTaruna)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus file lama jika ada
            $oldFile = public_path('karang_taruna/' . $karangTaruna->gambar);
            if ($karangTaruna->gambar && File::exists($oldFile)) {
                File::delete($oldFile);
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            
            // Simpan file baru
            $path = public_path('karang_taruna');
            $file->move($path, $filename);

            $karangTaruna->update(['gambar' => $filename]);
        }

        return redirect()->route('admin.struktur.karang_taruna.index')
            ->with('success', 'Foto berhasil diperbarui.');
    }

    // Hapus foto
    public function destroy(KarangTaruna $karangTaruna)
    {
        $file = public_path('karang_taruna/' . $karangTaruna->gambar);
        if ($karangTaruna->gambar && File::exists($file)) {
            File::delete($file);
        }

        $karangTaruna->delete();

        return redirect()->route('admin.struktur.karang_taruna.index')
            ->with('success', 'Foto berhasil dihapus.');
    }
}