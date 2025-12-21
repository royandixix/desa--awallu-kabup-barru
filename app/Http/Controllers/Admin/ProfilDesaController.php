<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProfilDesaController extends Controller
{
    // ============================
    // KONVERSI GOOGLE MAPS
    // ============================
    private function convertToEmbedUrl($url)
    {
        $headers = @get_headers($url, 1);

        if (!$headers || !isset($headers['Location'])) {
            return $url;
        }

        $finalUrl = is_array($headers['Location']) ? end($headers['Location']) : $headers['Location'];

        // Format koordinat
        if (preg_match('/@(-?\d+\.\d+),(-?\d+\.\d+)/', $finalUrl, $m)) {
            $lat = $m[1];
            $lng = $m[2];
            return "https://www.google.com/maps/embed/v1/view?key=YOUR_API_KEY&center=$lat,$lng&zoom=15";
        }

        // Format place
        if (str_contains($finalUrl, "google.com/maps/place")) {
            return "https://www.google.com/maps/embed?pb=";
        }

        return $url;
    }

    // ============================
    // INDEX
    // ============================
    public function index()
    {
        $data = ProfilDesa::all();
        return view('admin.page.profil_desa.index', compact('data'));
    }

    // ============================
    // CREATE
    // ============================
    public function create()
    {
        return view('admin.page.profil_desa.create');
    }

    // ============================
    // STORE
    // ============================
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi_singkat' => 'nullable|string',
            'gambar_header.*' => 'nullable|image|max:2048',
        ]);

        $data = $request->only([
            'judul',
            'deskripsi_singkat',
            'sejarah',
            'wilayah_administratif',
            'nama_desa',
            'kecamatan',
            'kabupaten',
            'batas_utara',
            'batas_selatan',
            'batas_timur',
            'batas_barat',
            'jarak_kabupaten'
        ]);

        // Konversi Google Maps otomatis
        if ($request->koordinat) {
            $data['koordinat'] = $this->convertToEmbedUrl($request->koordinat);
        }

        // Upload multi gambar ke public/uploads/profil_desa
        if ($request->hasFile('gambar_header')) {

            $folder = public_path('uploads/profil_desa');
            if (!file_exists($folder)) {
                mkdir($folder, 0755, true);
            }

            $paths = [];
            foreach ($request->file('gambar_header') as $file) {
                $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
                $file->move($folder, $filename);
                $paths[] = $filename;
            }

            $data['gambar_header'] = json_encode($paths);
        }

        ProfilDesa::create($data);

        return redirect()->route('admin.profil_desa.index')
            ->with('success', 'Profil Desa berhasil ditambahkan!');
    }

    // ============================
    // EDIT
    // ============================
    public function edit($id)
    {
        $item = ProfilDesa::findOrFail($id);
        return view('admin.page.profil_desa.edit', compact('item'));
    }

    // ============================
    // UPDATE
    // ============================
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi_singkat' => 'nullable|string',
            'gambar_header.*' => 'nullable|image|max:2048',
        ]);

        $item = ProfilDesa::findOrFail($id);

        $data = $request->only([
            'judul',
            'deskripsi_singkat',
            'sejarah',
            'wilayah_administratif',
            'nama_desa',
            'kecamatan',
            'kabupaten',
            'batas_utara',
            'batas_selatan',
            'batas_timur',
            'batas_barat',
            'jarak_kabupaten'
        ]);

        // Update koordinat Google Maps
        if ($request->koordinat) {
            $data['koordinat'] = $this->convertToEmbedUrl($request->koordinat);
        }

        // Upload gambar baru
        if ($request->hasFile('gambar_header')) {

            // Hapus gambar lama
            if ($item->gambar_header) {
                foreach (json_decode($item->gambar_header) as $old) {
                    $file = public_path('uploads/profil_desa/' . $old);
                    if (file_exists($file)) unlink($file);
                }
            }

            $folder = public_path('uploads/profil_desa');
            if (!file_exists($folder)) {
                mkdir($folder, 0755, true);
            }

            $paths = [];
            foreach ($request->file('gambar_header') as $file) {
                $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
                $file->move($folder, $filename);
                $paths[] = $filename;
            }

            $data['gambar_header'] = json_encode($paths);
        }

        $item->update($data);

        return redirect()->route('admin.profil_desa.index')
            ->with('success', 'Profil Desa berhasil diupdate!');
    }

    // ============================
    // DESTROY
    // ============================
    public function destroy($id)
    {
        $item = ProfilDesa::findOrFail($id);

        if ($item->gambar_header) {
            foreach (json_decode($item->gambar_header) as $old) {
                $file = public_path('uploads/profil_desa/' . $old);
                if (file_exists($file)) unlink($file);
            }
        }

        $item->delete();

        return redirect()->route('admin.profil_desa.index')
            ->with('success', 'Profil Desa berhasil dihapus!');
    }
}
