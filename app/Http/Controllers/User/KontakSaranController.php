<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\KontakSaran;
use Illuminate\Http\Request;

class KontakSaranController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required',
            'email' => 'required|email',
            'pesan' => 'required',
        ]);

        

        KontakSaran::create($request->only(['nama', 'email', 'pesan']));

        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }
}
