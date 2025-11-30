<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProfilDesa;

class ProfilDesaController extends Controller
{
    public function index()
    {
        $profilDesa = ProfilDesa::first();
        return view('user.page.profil_desa.profil_desa', compact('profilDesa'));
    }
}
