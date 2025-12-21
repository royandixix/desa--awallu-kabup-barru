<?php

namespace App\Http\Controllers\Admin\Transparansi;

use App\Http\Controllers\Controller;
use App\Models\TransparansiDokumen;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    /**
     * Tampilkan daftar dokumen
     */
    public function index()
    {
        $dokumens = TransparansiDokumen::latest()->paginate(10);
        return view('admin.page.transparansi.dokumen.index', compact('dokumens'));
    }

    /**
     * Halaman tambah dokumen
     */
    public function create()
    {
        return view('admin.page.transparansi.dokumen.create');
    }

    /**
     * Simpan dokumen baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'   => 'required|string|max:255',
            'jenis'   => 'required|in:POKOK,PERUBAHAN',
            'tahun'   => 'required|digits:4',
            'tanggal' => 'required|date',
            'file'    => 'required|file|mimes:pdf,jpg,jpeg,png,webp|max:20480', // 20MB
        ]);

        $data = $request->only(['judul', 'jenis', 'tahun', 'tanggal']);

        // Upload file ke public/uploads/dokumen
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/dokumen'), $fileName);
            $data['file'] = $fileName;
        }

        TransparansiDokumen::create($data);

        return redirect()->route('admin.transparansi.dokumen.index')
            ->with('success', 'Dokumen berhasil ditambahkan!');
    }

    /**
     * Halaman edit dokumen
     */
    public function edit($id)
    {
        $dokumen = TransparansiDokumen::findOrFail($id);
        return view('admin.page.transparansi.dokumen.edit', compact('dokumen'));
    }

    /**
     * Update dokumen
     */
    public function update(Request $request, $id)
    {
        $dokumen = TransparansiDokumen::findOrFail($id);

        $request->validate([
            'judul'   => 'required|string|max:255',
            'jenis'   => 'required|in:POKOK,PERUBAHAN',
            'tahun'   => 'required|digits:4',
            'tanggal' => 'required|date',
            'file'    => 'nullable|file|mimes:pdf,jpg,jpeg,png,webp|max:20480', // 20MB
        ]);

        $data = $request->only(['judul', 'jenis', 'tahun', 'tanggal']);

        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($dokumen->file && file_exists(public_path('uploads/dokumen/' . $dokumen->file))) {
                unlink(public_path('uploads/dokumen/' . $dokumen->file));
            }

            // Upload file baru
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/dokumen'), $fileName);
            $data['file'] = $fileName;
        }

        $dokumen->update($data);

        return redirect()->route('admin.transparansi.dokumen.index')
            ->with('success', 'Dokumen berhasil diperbarui!');
    }

    /**
     * Hapus dokumen
     */
    public function destroy($id)
    {
        $dokumen = TransparansiDokumen::findOrFail($id);

        // Hapus file lama jika ada
        if ($dokumen->file && file_exists(public_path('uploads/dokumen/' . $dokumen->file))) {
            unlink(public_path('uploads/dokumen/' . $dokumen->file));
        }

        $dokumen->delete();

        return redirect()->route('admin.transparansi.dokumen.index')
            ->with('success', 'Dokumen berhasil dihapus!');
    }
}
