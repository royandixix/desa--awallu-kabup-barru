<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index()
    {
        return view('user.page.pengaduan.pengaduan');
    }

    public function store(Request $request)
    {
        // Validasi dengan pesan Bahasa Indonesia
        $messages = [
            'nama.required' => 'Nama wajib diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama maksimal 255 karakter.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'no_hp.string' => 'Nomor HP harus berupa teks.',
            'no_hp.max' => 'Nomor HP maksimal 20 karakter.',
            'kategori.required' => 'Kategori wajib dipilih.',
            'kategori.string' => 'Kategori harus berupa teks.',
            'pesan.required' => 'Isi pengaduan wajib diisi.',
            'pesan.string' => 'Isi pengaduan harus berupa teks.',
            'foto.image' => 'File yang diunggah harus berupa gambar.',
            'foto.max' => 'Ukuran foto maksimal 2MB.',
        ];

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'kategori' => 'required|string',
            'pesan' => 'required|string',
            'foto' => 'nullable|image|max:2048',
        ], $messages);

        $data = $request->only('nama', 'no_hp', 'kategori', 'pesan');

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/pengaduan'), $filename);
            $data['foto'] = 'uploads/pengaduan/' . $filename;
        }

        Pengaduan::create($data);

        // Flash message untuk sweet alert
        return redirect()->back()->with('success', '✅ Pengaduan berhasil dikirim!');
    }
}
