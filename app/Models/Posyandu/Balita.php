<?php

namespace App\Models\Posyandu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balita extends Model
{
    use HasFactory;

    protected $table = 'balitas'; // pastikan nama tabel sesuai di database

    protected $fillable = [
        'nama_balita',
        'tanggal_lahir',
        'jenis_kelamin', // 'L' atau 'P'
        'umur',          // misal '1-2', '2-3', '3-4', '4-5'
        'nama_ibu',
        'alamat',
    ];

    // Optional: akses tanggal lahir sebagai Carbon object
    protected $dates = [
        'tanggal_lahir',
    ];
}
