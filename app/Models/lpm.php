<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lpm extends Model
{
    use HasFactory;

    protected $table = 'lpms'; // nama tabel

    // kolom yang bisa diisi lewat mass assignment
    protected $fillable = [
        'gambar', // path ke gambar struktur
    ];
}
