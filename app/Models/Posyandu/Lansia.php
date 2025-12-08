<?php

namespace App\Models\Posyandu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lansia extends Model
{
    use HasFactory;

    protected $table = 'lansia';

    protected $fillable = [
        'nama',
        'umur',
        'alamat',
        'no_hp'
    ];
}
