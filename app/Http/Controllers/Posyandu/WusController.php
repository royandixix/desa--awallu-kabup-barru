<?php

namespace App\Http\Controllers\Posyandu;

use App\Http\Controllers\Controller;
use App\Models\Posyandu\Wus; // pastikan ada model Wus
use Illuminate\Http\Request;

class WusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data WUS dari database
        $data = Wus::all();

        // Tampilkan view index.blade.php dan kirim data
        return view('admin_posyandu.page.wus.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin_posyandu.page.wus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'umur' => 'required|numeric',
            'alamat' => 'required',
        ]);

        Wus::create($request->all());

        return redirect()->route('admin_posyandu.wus.index')
                         ->with('success', 'Data WUS berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $wus = Wus::findOrFail($id);
        return view('admin_posyandu.page.wus.show', compact('wus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $wus = Wus::findOrFail($id);
        return view('admin_posyandu.page.wus.edit', compact('wus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'umur' => 'required|numeric',
            'alamat' => 'required',
        ]);

        $wus = Wus::findOrFail($id);
        $wus->update($request->all());

        return redirect()->route('admin_posyandu.wus.index')
                         ->with('success', 'Data WUS berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $wus = Wus::findOrFail($id);
        $wus->delete();

        return redirect()->route('admin_posyandu.wus.index')
                         ->with('success', 'Data WUS berhasil dihapus!');
    }
}
