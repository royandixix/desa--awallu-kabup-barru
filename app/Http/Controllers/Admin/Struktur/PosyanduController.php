<?php

namespace App\Http\Controllers\Admin\Struktur;

use App\Http\Controllers\Controller;
use App\Models\Posyandu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PosyanduController extends Controller
{
    public function index()
    {
        $posyandus = Posyandu::latest()->paginate(10);
        return view('admin.page.struktur.posyandu.index', compact('posyandus'));
    }

    public function create()
    {
        return view('admin.page.struktur.posyandu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'gambar.required' => 'Harap pilih file gambar.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus JPG, JPEG, atau PNG.',
            'gambar.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        $file = $request->file('gambar');

        // Pastikan folder uploads/posyandu ada
        $folder = public_path('uploads/posyandu');
        if (!File::exists($folder)) {
            File::makeDirectory($folder, 0755, true);
        }

        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move($folder, $filename);

        Posyandu::create(['gambar' => $filename]);

        return redirect()->route('admin.struktur.posyandu.index')
                         ->with('success', 'Gambar berhasil diunggah.');
    }

    public function edit($id)
    {
        $posyandu = Posyandu::findOrFail($id);
        return view('admin.page.struktur.posyandu.edit', compact('posyandu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus JPG, JPEG, atau PNG.',
            'gambar.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        $posyandu = Posyandu::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $folder = public_path('uploads/posyandu');

            // Hapus file lama jika ada
            $oldFile = $folder . '/' . $posyandu->gambar;
            if (File::exists($oldFile)) {
                @unlink($oldFile);
            }

            // Upload file baru
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move($folder, $filename);

            $posyandu->gambar = $filename;
        }

        $posyandu->save();

        return redirect()->route('admin.struktur.posyandu.index')
                         ->with('success', 'Gambar berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $posyandu = Posyandu::findOrFail($id);

        $file = public_path('uploads/posyandu/' . $posyandu->gambar);
        if (File::exists($file)) {
            @unlink($file);
        }

        $posyandu->delete();

        return redirect()->route('admin.struktur.posyandu.index')
                         ->with('success', 'Gambar berhasil dihapus.');
    }
}
