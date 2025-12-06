<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bpd extends Model
{
    use HasFactory;

    // Tabel yang digunakan
    protected $table = 'bpds';

    // Field yang bisa diisi massal
    protected $fillable = [
        'foto',
    ];

    // Accessor supaya bisa langsung dapat URL gambar
    public function getFotoUrlAttribute()
    {
        return $this->foto ? asset('storage/' . $this->foto) : asset('img/user/struktural/default.png');
    }
}
