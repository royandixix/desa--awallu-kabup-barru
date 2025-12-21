<?php

namespace App\Http\Controllers\Admin\Struktur;

use App\Http\Controllers\Controller;
use App\Models\StrukturDesa;
use Illuminate\Http\Request;

class PemerintahanDesaAnggotaController extends Controller
{
    public function index()
    {
        $data = StrukturDesa::where('kategori', 'pemerintahan_desa')->get();
        return view('admin.page.struktur.pemerintahan_desa.anggota.index', compact('data'));
    }

    public function create()
    {
        return view('admin.page.struktur.pemerintahan_desa.anggota.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'    => 'required|string|max:100',
            'jabatan' => 'required|string|max:50',
            'foto'    => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $foto = null;
        if ($request->hasFile('foto')) {
            $file     = $request->file('foto');
            $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->move(public_path('uploads/struktur'), $filename);
            $foto = 'uploads/struktur/' . $filename;
        }

        StrukturDesa::create([
            'kategori' => 'pemerintahan_desa',
            'nama'     => $request->nama,
            'jabatan'  => $request->jabatan,
            'foto'     => $foto,
        ]);

        return redirect()->route('admin.struktur.pemerintahan_desa.anggota.index')
            ->with('success', 'Data anggota berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $item = StrukturDesa::findOrFail($id);
        return view('admin.page.struktur.pemerintahan_desa.anggota.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = StrukturDesa::findOrFail($id);

        $request->validate([
            'nama'    => 'required|string|max:100',
            'jabatan' => 'required|string|max:50',
            'foto'    => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $foto = $item->foto;

        if ($request->hasFile('foto')) {
            // Hapus file lama jika ada
            if ($item->foto && file_exists(public_path($item->foto))) {
                unlink(public_path($item->foto));
            }

            $file     = $request->file('foto');
            $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->move(public_path('uploads/struktur'), $filename);
            $foto = 'uploads/struktur/' . $filename;
        }

        $item->update([
            'nama'    => $request->nama,
            'jabatan' => $request->jabatan,
            'foto'    => $foto,
        ]);

        return redirect()->route('admin.struktur.pemerintahan_desa.anggota.index')
            ->with('success', 'Data anggota berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $item = StrukturDesa::findOrFail($id);

        if ($item->foto && file_exists(public_path($item->foto))) {
            unlink(public_path($item->foto));
        }

        $item->delete();

        return back()->with('success', 'Data anggota berhasil dihapus.');
    }
}
