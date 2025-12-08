<?php

namespace App\Http\Controllers\Posyandu;

use App\Http\Controllers\Controller;
use App\Models\Posyandu\IbuMenyusui;
use Illuminate\Http\Request;

class IbuMenyusuiController extends Controller
{
    public function index()
    {
        $data = IbuMenyusui::all();
        return view('admin_posyandu.page.Ibu_menyusui.index', compact('data'));
    }

    public function create()
    {
        return view('admin_posyandu.page.Ibu_menyusui.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'umur' => 'nullable|integer',
            'alamat' => 'nullable|string|max:255',
            'dusun' => 'nullable|string|max:255',
        ]);

        IbuMenyusui::create($request->all());

        return redirect()->route('admin_posyandu.ibu-menyusui.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $ibu_menyusui = IbuMenyusui::findOrFail($id);
        return view('admin_posyandu.page.Ibu_menyusui.edit', compact('ibu_menyusui'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'umur' => 'nullable|integer',
            'alamat' => 'nullable|string|max:255',
            'dusun' => 'nullable|string|max:255',
        ]);

        $item = IbuMenyusui::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('admin_posyandu.ibu-menyusui.index')
            ->with('success', 'Data berhasil diupdate.');
    }

    public function destroy($id)
    {
        $item = IbuMenyusui::findOrFail($id);
        $item->delete();

        return redirect()->route('admin_posyandu.ibu-menyusui.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
