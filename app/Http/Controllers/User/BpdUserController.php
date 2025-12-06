<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Bpd;

class BpdUserController extends Controller
{
    public function index()
    {
        $bpds = Bpd::paginate(12); // <-- gunakan paginate, bukan all()
        $halaman = 'bpd'; // supaya header_struktur.blade.php tidak error
        return view('user.page.struktur.bpd', compact('bpds', 'halaman'));
    }
}
