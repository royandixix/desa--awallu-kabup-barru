<?php

namespace App\Http\Controllers\Posyandu;

use App\Http\Controllers\Controller;
use App\Models\Posyandu\Lansia;
use Illuminate\Http\Request;

class LansiaController extends Controller
{
    public function index()
    {
        $data = Lansia::latest()->get();
        return view('admin_posyandu.page.lansia.index', compact('data'));
    }

    public function create()
    {
        return view('admin_posyandu.page.lansia.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'umur' => 'nullable|integer',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string'
        ]);

        Lansia::create($request->all());

        return redirect()
            ->route('admin_posyandu.lansia.index')
            ->with('success', 'Data Lansia berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = Lansia::findOrFail($id);
        return view('admin_posyandu.page.lansia.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'umur' => 'nullable|integer',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string'
        ]);

        $data = Lansia::findOrFail($id);
        $data->update($request->all());

        return redirect()
            ->route('admin_posyandu.lansia.index')
            ->with('success', 'Data Lansia berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $data = Lansia::findOrFail($id);
        $data->delete();

        return redirect()
            ->route('admin_posyandu.lansia.index')
            ->with('success', 'Data Lansia berhasil dihapus!');
    }
}
