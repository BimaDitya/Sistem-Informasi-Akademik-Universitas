<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function beranda()
    {
        $pengguna  = Pengguna::all();

        return view('beranda', ['nama' => $pengguna]);
    }
}
