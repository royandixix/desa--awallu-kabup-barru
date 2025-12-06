<?php

namespace App\Http\Controllers\Admin\Struktur;

use App\Http\Controllers\Controller;
use App\Models\Posyandu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PosyanduController extends Controller
{
    /**
     * Menampilkan daftar gambar Posyandu dengan pagination.
     */
    public function index()
    {
        $posyandus = Posyandu::latest()->paginate(10); // 10 data per halaman
        return view('admin.page.struktur.posyandu.index', compact('posyandus'));
    }

    /**
     * Menampilkan form untuk upload gambar baru.
     */
    public function create()
    {
        return view('admin.page.struktur.posyandu.create');
    }

    /**
     * Menyimpan gambar baru ke database dan storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'foto.required' => 'Harap pilih file gambar.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Format gambar harus JPG, JPEG, atau PNG.',
            'foto.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        // Simpan file ke storage
        $fotoPath = $request->file('foto')->store('posyandu', 'public');

        // Simpan ke database
        Posyandu::create(['foto' => $fotoPath]);

        return redirect()->route('admin.struktur.posyandu.index')
            ->with('success', 'Gambar berhasil diunggah.');
    }

    /**
     * Menampilkan form edit untuk satu gambar Posyandu.
     */
    public function edit($id)
    {
        $posyandu = Posyandu::findOrFail($id);
        return view('admin.page.struktur.posyandu.edit', compact('posyandu'));
    }

    /**
     * Memperbarui gambar Posyandu.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Format gambar harus JPG, JPEG, atau PNG.',
            'foto.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        $posyandu = Posyandu::findOrFail($id);

        // Hapus gambar lama jika ada
        if ($request->hasFile('foto')) {
            if ($posyandu->foto) Storage::disk('public')->delete($posyandu->foto);
            $posyandu->foto = $request->file('foto')->store('posyandu', 'public');
        }

        $posyandu->save();

        return redirect()->route('admin.struktur.posyandu.index')
            ->with('success', 'Gambar berhasil diperbarui.');
    }

    /**
     * Menghapus gambar Posyandu beserta file di storage.
     */
    public function destroy($id)
    {
        $posyandu = Posyandu::findOrFail($id);

        // Hapus file dari storage
        if ($posyandu->foto) {
            Storage::disk('public')->delete($posyandu->foto);
        }

        $posyandu->delete();

        return redirect()->route('admin.struktur.posyandu.index')
            ->with('success', 'Gambar berhasil dihapus.');
    }
}
