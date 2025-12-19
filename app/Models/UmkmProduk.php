<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UmkmProduk extends Model
{
    use HasFactory;

    protected $fillable = [
        'umkm_id','nama','harga','deskripsi','foto'
    ];

    public function umkm()
    {
        return $this->belongsTo(Umkm::class);
    }
}
