<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StrukturDesa extends Model
{
    protected $table = 'struktur_desa';

    protected $fillable = [
        'kategori',
        'nama',
        'jabatan',
        'foto'
    ];
}
