<?php

namespace App\Http\Controllers\Posyandu;

use App\Http\Controllers\Controller;
use App\Models\Posyandu\Appras;
use Illuminate\Http\Request;

class ApprasController extends Controller
{
    // Tampilkan semua data
    public function index()
    {
        $data = Appras::all();
        return view('admin_posyandu.page.appras.index', compact('data'));
    }

    // Form untuk menambahkan data baru
    public function create()
    {
        return view('admin_posyandu.page.appras.create');
    }

    // Simpan data baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_anak' => 'required',
            'umur' => 'required|numeric',
            'nama_ortu' => 'required',
            'alamat' => 'required',
        ]);

        Appras::create($request->all());

        return redirect()->route('appras.index')->with('success', 'Data Apras berhasil ditambahkan!');
    }

    // Form untuk edit data
    public function edit($id)
    {
        $appras = Appras::findOrFail($id);
        return view('admin_posyandu.page.appras.edit', compact('appras'));
    }

    // Update data ke database
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_anak' => 'required',
            'umur' => 'required|numeric',
            'nama_ortu' => 'required',
            'alamat' => 'required',
        ]);

        $appras = Appras::findOrFail($id);
        $appras->update($request->all());

        return redirect()->route('appras.index')->with('success', 'Data Apras berhasil diperbarui!');
    }

    // Hapus data
    public function destroy($id)
    {
        $appras = Appras::findOrFail($id);
        $appras->delete();

        return redirect()->route('appras.index')->with('success', 'Data Apras berhasil dihapus!');
    }
}
