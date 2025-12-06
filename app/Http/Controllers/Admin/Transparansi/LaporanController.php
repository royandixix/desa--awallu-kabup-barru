<?php

namespace App\Http\Controllers\Admin\Transparansi;

use App\Http\Controllers\Controller;
use App\Models\TransparansiLaporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    // ==========================
    // INDEX
    // ==========================
    public function index()
    {
        $laporan = TransparansiLaporan::latest()->paginate(10); // Pagination opsional
        return view('admin.page.transparansi.laporan.index', compact('laporan'));
    }

    // ==========================
    // CREATE
    // ==========================
    public function create()
    {
        return view('admin.page.transparansi.laporan.create');
    }

    // ==========================
    // STORE
    // ==========================
    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'nullable|date',
            'file' => 'nullable|file|mimes:pdf,png,jpg,jpeg,webp|max:20480',
        ], [
            'file.max' => 'Ukuran file maksimal 20 MB',
            'file.mimes' => 'Format file harus PDF, PNG, JPG, JPEG, atau WEBP'
        ]);

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('laporan', 'public');
        }

        TransparansiLaporan::create($data);

        return redirect()->route('admin.transparansi.laporan.index')
                         ->with('success', 'Laporan berhasil ditambahkan!');
    }

    // ==========================
    // EDIT
    // ==========================
    public function edit(TransparansiLaporan $laporan)
    {
        return view('admin.page.transparansi.laporan.edit', compact('laporan'));
    }

    // ==========================
    // UPDATE
    // ==========================
    public function update(Request $request, TransparansiLaporan $laporan)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'nullable|date',
            'file' => 'nullable|file|mimes:pdf,png,jpg,jpeg,webp|max:20480',
        ], [
            'file.max' => 'Ukuran file maksimal 20 MB',
            'file.mimes' => 'Format file harus PDF, PNG, JPG, JPEG, atau WEBP'
        ]);

        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($laporan->file && Storage::disk('public')->exists($laporan->file)) {
                Storage::disk('public')->delete($laporan->file);
            }

            $data['file'] = $request->file('file')->store('laporan', 'public');
        }

        $laporan->update($data);

        return redirect()->route('admin.transparansi.laporan.index')
                         ->with('success', 'Laporan berhasil diupdate!');
    }

    // ==========================
    // DESTROY
    // ==========================
    public function destroy(TransparansiLaporan $laporan)
    {
        if ($laporan->file && Storage::disk('public')->exists($laporan->file)) {
            Storage::disk('public')->delete($laporan->file);
        }

        $laporan->delete();

        return redirect()->route('admin.transparansi.laporan.index')
                         ->with('success', 'Laporan berhasil dihapus!');
    }
}
