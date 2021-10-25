<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        return view('Beranda.Index', ['Title' => 'Beranda']);
    }
}
