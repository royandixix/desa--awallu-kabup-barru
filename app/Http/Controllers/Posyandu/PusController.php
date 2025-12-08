<?php

namespace App\Http\Controllers\Posyandu;

use App\Http\Controllers\Controller;
use App\Models\Posyandu\Pus;
use Illuminate\Http\Request;

class PusController extends Controller
{
    /**
     * Tampilkan semua data PUS
     */
    public function index()
    {
        $pus = Pus::all();
        return view('admin_posyandu.page.pus.index', compact('pus'));
    }

    /**
     * Tampilkan form tambah data PUS
     */
    public function create()
    {
        return view('admin_posyandu.page.pus.create');
    }

    /**
     * Simpan data baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:20',
            'umur' => 'nullable|integer',
        ]);

        Pus::create($request->only(['nama', 'alamat', 'no_hp', 'umur']));

        return redirect()->route('admin_posyandu.pus.index')
                         ->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Tampilkan form edit data PUS
     * Parameter $pu menyesuaikan route {pu}
     */
    public function edit(Pus $pu)
    {
        return view('admin_posyandu.page.pus.edit', ['pus' => $pu]);
    }

    /**
     * Update data PUS
     */
    public function update(Request $request, Pus $pu)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:20',
            'umur' => 'nullable|integer',
        ]);

        $pu->update($request->only(['nama', 'alamat', 'no_hp', 'umur']));

        return redirect()->route('admin_posyandu.pus.index')
                         ->with('success', 'Data berhasil diupdate');
    }

    /**
     * Hapus data PUS
     */
    public function destroy(Pus $pu)
    {
        $pu->delete();

        return redirect()->route('admin_posyandu.pus.index')
                         ->with('success', 'Data berhasil dihapus');
    }
}
