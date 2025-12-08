<?php

namespace App\Models\Posyandu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appras extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_anak',
        'umur',
        'nama_ortu',
        'alamat',
    ];
}
