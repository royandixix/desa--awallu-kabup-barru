<?php

namespace App\Http\Controllers\Posyandu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posyandu\PraLansia;

class PraLansiaController extends Controller
{
    public function index()
    {
        $data = PraLansia::all();
        return view('admin_posyandu.page.pra_lansia.index', compact('data'));
    }

    public function create()
    {
        return view('admin_posyandu.page.pra_lansia.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'umur' => 'nullable|integer',
            'alamat' => 'nullable|string',
        ]);

        PraLansia::create($request->all());

        return redirect()->route('admin_posyandu.pra_lansia.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = PraLansia::findOrFail($id);
        return view('admin_posyandu.page.pra_lansia.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = PraLansia::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'umur' => 'nullable|integer',
            'alamat' => 'nullable|string',
        ]);

        $data->update($request->all());

        return redirect()->route('admin_posyandu.pra_lansia.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        PraLansia::findOrFail($id)->delete();

        return redirect()->route('admin_posyandu.pra_lansia.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
