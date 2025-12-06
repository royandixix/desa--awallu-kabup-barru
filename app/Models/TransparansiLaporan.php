<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransparansiLaporan extends Model
{
    protected $table = 'transparansi_laporan';

    protected $fillable = [
        'judul',
        'deskripsi',
        'tanggal',
        'file',
    ];

    protected $dates = ['tanggal'];
}
