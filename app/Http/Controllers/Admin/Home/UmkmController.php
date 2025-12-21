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

        // Format harga
        if(isset($data['harga'])){
            $data['harga'] = preg_replace('/[^\d]/','',$data['harga']);
        }

        // Upload foto UMKM
        if($request->hasFile('foto_umkm')){
            $file = $request->file('foto_umkm');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/umkm'), $filename);
            $data['foto'] = 'uploads/umkm/'.$filename; // sesuaikan kolom DB 'foto'
        }

        // Upload foto pengusaha
        if($request->hasFile('foto_pengusaha')){
            $file = $request->file('foto_pengusaha');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/pengusaha'), $filename);
            $data['foto_pengusaha'] = 'uploads/pengusaha/'.$filename;
        }

        $umkm = Umkm::create($data);

        // Upload produk multiple
        if($request->has('produk')){
            foreach($request->produk['nama'] as $i => $nama){
                if($nama || ($request->produk['foto'][$i] ?? null)){
                    $path = null;
                    if($request->hasFile("produk.foto.$i")){
                        $file = $request->file("produk.foto.$i");
                        $filename = time().'_'.$file->getClientOriginalName();
                        $file->move(public_path('uploads/produk'), $filename);
                        $path = 'uploads/produk/'.$filename;
                    }

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

        // Format harga
        if(isset($data['harga'])){
            $data['harga'] = preg_replace('/[^\d]/','',$data['harga']);
        }

        // Update foto UMKM
        if($request->hasFile('foto_umkm')){
            $file = $request->file('foto_umkm');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/umkm'), $filename);
            $data['foto'] = 'uploads/umkm/'.$filename;
        }

        // Update foto pengusaha
        if($request->hasFile('foto_pengusaha')){
            $file = $request->file('foto_pengusaha');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/pengusaha'), $filename);
            $data['foto_pengusaha'] = 'uploads/pengusaha/'.$filename;
        }

        $umkm->update($data);

        // Optional: Update produk bisa ditambahkan disini jika perlu

        return redirect()->route('admin.home.umkm.index')->with('success','UMKM berhasil diperbarui');
    }

    public function destroy(Umkm $umkm)
    {
        // Hapus file foto jika ingin otomatis
        if($umkm->foto && file_exists(public_path($umkm->foto))){
            unlink(public_path($umkm->foto));
        }
        if($umkm->foto_pengusaha && file_exists(public_path($umkm->foto_pengusaha))){
            unlink(public_path($umkm->foto_pengusaha));
        }

        // Hapus produk terkait
        foreach($umkm->produk as $produk){
            if($produk->foto && file_exists(public_path($produk->foto))){
                unlink(public_path($produk->foto));
            }
            $produk->delete();
        }

        $umkm->delete();

        return redirect()->route('admin.home.umkm.index')->with('success','UMKM berhasil dihapus');
    }
}
