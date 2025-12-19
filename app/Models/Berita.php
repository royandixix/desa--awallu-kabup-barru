<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Berita extends Model
{
    use HasFactory;

    /**
     * Nama tabel (Laravel otomatis pakai 'beritas')
     */
    protected $table = 'beritas';

    /**
     * Kolom yang bisa diisi massal
     */
    protected $fillable = [
        'judul',
        'slug',
        'kategori',
        'konten',
        'image',
        'author',
    ];

    /**
     * Casting tanggal
     */
    protected $casts = [
        'created_at' => 'datetime:d F Y',
        'updated_at' => 'datetime:d F Y',
    ];

    /**
     * Accessor untuk URL gambar
     * Mengembalikan URL publik gambar agar bisa tampil di Blade user/admin
     */
    public function getImageUrlAttribute()
    {
        return $this->image ? asset($this->image) : null;
    }

    /**
     * Optional: Accessor untuk menampilkan tanggal format panjang
     */
    public function getFormattedDateAttribute()
    {
        return $this->created_at ? $this->created_at->translatedFormat('d F Y') : null;
    }

    /**
     * Optional: Scope untuk berita terbaru
     */
    public function scopeLatestBerita($query)
    {
        return $query->latest('created_at');
    }
}
