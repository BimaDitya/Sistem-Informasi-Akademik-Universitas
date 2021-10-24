<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index() 
    {
        $Mahasiswa = \App\Models\Student::all();
        return view('Admin.Index', ['Title' => 'Admin', 'Mahasiswa' => $Mahasiswa]);
    }

    public function create(Request $request)
    {

        $create = new Student;
        $create -> nim = $request -> nim;
        $create -> nama_depan = $request -> nama_depan;
        $create -> nama_belakang = $request -> nama_belakang;
        $create -> jenis_kelamin = $request -> jenis_kelamin;
        $create -> agama = $request -> agama;
        $create -> alamat = $request -> alamat;
        $create -> password = Hash::make($request->password);
        $create->save();
        return redirect()->intended('/Admin');
    }
}
