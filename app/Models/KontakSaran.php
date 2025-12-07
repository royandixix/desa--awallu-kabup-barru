<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontakSaran extends Model
{
    use HasFactory;

    protected $table = 'kontak_saran';

    protected $fillable = [
        'nama',
        'email',
        'pesan',
    ];
}
