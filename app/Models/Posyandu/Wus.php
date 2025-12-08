<?php

namespace App\Models\Posyandu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wus extends Model
{
    use HasFactory;

    protected $table = 'wus';

    protected $fillable = [
        'nama',
        'alamat',
        'umur',
    ];
}
