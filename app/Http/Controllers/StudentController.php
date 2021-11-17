<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\School;
use App\Models\Account;
use App\Models\Address;
use App\Models\Payment;
use App\Models\Student;
use App\Models\Parental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function readHome()
    {      
        $Images = Account::first();
        return view('Student.Beranda.Index' ,['Title' => 'Beranda'])->with('Images', $Images);
    }

    // Students 
    public function detailStudent(Account $Account)
    {
        Auth::user()->id;
        return view ('Student.Mahasiswa.Index', compact('Account'), ['Title' => 'Mahasiswa']);
    }

    public function storeStudent(Request $request)
    {
        $storeStudent = $request->validate([
            'agama' => 'required|max:10',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'jalur_penerimaan' => 'required',
        ]);

        $storeStudent = new Student([
            'agama' => $request->agama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jalur_penerimaan' => $request->jalur_penerimaan,
            'account_id' => Auth::user()->id
        ]);
        $storeStudent->save();

        return back()->with('Berhasil', 'Data Berhasil Disimpan');
    }
    public function updateStudent(Request $request, Account $Account)
    {
        $request->validate([
            'agama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'jalur_penerimaan' => 'required',
        ]);

        $Account->student->agama = $request->agama;
        $Account->student->tempat_lahir =  $request->tempat_lahir;
        $Account->student->tanggal_lahir = $request->tanggal_lahir;
        $Account->student->jenis_kelamin = $request->jenis_kelamin;
        $Account->student->jalur_penerimaan = $request->jalur_penerimaan;
        $Account->student->account_id = Auth::user()->id;
        $Account->student->save();

        return back()->with('Berhasil', 'Data Berhasil Perbarui');
    }
    public function updateBiodata(Account $Account)
    {
        Auth::user()->id;
        return view ('Student.Mahasiswa.UpdatePersonal', compact('Account'),['Title' => 'Mahasiswa']);
    }

    // Address
    public function storeAddress(Request $request)
    {
        $storeAddress = $request->validate([
            'jalan' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
        ]);

        $storeAddress = new Address([
            'account_id' => Auth::user()->id,
            'jalan' => $request->jalan,
            'provinsi' => $request->provinsi,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
        ]);
        $storeAddress->save();

        return back()->with('Berhasil', 'Data Berhasil Disimpan');
    }
    public function updateAddress(Request $request, Account $Account)
    {
        $request->validate([
            'jalan' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
        ]);

        $Account->address->jalan = $request->jalan;
        $Account->address->kecamatan =  $request->kecamatan;
        $Account->address->kabupaten = $request->kabupaten;
        $Account->address->provinsi = $request->provinsi;
        $Account->address->account_id = Auth::user()->id;
        $Account->address->save();

        return back()->with('Berhasil', 'Data Berhasil Perbarui');
    }
    public function updateAlamat(Account $Account)
    {
        Auth::user()->id;
        return view ('Student.Mahasiswa.UpdateAddress', compact('Account'),['Title' => 'Mahasiswa']);
    }

    // School
    public function storeSchool(Request $request)
    {
        $storeSchool = $request->validate([
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'sekolah' => 'required',
        ]);

        $storeSchool = new School ([
            'account_id' => Auth::user()->id,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'provinsi' => $request->provinsi,
            'sekolah' => $request->sekolah,
        ]);
        $storeSchool->save();

        return back()->with('Berhasil', 'Data Berhasil Disimpan');
    }
    public function updateSchool(Request $request, Account $Account)
    {
        $request->validate([
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'sekolah' => 'required',
        ]);

        $Account->school->account_id = Auth::user()->id;
        $Account->school->kecamatan =  $request->kecamatan;
        $Account->school->kabupaten = $request->kabupaten;
        $Account->school->provinsi = $request->provinsi;
        $Account->school->sekolah = $request->sekolah;
        $Account->school->save();

        return back()->with('Berhasil', 'Data Berhasil Diperbarui');
    }
    public function updateSekolah(Account $Account)
    {
        Auth::user()->id;
        return view ('Student.Mahasiswa.UpdateSchool', compact('Account'),['Title' => 'Mahasiswa']);
    }

    // Parents
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

        $storeParent = new Parental ([
            'account_id' => Auth::user()->id,
            'nama_ibu' => $request->nama_ibu,
            'nama_ayah' => $request->nama_ayah,
            'tempat_ibu' => $request->tempat_ibu,
            'tempat_ayah' => $request->tempat_ayah,
            'tanggal_ibu' => $request->tanggal_ibu,
            'tanggal_ayah' => $request->tanggal_ayah,
            'no_ibu' => $request->no_ibu,
            'no_ayah' => $request->no_ayah,
        ]);
        $storeParent->save();

        return back()->with('Berhasil', 'Data Berhasil Disimpan');
    }
    public function updateParent(Request $request, Account $Account)
    {
        $request->validate([
            'nama_ibu' => 'required',
            'nama_ayah' => 'required',
            'tempat_ibu' => 'required',
            'tempat_ayah' => 'required',
            'tanggal_ibu' => 'required',
            'tanggal_ayah' => 'required',
            'no_ibu' => 'required',
            'no_ayah' => 'required',
        ]);

        $Account->parent->account_id = Auth::user()->id;
        $Account->parent->nama_ibu = $request->nama_ibu;
        $Account->parent->nama_ayah = $request->nama_ayah;
        $Account->parent->tempat_ibu = $request->tempat_ibu;
        $Account->parent->tempat_ayah = $request->tempat_ayah;
        $Account->parent->tanggal_ibu = $request->tanggal_ibu;
        $Account->parent->tanggal_ayah = $request->tanggal_ayah;
        $Account->parent->no_ibu = $request->no_ibu;
        $Account->parent->no_ayah = $request->no_ayah;
        $Account->parent->save();

        return back()->with('Berhasil', 'Data Berhasil Diperbarui');
    }
    public function updateOrangTua(Account $Account)
    {
        Auth::user()->id;
        return view ('Student.Mahasiswa.UpdateParent', compact('Account'),['Title' => 'Mahasiswa']);
    }

    public function storeImage(Request $request)
    {
        $storeImage = $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png|max:1024'
        ]);
        
        $storeImage = new Image;
        $storeImage -> account_id = Auth::user()->id;
        if($request->file('image')){
            $fileName = $request->image->getClientOriginalName();
            $storeImage['image'] = $request->file('image')->storeAs('Foto_Profil', $fileName);
        }
        $storeImage -> save();

        return back()->with('Berhasil', 'Data Berhasil Simpan');
    }

    public function updateImage(Request $request, Account $Account) 
    {
        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png|max:1024'
        ]);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $fileName = $request->image->getClientOriginalName();
            $updateImage['image'] = $request->file('image')->storeAs('Foto_Profil', $fileName);
        }
        $Account-> image -> save();
        return back()->with('Berhasil', 'Data Berhasil Diperbarui');
    }

    public function updateGambar(Account $Account)
    {
        Auth::user()->id;
        return view('Student.Mahasiswa.UpdateImages', compact('Account'),['Title' => 'Beranda']);
    }

    //Perkuliahan
    public function readCourse(Account $Account) 
    {
        dd($Account->payment());
        return view('Student.Perkuliahan.Index', compact('Account'),['Title' => 'Perkuliahan']);
    }

    public function readPayment(Account $Account, Payment $Payment)
    {
        // dd($Account->$Payment->nominal);
        return view('Student.Informasi.Index', compact('Account', 'Payment'), ['Title' => 'Informasi']);
    }
}
