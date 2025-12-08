<?php

namespace App\Models\Posyandu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IbuMenyusui extends Model
{
    use HasFactory;

    protected $table = 'ibu_menyusuis';

    protected $fillable = [
        'nama',
        'umur',
        'alamat',
        'dusun',
    ];
}
