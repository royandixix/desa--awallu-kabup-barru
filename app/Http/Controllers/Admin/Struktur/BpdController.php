<?php

namespace App\Http\Controllers\Admin\Struktur;

use App\Http\Controllers\Controller;
use App\Models\Bpd;
use Illuminate\Http\Request;

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
            'foto' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $foto = null;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());

            // simpan ke PUBLIC
            $file->move(public_path('uploads/struktur/bpd'), $filename);

            $foto = 'uploads/struktur/bpd/' . $filename;
        }

        Bpd::create([
            'foto' => $foto,
        ]);

        return redirect()
            ->route('admin.struktur.bpd.index')
            ->with('success', 'Foto BPD berhasil ditambahkan.');
    }

    public function edit(Bpd $bpd)
    {
        return view('admin.page.struktur.bpd.edit', compact('bpd'));
    }

    public function update(Request $request, Bpd $bpd)
    {
        $request->validate([
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        if ($request->hasFile('foto')) {

            // hapus foto lama
            if ($bpd->foto && file_exists(public_path($bpd->foto))) {
                unlink(public_path($bpd->foto));
            }

            $file = $request->file('foto');
            $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());

            $file->move(public_path('uploads/struktur/bpd'), $filename);

            $bpd->update([
                'foto' => 'uploads/struktur/bpd/' . $filename
            ]);
        }

        return redirect()
            ->route('admin.struktur.bpd.index')
            ->with('success', 'Foto BPD berhasil diperbarui.');
    }

    public function destroy(Bpd $bpd)
    {
        if ($bpd->foto && file_exists(public_path($bpd->foto))) {
            unlink(public_path($bpd->foto));
        }

        $bpd->delete();

        return back()->with('success', 'Foto BPD berhasil dihapus.');
    }
}
