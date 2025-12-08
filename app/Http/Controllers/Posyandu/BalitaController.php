<?php

namespace App\Http\Controllers\Posyandu;

use App\Http\Controllers\Controller;
use App\Models\Posyandu\Balita;
use Illuminate\Http\Request;

class BalitaController extends Controller
{
    // Tampilkan daftar balita
    public function index()
    {
        $data = Balita::all();
        return view('admin_posyandu.page.balita.index', compact('data'));
    }

    // Form tambah balita
    public function create()
    {
        return view('admin_posyandu.page.balita.create');
    }

    // Simpan balita baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_balita' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'umur' => 'required|string', // contoh '1-2', '2-3', dst
            'nama_ibu' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
        ]);

        Balita::create($validated);

        return redirect()->route('admin_posyandu.balita.index')
                         ->with('success', 'Data balita berhasil ditambahkan.');
    }

    // Form edit balita
    public function edit($id)
    {
        $item = Balita::findOrFail($id);
        return view('admin_posyandu.page.balita.edit', compact('item'));
    }

    // Update data balita
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_balita' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'umur' => 'required|string',
            'nama_ibu' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
        ]);

        $item = Balita::findOrFail($id);
        $item->update($validated);

        return redirect()->route('admin_posyandu.balita.index')
                         ->with('success', 'Data balita berhasil diupdate.');
    }

    // Hapus balita
    public function destroy($id)
    {
        $item = Balita::findOrFail($id);
        $item->delete();

        return redirect()->route('admin_posyandu.balita.index')
                         ->with('success', 'Data balita berhasil dihapus.');
    }
}
