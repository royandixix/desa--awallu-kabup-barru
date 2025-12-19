<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Umkm;
use Illuminate\Support\Str;

class UmkmAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $umkms = Umkm::latest()->paginate(10); // 10 per halaman
        return view('admin.home.umkm.index', compact('umkms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.home.umkm.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pengusaha' => 'required|string|max:255',
            'nama_usaha'     => 'required|string|max:255',
            'jenis_usaha'    => 'required|string|max:255',
            'deskripsi'      => 'required|string',
            'alamat'         => 'required|string',
            'kontak'         => 'required|string|max:50',
            'foto'           => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'harga'          => 'nullable|numeric',
        ]);

        // Upload foto
        if ($request->hasFile('foto')) {
            $fileName = time() . '_' . Str::slug($request->nama_usaha) . '.' . $request->foto->extension();
            $request->foto->move(public_path('images'), $fileName);
            $validated['foto'] = $fileName;
        }

        // Generate kode UMKM unik
        $validated['kode_umkm'] = 'UMKM-' . Str::upper(Str::random(5));

        Umkm::create($validated);

        return redirect()->route('admin.umkm.index')->with('success', 'UMKM berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $umkm = Umkm::findOrFail($id);
        return view('admin.home.umkm.show', compact('umkm'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $umkm = Umkm::findOrFail($id);
        return view('admin.home.umkm.edit', compact('umkm'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $umkm = Umkm::findOrFail($id);

        $validated = $request->validate([
            'nama_pengusaha' => 'required|string|max:255',
            'nama_usaha'     => 'required|string|max:255',
            'jenis_usaha'    => 'required|string|max:255',
            'deskripsi'      => 'required|string',
            'alamat'         => 'required|string',
            'kontak'         => 'required|string|max:50',
            'foto'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'harga'          => 'nullable|numeric',
        ]);

        // Upload foto baru jika ada
        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($umkm->foto && file_exists(public_path('images/'.$umkm->foto))) {
                unlink(public_path('images/'.$umkm->foto));
            }

            $fileName = time() . '_' . Str::slug($request->nama_usaha) . '.' . $request->foto->extension();
            $request->foto->move(public_path('images'), $fileName);
            $validated['foto'] = $fileName;
        }

        $umkm->update($validated);

        return redirect()->route('admin.umkm.index')->with('success', 'UMKM berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $umkm = Umkm::findOrFail($id);

        if ($umkm->foto && file_exists(public_path('images/'.$umkm->foto))) {
            unlink(public_path('images/'.$umkm->foto));
        }

        $umkm->delete();

        return redirect()->route('admin.umkm.index')->with('success', 'UMKM berhasil dihapus!');
    }
}
