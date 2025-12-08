<?php
namespace App\Http\Controllers\Posyandu;

use App\Http\Controllers\Controller;
use App\Models\Posyandu\Bayi;
use Illuminate\Http\Request;

class BayiController extends Controller
{
    public function index()
    {
        $data = Bayi::all();
        return view('admin_posyandu.page.bayi_0_sampai_12_bulan.index', compact('data'));
    }

    public function create()
    {
        return view('admin_posyandu.page.bayi_0_sampai_12_bulan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_bayi' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P', // fix enum
            'nama_ibu' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
        ]);

        Bayi::create($validated);

        return redirect()->route('admin_posyandu.bayi_0_sampai_12_bulan.index')
                         ->with('success', 'Data bayi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $item = Bayi::findOrFail($id);
        return view('admin_posyandu.page.bayi_0_sampai_12_bulan.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_bayi' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P', // fix enum
            'nama_ibu' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
        ]);

        $item = Bayi::findOrFail($id);
        $item->update($validated);

        return redirect()->route('admin_posyandu.bayi_0_sampai_12_bulan.index')
                         ->with('success', 'Data bayi berhasil diupdate.');
    }

    public function destroy($id)
    {
        $item = Bayi::findOrFail($id);
        $item->delete();

        return redirect()->route('admin_posyandu.bayi_0_sampai_12_bulan.index')
                         ->with('success', 'Data bayi berhasil dihapus.');
    }
}
