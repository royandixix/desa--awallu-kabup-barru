<?php

namespace App\Http\Controllers\Admin\Transparansi;

use App\Http\Controllers\Controller;
use App\Models\TransparansiBumdes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'file'     => 'required|file|mimes:pdf,jpg,jpeg,png,webp,xls,xlsx|max:10240', // Excel support
        ], [
            'file.max'   => 'Ukuran file maksimal 10 MB.',
            'file.mimes' => 'Format file tidak didukung.'
        ]);

        // Upload file
        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('bumdes', 'public');
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
            if ($bumde->file && Storage::disk('public')->exists($bumde->file)) {
                Storage::disk('public')->delete($bumde->file);
            }
            $data['file'] = $request->file('file')->store('bumdes', 'public');
        }

        $bumde->update($data);

        return redirect()->route('admin.transparansi.bumdes.index')
            ->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(TransparansiBumdes $bumde)
    {
        if ($bumde->file && Storage::disk('public')->exists($bumde->file)) {
            Storage::disk('public')->delete($bumde->file);
        }

        $bumde->delete();

        return redirect()->route('admin.transparansi.bumdes.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
