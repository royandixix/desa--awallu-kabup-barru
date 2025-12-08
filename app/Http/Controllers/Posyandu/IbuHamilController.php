<?php

namespace App\Http\Controllers\Posyandu;

use App\Http\Controllers\Controller;
use App\Models\Posyandu\IbuHamil;
use Illuminate\Http\Request;

class IbuHamilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = IbuHamil::all();
        return view('admin_posyandu.page.ibu_hamil.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin_posyandu.page.ibu_hamil.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_ibu' => 'required|string|max:255',
            'umur_kehamilan' => 'required|numeric',
            'nama_suami' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'no_hp' => 'nullable|string|max:20',
        ]);

        IbuHamil::create($request->all());

        // Perbaiki route name sesuai resource route: ibu-hamil
        return redirect()->route('admin_posyandu.ibu-hamil.index')
                         ->with('success', 'Data Ibu Hamil berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IbuHamil $ibu_hamil)
    {
        return view('admin_posyandu.page.ibu_hamil.edit', compact('ibu_hamil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IbuHamil $ibu_hamil)
    {
        $request->validate([
            'nama_ibu' => 'required|string|max:255',
            'umur_kehamilan' => 'required|numeric',
            'nama_suami' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'no_hp' => 'nullable|string|max:20',
        ]);

        $ibu_hamil->update($request->all());

        return redirect()->route('admin_posyandu.ibu-hamil.index')
                         ->with('success', 'Data Ibu Hamil berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IbuHamil $ibu_hamil)
    {
        $ibu_hamil->delete();

        return redirect()->route('admin_posyandu.ibu-hamil.index')
                         ->with('success', 'Data Ibu Hamil berhasil dihapus!');
    }
}
