<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Umkm;
use App\Models\UmkmProduk;

class UmkmController extends Controller
{
    public function index()
    {
        $umkms = Umkm::orderBy('created_at','desc')->paginate(10);
        return view('admin.home.umkm.index', compact('umkms'));
    }

    public function create()
    {
        return view('admin.home.umkm.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_pengusaha' => 'required|string|max:255',
            'nama_usaha' => 'required|string|max:255',
            'jenis_usaha' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string',
            'kontak' => 'nullable|string|max:20',
            'foto_umkm' => 'nullable|image|max:2048',
            'foto_pengusaha' => 'nullable|image|max:2048',
            'kode_umkm' => 'required|string|unique:umkms,kode_umkm',
            'harga' => 'nullable|string',
            'produk.nama.*' => 'nullable|string|max:255',
            'produk.harga.*' => 'nullable|string',
            'produk.deskripsi.*' => 'nullable|string',
            'produk.foto.*' => 'nullable|image|max:2048',
        ]);

        // Format harga ke decimal
        if(isset($data['harga'])){
            $data['harga'] = preg_replace('/[^\d]/','',$data['harga']);
        }

        // Upload foto UMKM
        $data['foto'] = $request->hasFile('foto_umkm') ? $request->file('foto_umkm')->store('umkm', 'public') : null;

        // Upload foto pengusaha
        $data['foto_pengusaha'] = $request->hasFile('foto_pengusaha') ? $request->file('foto_pengusaha')->store('umkm', 'public') : null;

        $umkm = Umkm::create($data);

        // Upload produk multiple
        if($request->has('produk')){
            foreach($request->produk['nama'] as $i => $nama){
                if($nama || $request->produk['foto'][$i] ?? null){
                    $path = $request->hasFile("produk.foto.$i") ? $request->file("produk.foto.$i")->store('umkm/produk','public') : null;

                    UmkmProduk::create([
                        'umkm_id' => $umkm->id,
                        'nama' => $nama ?? null,
                        'harga' => isset($request->produk['harga'][$i]) ? preg_replace('/[^\d]/','',$request->produk['harga'][$i]) : null,
                        'deskripsi' => $request->produk['deskripsi'][$i] ?? null,
                        'foto' => $path,
                    ]);
                }
            }
        }

        return redirect()->route('admin.home.umkm.index')->with('success','UMKM berhasil ditambahkan');
    }

    public function edit(Umkm $umkm)
    {
        return view('admin.home.umkm.edit', compact('umkm'));
    }

    public function update(Request $request, Umkm $umkm)
    {
        $data = $request->validate([
            'nama_pengusaha' => 'required|string|max:255',
            'nama_usaha' => 'required|string|max:255',
            'jenis_usaha' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string',
            'kontak' => 'nullable|string|max:20',
            'foto_umkm' => 'nullable|image|max:2048',
            'foto_pengusaha' => 'nullable|image|max:2048',
            'kode_umkm' => 'required|string|unique:umkms,kode_umkm,'.$umkm->id,
            'harga' => 'nullable|string',
        ]);

        if(isset($data['harga'])){
            $data['harga'] = preg_replace('/[^\d]/','',$data['harga']);
        }

        if($request->hasFile('foto_umkm')){
            $data['foto'] = $request->file('foto_umkm')->store('umkm','public');
        }

        if($request->hasFile('foto_pengusaha')){
            $data['foto_pengusaha'] = $request->file('foto_pengusaha')->store('umkm','public');
        }

        $umkm->update($data);

        return redirect()->route('admin.home.umkm.index')->with('success','UMKM berhasil diperbarui');
    }

    public function destroy(Umkm $umkm)
    {
        $umkm->delete();
        return redirect()->route('admin.home.umkm.index')->with('success','UMKM berhasil dihapus');
    }
}
