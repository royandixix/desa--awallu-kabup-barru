<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StrukturController extends Controller
{
    public function index()
    {
        return view('admin.home.struktur.index');
    }
}
