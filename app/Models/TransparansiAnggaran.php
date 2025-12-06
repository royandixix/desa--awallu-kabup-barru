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
        'pemasukan',    // ✅ WAJIB ADA
        'pengeluaran',  // ✅ WAJIB ADA
        'file'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'tahun' => 'integer',
        'pemasukan' => 'integer',    // ✅ TAMBAHKAN
        'pengeluaran' => 'integer',  // ✅ TAMBAHKAN
    ];
}