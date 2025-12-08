<?php

namespace App\Models\Posyandu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pus extends Model
{
    use HasFactory;

    protected $table = 'pus';

    protected $fillable = [
        'nama',
        'alamat',
        'no_hp',
        'umur',
    ];
}
