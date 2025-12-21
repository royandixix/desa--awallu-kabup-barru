<?php

namespace App\Http\Controllers\Admin\Struktur;

use App\Http\Controllers\Controller;
use App\Models\Lpm;
use Illuminate\Http\Request;

class LpmController extends Controller
{
    public function index()
    {
        $lpms = Lpm::latest()->paginate(10);
        return view('admin.page.struktur.lpm.index', compact('lpms'));
    }

    public function create()
    {
        return view('admin.page.struktur.lpm.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/lpm'), $filename);
            $data['gambar'] = 'uploads/lpm/' . $filename;
        }

        Lpm::create($data);

        return redirect()->route('admin.struktur.lpm.index')
                         ->with('success', 'Gambar LPM berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $lpm = Lpm::findOrFail($id);
        return view('admin.page.struktur.lpm.edit', compact('lpm'));
    }

    public function update(Request $request, string $id)
    {
        $lpm = Lpm::findOrFail($id);

        $data = $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus file lama jika ada
            if ($lpm->gambar && file_exists(public_path($lpm->gambar))) {
                unlink(public_path($lpm->gambar));
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/lpm'), $filename);
            $data['gambar'] = 'uploads/lpm/' . $filename;
        }

        $lpm->update($data);

        return redirect()->route('admin.struktur.lpm.index')
                         ->with('success', 'Gambar LPM berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $lpm = Lpm::findOrFail($id);

        // Hapus file lama jika ada
        if ($lpm->gambar && file_exists(public_path($lpm->gambar))) {
            unlink(public_path($lpm->gambar));
        }

        $lpm->delete();

        return redirect()->route('admin.struktur.lpm.index')
                         ->with('success', 'Gambar LPM berhasil dihapus!');
    }
}
