<?php

namespace App\Http\Controllers\Admin\Struktur;

use App\Http\Controllers\Controller;
use App\Models\StrukturDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PemerintahanDesaStrukturalController extends Controller
{
    public function index()
    {
        $bagan = StrukturDesa::where('kategori', 'pemerintahan_desa_bagan')->first();
        return view('admin.page.struktur.pemerintahan_desa.struktural.index', compact('bagan'));
    }

    public function create()
    {
        return view('admin.page.struktur.pemerintahan_desa.struktural.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|max:4096', // Max 4MB
        ]);

        $foto = $request->file('foto')->store('struktur', 'public');

        StrukturDesa::create([
            'kategori' => 'pemerintahan_desa_bagan',
            'foto' => $foto,
        ]);

        return redirect()->route('admin.struktur.pemerintahan_desa.struktural.index')
            ->with('success', 'Bagan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $bagan = StrukturDesa::findOrFail($id);
        return view('admin.page.struktur.pemerintahan_desa.struktural.edit', compact('bagan'));
    }

    public function update(Request $request, $id)
    {
        $bagan = StrukturDesa::findOrFail($id);

        $request->validate([
            'foto' => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('foto')) {
            if ($bagan->foto) Storage::disk('public')->delete($bagan->foto);
            $foto = $request->file('foto')->store('struktur', 'public');
        } else {
            $foto = $bagan->foto;
        }

        $bagan->update([
            'foto' => $foto,
        ]);

        return redirect()->route('admin.struktur.pemerintahan_desa.struktural.index')
            ->with('success', 'Bagan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $bagan = StrukturDesa::findOrFail($id);

        if ($bagan->foto) Storage::disk('public')->delete($bagan->foto);

        $bagan->delete();

        return back()->with('success', 'Bagan berhasil dihapus.');
    }
}
