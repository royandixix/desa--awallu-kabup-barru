<?php

namespace App\Http\Controllers\Admin\Struktur;

use App\Http\Controllers\Controller;
use App\Models\Pkk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PkkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pkk::orderBy('id', 'DESC')->get();
        return view('admin.page.struktur.pkk.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.page.struktur.pkk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpg,png,jpeg,webp|max:2048',
        ]);

        $file = $request->file('gambar');

        // Buat nama unik
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

        // Pindahkan langsung ke public/pkk supaya sama seperti edit
        $file->move(public_path('pkk'), $filename);

        Pkk::create([
            'gambar' => $filename,
        ]);

        return redirect()->route('admin.struktur.pkk.index')
            ->with('success', 'Gambar struktur PKK berhasil ditambahkan.');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pkk $pkk)
    {
        return view('admin.page.struktur.pkk.edit', compact('pkk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pkk $pkk)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $gambar = $pkk->gambar;

        if ($request->hasFile('gambar')) {
            // Hapus file lama jika ada
            $oldFile = public_path('pkk/' . $pkk->gambar);
            if ($pkk->gambar && File::exists($oldFile)) {
                File::delete($oldFile);
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('pkk'), $filename);

            $gambar = $filename;
        }

        $pkk->update(['gambar' => $gambar]);

        return redirect()->route('admin.struktur.pkk.index')
            ->with('success', 'Gambar struktur PKK berhasil diperbarui.');
    }





    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pkk $pkk)
    {
        $file = public_path('pkk/' . $pkk->gambar);
        if ($pkk->gambar && File::exists($file)) {
            File::delete($file);
        }

        $pkk->delete();

        return redirect()->route('admin.struktur.pkk.index')
            ->with('success', 'Gambar struktur PKK berhasil dihapus.');
    }
}
