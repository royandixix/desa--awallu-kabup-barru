<?php

namespace App\Http\Controllers\Admin\Transparansi;

use App\Http\Controllers\Controller;
use App\Models\TransparansiAnggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnggaranController extends Controller
{
    // ==========================
    // INDEX
    // ==========================
    public function index()
    {
        $anggarans = TransparansiAnggaran::latest()->paginate(10); // Pagination optional
        return view('admin.page.transparansi.anggaran.index', compact('anggarans'));
    }

    // ==========================
    // CREATE
    // ==========================
    public function create()
    {
        return view('admin.page.transparansi.anggaran.create');
    }

    // ==========================
    // STORE
    // ==========================
    public function store(Request $request)
    {
        // Hapus format titik ribuan (1.000.000 → 1000000)
        $request->merge([
            'pemasukan'   => $request->pemasukan ? str_replace('.', '', $request->pemasukan) : null,
            'pengeluaran' => $request->pengeluaran ? str_replace('.', '', $request->pengeluaran) : null,
        ]);

        $data = $request->validate([
            'judul'       => 'required|string|max:255',
            'jenis'       => 'required|in:POKOK,PERUBAHAN',
            'tahun'       => 'nullable|digits:4|integer',
            'tanggal'     => 'nullable|date',
            'pemasukan'   => 'nullable|numeric',
            'pengeluaran' => 'nullable|numeric',
            'file'        => 'nullable|file|max:20480|mimes:pdf,doc,docx,xlsx,png,jpg,jpeg,webp'
        ], [
            'file.max' => 'Ukuran file maksimal 20 MB',
            'file.mimes' => 'Format file harus PDF, DOC, DOCX, XLSX, PNG, JPG, JPEG, atau WEBP'
        ]);

        // Upload file jika ada
        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('uploads/transparansi_anggaran', 'public');
        }

        TransparansiAnggaran::create($data);

        return redirect()->route('admin.transparansi.anggaran.index')
            ->with('success', 'Data anggaran berhasil ditambahkan!');
    }

    // ==========================
    // EDIT
    // ==========================
    public function edit(TransparansiAnggaran $anggaran)
    {
        return view('admin.page.transparansi.anggaran.edit', compact('anggaran'));
    }

    // ==========================
    // UPDATE
    // ==========================
    public function update(Request $request, TransparansiAnggaran $anggaran)
    {
        // Hapus titik ribuan
        $request->merge([
            'pemasukan'   => $request->pemasukan ? str_replace('.', '', $request->pemasukan) : $anggaran->pemasukan,
            'pengeluaran' => $request->pengeluaran ? str_replace('.', '', $request->pengeluaran) : $anggaran->pengeluaran,
        ]);

        $data = $request->validate([
            'judul'       => 'nullable|string|max:255',
            'jenis'       => 'nullable|in:POKOK,PERUBAHAN',
            'tahun'       => 'nullable|digits:4|integer',
            'tanggal'     => 'nullable|date',
            'pemasukan'   => 'nullable|numeric',
            'pengeluaran' => 'nullable|numeric',
            'file'        => 'nullable|file|max:20480|mimes:pdf,doc,docx,xlsx,png,jpg,jpeg,webp'
        ], [
            'file.max' => 'Ukuran file maksimal 20 MB',
            'file.mimes' => 'Format file harus PDF, DOC, DOCX, XLSX, PNG, JPG, JPEG, atau WEBP'
        ]);

        // Hanya update field yang diisi
        foreach ($data as $key => $value) {
            if ($value !== null) {
                $anggaran->$key = $value;
            }
        }

        // Upload file baru jika ada
        if ($request->hasFile('file')) {
            // Hapus file lama
            if ($anggaran->file && Storage::disk('public')->exists($anggaran->file)) {
                Storage::disk('public')->delete($anggaran->file);
            }
            $anggaran->file = $request->file('file')->store('uploads/transparansi_anggaran', 'public');
        }

        $anggaran->save();

        return redirect()->route('admin.transparansi.anggaran.index')
            ->with('success', 'Data anggaran berhasil diperbarui!');
    }

    // ==========================
    // DESTROY
    // ==========================
    public function destroy(TransparansiAnggaran $anggaran)
    {
        if ($anggaran->file && Storage::disk('public')->exists($anggaran->file)) {
            Storage::disk('public')->delete($anggaran->file);
        }

        $anggaran->delete();

        return redirect()->route('admin.transparansi.anggaran.index')
            ->with('success', 'Data anggaran berhasil dihapus!');
    }
}
