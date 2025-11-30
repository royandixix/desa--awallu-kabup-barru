<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'desc', 'lokasi', 'kategori', 'tanggal', 'file'
    ];

    // Tambahkan cast agar tanggal otomatis menjadi Carbon
    protected $casts = [
        'tanggal' => 'datetime',
    ];
}
