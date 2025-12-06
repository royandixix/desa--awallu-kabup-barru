<?php

namespace App\Http\Controllers\Admin\Struktur;

use App\Http\Controllers\Controller;
use App\Models\StrukturDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $foto = $request->hasFile('foto')
            ? $request->file('foto')->store('struktur', 'public')
            : null;

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

        if ($request->hasFile('foto')) {
            if ($item->foto) Storage::disk('public')->delete($item->foto);
            $foto = $request->file('foto')->store('struktur', 'public');
        } else {
            $foto = $item->foto;
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

        if ($item->foto) Storage::disk('public')->delete($item->foto);

        $item->delete();

        return back()->with('success', 'Data anggota berhasil dihapus.');
    }
}
