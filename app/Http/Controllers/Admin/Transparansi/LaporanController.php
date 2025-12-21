<?php

namespace App\Http\Controllers\Admin\Transparansi;

use App\Http\Controllers\Controller;
use App\Models\LaporanKegiatan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = LaporanKegiatan::latest()->paginate(10);
        return view('admin.page.transparansi.laporan.index', compact('laporan'));
    }

    public function create()
    {
        return view('admin.page.transparansi.laporan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'       => 'required|string|max:255',
            'deskripsi'   => 'required|string',
            'lokasi'      => 'required|string|max:255',
            'anggaran'    => 'nullable|string',
            'tanggal'     => 'required|date',
            'foto'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'file_path'   => 'nullable|mimes:pdf,doc,docx|max:4096',
        ]);

        // Konversi anggaran
        if (!empty($validated['anggaran'])) {
            $validated['anggaran'] = preg_replace('/[^\d]/', '', $validated['anggaran']);
        }

        // Upload foto
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('uploads/laporan/foto'), $fotoName);
            $validated['foto'] = $fotoName;
        }

        // Upload file
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/laporan/file'), $fileName);
            $validated['file_path'] = $fileName;
        }

        LaporanKegiatan::create($validated);

        return redirect()
            ->route('admin.transparansi.laporan.index')
            ->with('success', 'Data laporan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $laporan = LaporanKegiatan::findOrFail($id);
        return view('admin.page.transparansi.laporan.edit', compact('laporan'));
    }

    public function update(Request $request, $id)
    {
        $laporan = LaporanKegiatan::findOrFail($id);

        $validated = $request->validate([
            'judul'       => 'required|string|max:255',
            'deskripsi'   => 'required|string',
            'lokasi'      => 'required|string|max:255',
            'anggaran'    => 'nullable|string',
            'tanggal'     => 'required|date',
            'foto'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'file_path'   => 'nullable|mimes:pdf,doc,docx|max:4096',
        ]);

        if (!empty($validated['anggaran'])) {
            $validated['anggaran'] = preg_replace('/[^\d]/', '', $validated['anggaran']);
        }

        // Upload foto baru jika ada
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('uploads/laporan/foto'), $fotoName);
            $validated['foto'] = $fotoName;
        }

        // Upload file baru jika ada
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/laporan/file'), $fileName);
            $validated['file_path'] = $fileName;
        }

        $laporan->update($validated);

        return redirect()
            ->route('admin.transparansi.laporan.index')
            ->with('success', 'Data laporan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $laporan = LaporanKegiatan::findOrFail($id);

        // Hapus foto jika ada
        if ($laporan->foto && file_exists(public_path('uploads/laporan/foto/' . $laporan->foto))) {
            unlink(public_path('uploads/laporan/foto/' . $laporan->foto));
        }

        // Hapus file jika ada
        if ($laporan->file_path && file_exists(public_path('uploads/laporan/file/' . $laporan->file_path))) {
            unlink(public_path('uploads/laporan/file/' . $laporan->file_path));
        }

        $laporan->delete();

        return back()->with('success', 'Data laporan berhasil dihapus!');
    }
}
