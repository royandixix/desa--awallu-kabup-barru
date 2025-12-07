<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanKegiatan extends Model
{
    protected $table = 'laporan_kegiatan';

    protected $fillable = [
        'judul',
        'lokasi',
        'tanggal',
        'anggaran',
        'foto',
        'file_path',
        'deskripsi'
    ];
}
