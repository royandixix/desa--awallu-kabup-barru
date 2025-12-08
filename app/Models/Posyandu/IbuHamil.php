<?php

namespace App\Models\Posyandu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IbuHamil extends Model
{
    use HasFactory;

    protected $table = 'ibu_hamil'; // Sesuai nama tabel

    protected $fillable = [
        'nama_ibu',
        'umur_kehamilan',
        'nama_suami',
        'alamat',
        'no_hp',
    ];
}
