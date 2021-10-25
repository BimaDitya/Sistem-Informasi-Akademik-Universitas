<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function create()
    {
        return view('Admin.Index', ['Title' => 'Admin']);
    }
    
    public function store(Request $request)
    {
        $store = new Student;
        $store -> nim = $request->nim;
        $store -> agama = $request->agama;
        $store -> nama_depan = $request->nama_depan;
        $store -> jenis_kelamin = $request->jenis_kelamin;
        $store -> nama_belakang = $request->nama_belakang;
        $store -> password = Hash::make($request->password);
        $store ->save();
        return redirect()->intended('/Admin')->with('Berhasil', 'Data Berhasil Ditambah');
    }

    public function index() 
    {
        $Mhs = Student::all();
        return view('Admin.Index', ['Title' => 'Admin', 'Mhs' => $Mhs]);
    }

    public function detail($id)
    {
        $Mhs = Student::find($id);
        return view('Beranda.Update', ['Title' => 'Update', 'Mhs' => $Mhs]);
    }

    public function update(Request $request, $id)
    {
        $store = Student::find($id);
        $store -> nim = $request->nim;
        $store -> agama = $request->agama;
        $store -> nama_depan = $request->nama_depan;
        $store -> jenis_kelamin = $request->jenis_kelamin;
        $store -> nama_belakang = $request->nama_belakang;
        $store -> password = Hash::make($request->password);
        $store ->save();
        return redirect('/Admin')->with('Berhasil', 'Data Berhasil Diperbarui');
    }

    public function delete($id)
    {
        $Mhs = Student::find($id);
        $Mhs->delete();
        return redirect('/Admin')->with('Berhasil', 'Data Berhasil Dihapus');
    }
}
