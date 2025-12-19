<?php

namespace App\Http\Controllers\User\Home;

use App\Http\Controllers\Controller;
use App\Models\StrukturDesa;

class HomeController extends Controller
{
    public function index()
    {
        $anggota = StrukturDesa::all();
        return view('user.page.home.content', compact('anggota'));
    }
}
