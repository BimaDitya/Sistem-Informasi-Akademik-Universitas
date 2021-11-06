<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{

    public function storeStudent(Request $request)
    {
        $storeStudent = $request->validate([
            'agama' => 'required|max:10',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'jalur_penerimaan' => 'required',
        ]);

        $storeStudent['account_id'] = auth()->user()->id;

        Student::create($storeStudent);

        return redirect('/Mahasiswa/Detail')->with('Berhasil', 'Data Berhasil Disimpan');
    }

    public function update(Request $request)
    {
        $update = $request->validate([
            'agama' => 'required|max:10',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'jalur_penerimaan' => 'required',
        ]);

        $update = Account::first()->student;
        $update -> agama = $request->agama;
        $update -> tempat_lahir = $request->tempat_lahir;
        $update -> tanggal_lahir = $request->tanggal_lahir;
        $update -> jenis_kelamin = $request->jenis_kelamin;
        $update -> jalur_penerimaan = $request->jalur_penerimaan;
        $update -> save();

        return redirect('/Mahasiswa/Detail')->with('Berhasil', 'Data Berhasil Diperbarui');
    }
    

    public function detailStudent()
    {
        $Data = Account::first();
        return view ('Mahasiswa.Index', ['Title' => 'Mahasiswa'])->with('Data',$Data);
    }

    public function updateStudentDetail()
    {
        $Data = Account::first();
        Auth::user()->id;
        return view ('Mahasiswa.Update', ['Title' => 'Mahasiswa'])->with('Data',$Data);
    }

    public function index()
    {
        Auth::user()->id;
        return view('Beranda.Index', ['Title' => 'Beranda']);
    }
}
