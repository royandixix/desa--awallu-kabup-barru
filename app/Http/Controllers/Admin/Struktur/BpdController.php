<?php

namespace App\Http\Controllers\Admin\Struktur;

use App\Http\Controllers\Controller;
use App\Models\Bpd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BpdController extends Controller
{
    public function index()
    {
        $bpds = Bpd::all();
        return view('admin.page.struktur.bpd.index', compact('bpds'));
    }

    public function create()
    {
        return view('admin.page.struktur.bpd.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|max:4096', // max 4MB
        ]);

        $foto = $request->file('foto')->store('struktural/bpd', 'public');

        Bpd::create(['foto' => $foto]);

        return redirect()->route('admin.struktur.bpd.index')
                         ->with('success', 'Foto BPD berhasil ditambahkan.');
    }

    public function edit(Bpd $bpd)
    {
        return view('admin.page.struktur.bpd.edit', compact('bpd'));
    }

    public function update(Request $request, Bpd $bpd)
    {
        $request->validate([
            'foto' => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('foto')) {
            if ($bpd->foto) Storage::disk('public')->delete($bpd->foto);
            $foto = $request->file('foto')->store('struktural/bpd', 'public');
            $bpd->update(['foto' => $foto]);
        }

        return redirect()->route('admin.struktur.bpd.index')
                         ->with('success', 'Foto BPD berhasil diperbarui.');
    }

    public function destroy(Bpd $bpd)
    {
        if ($bpd->foto) Storage::disk('public')->delete($bpd->foto);
        $bpd->delete();

        return back()->with('success', 'Foto BPD berhasil dihapus.');
    }
}
