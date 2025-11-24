<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilDesa extends Model
{
    // Nama tabel sesuai yang di database
    protected $table = 'profil_desa';

    protected $fillable = [
        'judul',
        'deskripsi_singkat',
        'gambar_header',
        'sejarah',
        'wilayah_administratif',
        'nama_desa',
        'kecamatan',
        'kabupaten',
        'batas_utara',
        'batas_selatan',
        'batas_timur',
        'batas_barat',
        'koordinat',
        'jarak_kabupaten',
    ];
}
