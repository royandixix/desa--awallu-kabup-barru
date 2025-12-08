<?php

namespace App\Models\Posyandu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PraLansia extends Model
{
    use HasFactory;

    protected $table = 'pra_lansias';

    protected $fillable = [
        'nama',
        'umur',
        'alamat'
    ];
}
