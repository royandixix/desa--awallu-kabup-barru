<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransparansiDokumen extends Model
{
    protected $table = 'transparansi_dokumen';

    protected $fillable = [
        'judul',
        'jenis',
        'tahun',
        'tanggal',
        'file'
    ];
}
