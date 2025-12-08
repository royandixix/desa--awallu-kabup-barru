<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdministrasiPenduduk;

class AdministrasiController extends Controller
{
    // Array kategori yang valid untuk chart
    protected $validCategories = [
        'Jumlah Penduduk',
        'Laki-laki',
        'Perempuan',
        'Kepala Keluarga',
    ];

    public function index()
    {
        $data = AdministrasiPenduduk::all();
        return view('admin.home.administrasi.index', compact('data'));
    }

    public function create()
    {
        return view('admin.home.administrasi.create', [
            'categories' => $this->validCategories
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|in:' . implode(',', $this->validCategories),
            'jumlah' => 'required|integer|min:0',
        ]);

        AdministrasiPenduduk::create($request->only(['kategori', 'jumlah']));

        return redirect()->route('admin.home.administrasi.index')
                         ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $item = AdministrasiPenduduk::findOrFail($id);
        return view('admin.home.administrasi.edit', [
            'item' => $item,
            'categories' => $this->validCategories
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required|in:' . implode(',', $this->validCategories),
            'jumlah' => 'required|integer|min:0',
        ]);

        $item = AdministrasiPenduduk::findOrFail($id);
        $item->update($request->only(['kategori', 'jumlah']));

        return redirect()->route('admin.home.administrasi.index')
                         ->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $item = AdministrasiPenduduk::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.home.administrasi.index')
                         ->with('success', 'Data berhasil dihapus');
    }
}
