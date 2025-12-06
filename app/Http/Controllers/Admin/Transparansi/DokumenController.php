<?php

namespace App\Http\Controllers\Admin\Transparansi;

use App\Http\Controllers\Controller;
use App\Models\TransparansiDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        ], [
            'judul.required'   => 'Judul dokumen wajib diisi.',
            'jenis.required'   => 'Jenis dokumen wajib dipilih.',
            'jenis.in'         => 'Jenis dokumen harus POKOK atau PERUBAHAN.',
            'tahun.required'   => 'Tahun dokumen wajib diisi.',
            'tahun.digits'     => 'Tahun dokumen harus 4 digit.',
            'tanggal.required' => 'Tanggal dokumen wajib diisi.',
            'tanggal.date'     => 'Format tanggal tidak valid.',
            'file.required'    => 'File dokumen wajib diupload.',
            'file.mimes'       => 'Format file harus PDF, JPG, JPEG, PNG, atau WEBP.',
            'file.max'         => 'Ukuran file maksimal 20MB.',
        ]);

        $data = $request->only(['judul', 'jenis', 'tahun', 'tanggal']);

        // Upload file
        $data['file'] = $request->file('file')->store('dokumen', 'public');

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
        ], [
            'judul.required'   => 'Judul dokumen wajib diisi.',
            'jenis.required'   => 'Jenis dokumen wajib dipilih.',
            'jenis.in'         => 'Jenis dokumen harus POKOK atau PERUBAHAN.',
            'tahun.required'   => 'Tahun dokumen wajib diisi.',
            'tahun.digits'     => 'Tahun dokumen harus 4 digit.',
            'tanggal.required' => 'Tanggal dokumen wajib diisi.',
            'tanggal.date'     => 'Format tanggal tidak valid.',
            'file.mimes'       => 'Format file harus PDF, JPG, JPEG, PNG, atau WEBP.',
            'file.max'         => 'Ukuran file maksimal 20MB.',
        ]);

        $data = $request->only(['judul', 'jenis', 'tahun', 'tanggal']);

        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($dokumen->file && Storage::disk('public')->exists($dokumen->file)) {
                Storage::disk('public')->delete($dokumen->file);
            }
            // Upload file baru
            $data['file'] = $request->file('file')->store('dokumen', 'public');
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
        if ($dokumen->file && Storage::disk('public')->exists($dokumen->file)) {
            Storage::disk('public')->delete($dokumen->file);
        }

        $dokumen->delete();

        return redirect()->route('admin.transparansi.dokumen.index')
            ->with('success', 'Dokumen berhasil dihapus!');
    }
}
