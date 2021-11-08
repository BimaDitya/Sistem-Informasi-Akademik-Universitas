<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Address;
use App\Models\College;
use App\Models\Parental;
use App\Models\Student;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    // Biodata Mahasiswa
    public function storeStudent(Request $request, College $id)
    {
        $storeStudent = $request->validate([
            'agama' => 'required|max:10',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'jalur_penerimaan' => 'required',
        ]);

        $storeStudent ['account_id'] = auth()->user()->id;
        
        $storeStudent = new Student;
        $storeStudent -> account_id = auth()->user()->id;
        $storeStudent -> agama = $request -> agama;
        $storeStudent -> tempat_lahir = $request -> tempat_lahir;
        $storeStudent -> tanggal_lahir = $request -> tanggal_lahir;
        $storeStudent -> jenis_kelamin = $request -> jenis_kelamin;
        $storeStudent -> jalur_penerimaan = $request -> jalur_penerimaan;
        $storeStudent -> save();

        return redirect('/Mahasiswa/Detail/')->with('Berhasil', 'Data Berhasil Disimpan');
    }
    public function updateStudent(Request $request)
    {
        $updateStudent = $request->validate([
            'agama' => 'required|max:10',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'jalur_penerimaan' => 'required',
        ]);

        $updateStudent = Account::first()->student;
        $updateStudent -> agama = $request->agama;
        $updateStudent -> tempat_lahir = $request->tempat_lahir;
        $updateStudent -> tanggal_lahir = $request->tanggal_lahir;
        $updateStudent -> jenis_kelamin = $request->jenis_kelamin;
        $updateStudent -> jalur_penerimaan = $request->jalur_penerimaan;
        $updateStudent -> save();

        return redirect('/Mahasiswa/Detail/')->with('Berhasil', 'Data Berhasil Diperbarui');
    }
    public function updateStudentDetail()
    {
        $Data = Account::first();
        Auth::user()->id;
        return view ('Mahasiswa.Update', ['Title' => 'Mahasiswa'])->with('Data',$Data);
    }

    // Alamat Mahasiswa
    public function storeAddress(Request $request)
    {
        $storeAddress = $request->validate([
            'jalan' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
        ]);

        $storeAddress['account_id'] = auth()->user()->id;

        Address::create($storeAddress);

        return redirect('/Mahasiswa/Detail/')->with('Berhasil', 'Data Berhasil Disimpan');
    }
    public function updateAddress(Request $request)
    {
        $updateAddress = $request->validate([
            'jalan' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
        ]);

        $updateAddress = Account::first()->address;
        $updateAddress -> jalan = $request->jalan;
        $updateAddress -> kecamatan = $request->kecamatan;
        $updateAddress -> kabupaten = $request->kabupaten;
        $updateAddress -> provinsi = $request->provinsi;
        $updateAddress -> save();

        return redirect('/Mahasiswa/Detail/')->with('Berhasil', 'Data Berhasil Diperbarui');
    }
    public function updateAddressDetail()
    {
        $Data = Account::first();
        Auth::user()->id;
        return view ('Mahasiswa.UpdateAddress', ['Title' => 'Mahasiswa'])->with('Data',$Data);
    }

    // Asal Sekolah Mahasiswa
        public function storeSchool(Request $request)
    {
        $storeSchool = $request->validate([
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'sekolah' => 'required',
        ]);

        $storeSchool['account_id'] = auth()->user()->id;

        School::create($storeSchool);

        return redirect('/Mahasiswa/Detail/')->with('Berhasil', 'Data Berhasil Disimpan');
    }
    public function updateSchool(Request $request)
    {
        $updateSchool = $request->validate([
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'sekolah' => 'required',
        ]);

        $updateSchool = Account::first()->school;
        $updateSchool -> kecamatan = $request->kecamatan;
        $updateSchool -> kabupaten = $request->kabupaten;
        $updateSchool -> provinsi = $request->provinsi;
        $updateSchool -> sekolah = $request->sekolah;
        $updateSchool -> save();

        return redirect('/Mahasiswa/Detail/')->with('Berhasil', 'Data Berhasil Diperbarui');
    }
    public function updateSchoolDetail()
    {
        $Data = Account::first();
        Auth::user()->id;
        return view ('Mahasiswa.UpdateSchool', ['Title' => 'Mahasiswa'])->with('Data',$Data);
    }

    // Orang Tua Mahasiswa
    public function storeParent(Request $request)
    {
        $storeParent = $request->validate([
            'nama_ibu' => 'required',
            'nama_ayah' => 'required',
            'tempat_ibu' => 'required',
            'tempat_ayah' => 'required',
            'tanggal_ibu' => 'required',
            'tanggal_ayah' => 'required',
            'no_ibu' => 'required|min:11|max:15',
            'no_ayah' => 'required|min:11|max:15',
        ]);

        $storeParent['account_id'] = auth()->user()->id;

        Parental::create($storeParent);

        return redirect('/Mahasiswa/Detail/')->with('Berhasil', 'Data Berhasil Disimpan');
    }
    public function updateParent(Request $request)
    {
        $updateParent = $request->validate([
            'nama_ibu' => 'required',
            'nama_ayah' => 'required',
            'tempat_ibu' => 'required',
            'tempat_ayah' => 'required',
            'tanggal_ibu' => 'required',
            'tanggal_ayah' => 'required',
            'no_ibu' => 'required',
            'no_ayah' => 'required',
        ]);

        $updateParent = Account::first()->parent;
        $updateParent -> nama_ibu = $request->nama_ibu;
        $updateParent -> nama_ayah = $request->nama_ayah;
        $updateParent -> tempat_ibu = $request->tempat_ibu;
        $updateParent -> tempat_ayah = $request->tempat_ayah;
        $updateParent -> tanggal_ibu = $request->tanggal_ibu;
        $updateParent -> tanggal_ayah = $request->tanggal_ayah;
        $updateParent -> no_ibu = $request->no_ibu;
        $updateParent -> no_ayah = $request->no_ayah;
        $updateParent -> save();

        return redirect('/Mahasiswa/Detail/')->with('Berhasil', 'Data Berhasil Diperbarui');
    }
    public function updateParentDetail()
    {
        $Data = Account::first();
        Auth::user()->id;
        return view ('Mahasiswa.UpdateParent', ['Title' => 'Mahasiswa'])->with('Data',$Data);
    }

    // Kuliah & Kuliah
    public function detailCollege()
    {
        Auth::user()->id;
        return view('Kuliah.Index', ['Title' => 'Perkuliahan']);
    }
    
    // Passing Data
    public function detailStudent()
    {
        $Data = Account::first();
        return view ('Mahasiswa.Index', ['Title' => 'Mahasiswa'])->with('Data',$Data);
    }

    public function index()
    {
        Auth::user()->id;
        return view('Beranda.Index', ['Title' => 'Beranda']);
    }

    // KRS
    public function detailKRS() 
    {
        Auth::user()->id;
        return view('KRS.Index', ['Title' => 'KRS']);
    }
}
