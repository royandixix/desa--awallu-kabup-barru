<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilDesa;
use Illuminate\Http\Request;

class ProfilDesaController extends Controller
{
    public function index()
    {
        $data = ProfilDesa::all();
        return view('admin.page.profil_desa.index', compact('data'));
    }

    public function create()
    {
        return view('admin.page.profil_desa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi_singkat' => 'nullable|string',
            'gambar_header' => 'nullable|image|max:2048',
        ]);

        $data = $request->only([
            'judul', 'deskripsi_singkat', 'sejarah', 'wilayah_administratif',
            'nama_desa', 'kecamatan', 'kabupaten', 'batas_utara',
            'batas_selatan', 'batas_timur', 'batas_barat', 'koordinat', 'jarak_kabupaten'
        ]);

        if ($request->hasFile('gambar_header')) {
            $file = $request->file('gambar_header');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/profil_desa'), $filename);
            $data['gambar_header'] = $filename;
        }

        ProfilDesa::create($data);

        return redirect()->route('profil-desa.index')->with('success', 'Profil Desa berhasil ditambahkan');
    }

    public function edit($id)
    {
        $item = ProfilDesa::findOrFail($id);
        return view('admin.page.profil_desa.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi_singkat' => 'nullable|string',
            'gambar_header' => 'nullable|image|max:2048',
        ]);

        $item = ProfilDesa::findOrFail($id);

        $data = $request->only([
            'judul', 'deskripsi_singkat', 'sejarah', 'wilayah_administratif',
            'nama_desa', 'kecamatan', 'kabupaten', 'batas_utara',
            'batas_selatan', 'batas_timur', 'batas_barat', 'koordinat', 'jarak_kabupaten'
        ]);

        if ($request->hasFile('gambar_header')) {
            if ($item->gambar_header && file_exists(public_path('uploads/profil_desa/' . $item->gambar_header))) {
                unlink(public_path('uploads/profil_desa/' . $item->gambar_header));
            }
            $file = $request->file('gambar_header');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/profil_desa'), $filename);
            $data['gambar_header'] = $filename;
        }

        $item->update($data);

        return redirect()->route('profil-desa.index')->with('success', 'Profil Desa berhasil diupdate');
    }

    public function destroy($id)
    {
        $item = ProfilDesa::findOrFail($id);
        if ($item->gambar_header && file_exists(public_path('uploads/profil_desa/' . $item->gambar_header))) {
            unlink(public_path('uploads/profil_desa/' . $item->gambar_header));
        }
        $item->delete();

        return redirect()->route('profil-desa.index')->with('success', 'Profil Desa berhasil dihapus');
    }
}
