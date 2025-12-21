<?php

namespace App\Http\Controllers\Admin\Transparansi;

use App\Http\Controllers\Controller;
use App\Models\TransparansiBumdes;
use Illuminate\Http\Request;

class BumdesController extends Controller
{
    // ==========================
    // INDEX + FILTER
    // ==========================
    public function index(Request $request)
    {
        $query = TransparansiBumdes::query();

        // Filter Kategori
        if ($request->kategori) {
            $query->where('kategori', $request->kategori);
        }

        // Filter berdasarkan bulan/tahun dari tanggal
        if ($request->bulan) {
            $query->whereMonth('tanggal', $request->bulan);
        }
        if ($request->tahun) {
            $query->whereYear('tanggal', $request->tahun);
        }

        // Data + Pagination
        $bumdes = $query->latest()->paginate(12)->withQueryString();

        return view('admin.page.transparansi.bumdes.index', compact('bumdes'));
    }

    // ==========================
    // CREATE
    // ==========================
    public function create()
    {
        return view('admin.page.transparansi.bumdes.create');
    }

    // ==========================
    // STORE
    // ==========================
    public function store(Request $request)
    {
        $data = $request->validate([
            'judul'    => 'required|string|max:255',
            'kategori' => 'required|in:BUMDes,KOPDes',
            'tanggal'  => 'required|date',
            'file'     => 'required|file|mimes:pdf,jpg,jpeg,png,webp,xls,xlsx|max:10240',
        ], [
            'file.max'   => 'Ukuran file maksimal 10 MB.',
            'file.mimes' => 'Format file tidak didukung.'
        ]);

        // Upload file ke public/uploads/bumdes
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/bumdes'), $fileName);
            $data['file'] = $fileName;
        }

        TransparansiBumdes::create($data);

        return back()->with('success', 'Data BUMDes/KOPDes berhasil ditambahkan!');
    }

    // ==========================
    // EDIT
    // ==========================
    public function edit(TransparansiBumdes $bumde)
    {
        return view('admin.page.transparansi.bumdes.edit', compact('bumde'));
    }

    // ==========================
    // UPDATE
    // ==========================
    public function update(Request $request, TransparansiBumdes $bumde)
    {
        $data = $request->validate([
            'judul'    => 'required|string|max:255',
            'kategori' => 'required|in:BUMDes,KOPDes',
            'tanggal'  => 'required|date',
            'file'     => 'nullable|file|mimes:pdf,jpg,jpeg,png,webp,xls,xlsx|max:10240',
        ], [
            'file.max'   => 'Ukuran file maksimal 10 MB.',
            'file.mimes' => 'Format file tidak didukung.'
        ]);

        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($bumde->file && file_exists(public_path('uploads/bumdes/' . $bumde->file))) {
                unlink(public_path('uploads/bumdes/' . $bumde->file));
            }

            // Upload file baru
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/bumdes'), $fileName);
            $data['file'] = $fileName;
        }

        $bumde->update($data);

        return redirect()->route('admin.transparansi.bumdes.index')
            ->with('success', 'Data berhasil diperbarui!');
    }

    // ==========================
    // DELETE
    // ==========================
    public function destroy(TransparansiBumdes $bumde)
    {
        if ($bumde->file && file_exists(public_path('uploads/bumdes/' . $bumde->file))) {
            unlink(public_path('uploads/bumdes/' . $bumde->file));
        }

        $bumde->delete();

        return redirect()->route('admin.transparansi.bumdes.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
