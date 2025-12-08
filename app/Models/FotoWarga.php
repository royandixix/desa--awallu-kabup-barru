<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FotoWarga extends Model
{
    protected $table = 'foto_wargas';

    protected $fillable = [
        'gambar',
    ];
}
