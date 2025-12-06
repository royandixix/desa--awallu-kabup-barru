<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Berita extends Model
{
    use HasFactory;

    // Nama tabel (optional, Laravel otomatis pakai 'beritas')
    protected $table = 'beritas';

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'judul',
        'slug',
        'kategori',
        'konten',
        'image',
        'author',
    ];

    // (Optional) Casting data
    protected $casts = [
        'created_at' => 'datetime:d F Y',
        'updated_at' => 'datetime:d F Y',
    ];

    // (Optional) Bisa buat accessor untuk menampilkan path image lengkap
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }
}
