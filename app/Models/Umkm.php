<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pengusaha','nama_usaha','jenis_usaha','deskripsi','alamat',
        'kontak','foto','foto_pengusaha','kode_umkm','harga'
    ];

    public function produk()
    {
        return $this->hasMany(UmkmProduk::class);
    }
}
