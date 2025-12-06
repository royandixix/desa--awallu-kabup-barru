<?php

namespace App\Http\Controllers\Admin\Struktur;

use App\Http\Controllers\Controller;
use App\Models\Lpm;
use Illuminate\Http\Request;

class LpmController extends Controller
{
    public function index()
    {
        $lpms = Lpm::latest()->paginate(10);
        return view('admin.page.struktur.lpm.index', compact('lpms'));
    }

    public function create()
    {
        return view('admin.page.struktur.lpm.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('lpm', 'public');
        }

        Lpm::create($data);

        return redirect()->route('admin.struktur.lpm.index')
                         ->with('success', 'Gambar LPM berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $lpm = Lpm::findOrFail($id);
        return view('admin.page.struktur.lpm.edit', compact('lpm'));
    }

    public function update(Request $request, string $id)
    {
        $lpm = Lpm::findOrFail($id);

        $data = $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('lpm', 'public');
        }

        $lpm->update($data);

        return redirect()->route('admin.struktur.lpm.index')
                         ->with('success', 'Gambar LPM berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $lpm = Lpm::findOrFail($id);
        $lpm->delete();

        return redirect()->route('admin.struktur.lpm.index')
                         ->with('success', 'Gambar LPM berhasil dihapus!');
    }
}
