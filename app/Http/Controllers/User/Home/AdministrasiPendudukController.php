<?php
namespace App\Http\Controllers\User\Home;

use App\Http\Controllers\Controller;
use App\Models\AdministrasiPenduduk;

class AdministrasiPendudukController extends Controller
{
    public function administrasiPenduduk()
    {
        $data = AdministrasiPenduduk::all();
        return view('user.page.home.content', compact('data')); // Kirim $data ke content.blade.php
    }
}
