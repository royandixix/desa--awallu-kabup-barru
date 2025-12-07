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
            'judul'     => 'required|string|max:255',
            'lokasi'    => 'required|string|max:255',
            'anggaran'  => 'nullable|string', // ubah jadi string dulu
            'tanggal'   => 'required|date',
            'foto'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'file_path' => 'nullable|mimes:pdf,doc,docx|max:4096',
        ], [
            'judul.required'     => 'Judul wajib diisi.',
            'lokasi.required'    => 'Lokasi wajib diisi.',
            'tanggal.required'   => 'Tanggal wajib diisi.',
            'tanggal.date'       => 'Tanggal tidak valid.',
            'foto.image'         => 'Foto harus berupa gambar.',
            'foto.mimes'         => 'Foto harus berekstensi: jpg, jpeg, png, webp.',
            'foto.max'           => 'Ukuran foto maksimal 2MB.',
            'file_path.mimes'    => 'File harus berekstensi: pdf, doc, docx.',
            'file_path.max'      => 'Ukuran file maksimal 4MB.',
        ]);

        // Konversi anggaran dari format Rupiah ke angka murni
        if (!empty($validated['anggaran'])) {
            $validated['anggaran'] = preg_replace('/[^\d]/', '', $validated['anggaran']);
        }

        // Upload foto
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('laporan/foto', 'public');
        }

        // Upload file PDF/DOC
        if ($request->hasFile('file_path')) {
            $validated['file_path'] = $request->file('file_path')->store('laporan/file', 'public');
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
            'judul'     => 'required|string|max:255',
            'lokasi'    => 'required|string|max:255',
            'anggaran'  => 'nullable|string',
            'tanggal'   => 'required|date',
            'foto'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'file_path' => 'nullable|mimes:pdf,doc,docx|max:4096',
        ], [
            'judul.required'     => 'Judul wajib diisi.',
            'lokasi.required'    => 'Lokasi wajib diisi.',
            'tanggal.required'   => 'Tanggal wajib diisi.',
            'tanggal.date'       => 'Tanggal tidak valid.',
            'foto.image'         => 'Foto harus berupa gambar.',
            'foto.mimes'         => 'Foto harus berekstensi: jpg, jpeg, png, webp.',
            'foto.max'           => 'Ukuran foto maksimal 2MB.',
            'file_path.mimes'    => 'File harus berekstensi: pdf, doc, docx.',
            'file_path.max'      => 'Ukuran file maksimal 4MB.',
        ]);

        if (!empty($validated['anggaran'])) {
            $validated['anggaran'] = preg_replace('/[^\d]/', '', $validated['anggaran']);
        }

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('laporan/foto', 'public');
        }

        if ($request->hasFile('file_path')) {
            $validated['file_path'] = $request->file('file_path')->store('laporan/file', 'public');
        }

        $laporan->update($validated);

        return redirect()
            ->route('admin.transparansi.laporan.index')
            ->with('success', 'Data laporan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $laporan = LaporanKegiatan::findOrFail($id);
        $laporan->delete();

        return back()->with('success', 'Data laporan berhasil dihapus!');
    }
}
