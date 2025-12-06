<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransparansiDokumen extends Model
{
    // Table name explicit (optional, tapi bagus untuk clarity)
    protected $table = 'transparansi_dokumen';

    // Mass assignable fields
    protected $fillable = [
        'judul',
        'jenis',
        'tahun',
        'tanggal',
        'file',
    ];

    // Jika mau, bisa tambahkan casting tanggal otomatis
    protected $casts = [
        'tanggal' => 'date',
        'tahun'   => 'integer',
    ];

    // Bisa juga tambahkan accessor helper untuk file URL
    public function getFileUrlAttribute()
    {
        return $this->file ? asset('storage/' . $this->file) : null;
    }
}
