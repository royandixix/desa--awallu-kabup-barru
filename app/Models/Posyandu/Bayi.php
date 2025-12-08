<?php

namespace App\Models\Posyandu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bayi extends Model
{
    use HasFactory;

    protected $table = 'bayis'; // sesuaikan nama tabel

    protected $fillable = [
        'nama_bayi',
        'tanggal_lahir',
        'jenis_kelamin',
        'nama_ibu',
        'alamat',
    ];

    // Tambahkan ini agar tanggal_lahir otomatis menjadi Carbon instance
    protected $casts = [
        'tanggal_lahir' => 'date',
    ];
}
