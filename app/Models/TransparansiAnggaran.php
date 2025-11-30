<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransparansiAnggaran extends Model
{
    protected $table = 'transparansi_anggaran';

    protected $fillable = [
        'judul',
        'jenis',
        'tahun',
        'tanggal',
        'file'
    ];

    // ✅ Tambahkan cast
    protected $casts = [
        'tanggal' => 'date',
        'tahun' => 'integer',
    ];
}