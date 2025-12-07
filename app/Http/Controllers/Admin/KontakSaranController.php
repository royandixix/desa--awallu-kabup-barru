<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KontakSaran;
use Illuminate\Http\Request;

class KontakSaranController extends Controller
{
    public function index()
    {
        $data = KontakSaran::latest()->paginate(10);
        return view('admin.page.kontak_saran.index', compact('data'));
    }

    public function show($id)
    {
        $item = KontakSaran::findOrFail($id);
        return view('admin.page.kontak_saran.show', compact('item'));
    }

    public function destroy($id)
    {
        KontakSaran::findOrFail($id)->delete();
        return redirect()->route('admin.kontak_saran.index')->with('success', 'Data berhasil dihapus');
    }
}
