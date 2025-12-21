<?php

namespace App\Http\Controllers\Admin\Transparansi;

use App\Http\Controllers\Controller;
use App\Models\TransparansiAnggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AnggaranController extends Controller
{
    protected $path;

    public function __construct()
    {
        // Path folder upload langsung di public
        $this->path = public_path('uploads/transparansi_anggaran');

        // Buat folder jika belum ada
        if (!File::exists($this->path)) {
            File::makeDirectory($this->path, 0755, true);
        }
    }

    // ==========================
    // INDEX
    // ==========================
    public function index()
    {
        $anggarans = TransparansiAnggaran::latest()->paginate(10);
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
        // Hapus titik ribuan untuk pemasukan & pengeluaran
        $request->merge([
            'pemasukan' => $request->pemasukan ? str_replace('.', '', $request->pemasukan) : null,
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

        // Upload file ke public jika ada
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . Str::slug($request->judul) . '.' . $file->getClientOriginalExtension();
            $file->move($this->path, $filename);
            $data['file'] = $filename;
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
            'pemasukan' => $request->pemasukan ? str_replace('.', '', $request->pemasukan) : $anggaran->pemasukan,
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

        // Update field yang ada
        foreach ($data as $key => $value) {
            if ($value !== null) {
                $anggaran->$key = $value;
            }
        }

        // Upload file baru jika ada
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($anggaran->file && File::exists($this->path . '/' . $anggaran->file)) {
                File::delete($this->path . '/' . $anggaran->file);
            }

            $file = $request->file('file');
            $filename = time() . '_' . Str::slug($request->judul) . '.' . $file->getClientOriginalExtension();
            $file->move($this->path, $filename);
            $anggaran->file = $filename;
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
        if ($anggaran->file && File::exists($this->path . '/' . $anggaran->file)) {
            File::delete($this->path . '/' . $anggaran->file);
        }

        $anggaran->delete();

        return redirect()->route('admin.transparansi.anggaran.index')
            ->with('success', 'Data anggaran berhasil dihapus!');
    }
}
