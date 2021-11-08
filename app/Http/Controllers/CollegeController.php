<?php

namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;

class CollegeController extends Controller
{
    // Perkuliahan
    public function readCollege() 
    {
        $Clg = College::all();
        return view('Admin.College', ['Title' => 'Perkuliahan', 'Clg' => $Clg]);
    }

    public function storeCollege(Request $request)
    {
        $storeCollege = $request->validate([
            'kode' => 'required|min:6|max:6|unique:colleges',
            'kelas' => 'required',
            'matakuliah' => 'required',
            'dosen' => 'required',
            'hari' => 'required',
            'ruang' => 'required',
        ]);

        $storeCollege = new College();
        $storeCollege -> kode = $request->kode;
        $storeCollege -> kelas = $request->kelas;
        $storeCollege -> matakuliah = $request->matakuliah;
        $storeCollege -> dosen = $request->dosen;
        $storeCollege -> hari = $request->hari;
        $storeCollege -> ruang = $request->ruang;
        $storeCollege -> save();

        if ($storeCollege) {
            return redirect('/Admin/Perkuliahan')->with('Berhasil', 'Data Berhasil Disimpan');
        }
    }

    public function detailCollege(College $id)
    {   
        $Clg = College::find(count(array($id)));
        return view('Admin.UpdateCollege', ['Title' => 'Update Perkuliahan', 'Clg' => $Clg]);
    }

    public function updateCollege(Request $request, College $id)
    {
        $updateCollege = $request->validate([
            'kode' => 'required|min:6|max:6',
            'kelas' => 'required',
            'matakuliah' => 'required',
            'dosen' => 'required',
            'hari' => 'required',
            'ruang' => 'required',
        ]);

        $updateCollege = College::find(count(array($id)));
        $updateCollege -> kode = $request->kode;
        $updateCollege -> kelas = $request->kelas;
        $updateCollege -> matakuliah = $request->matakuliah;
        $updateCollege -> dosen = $request->dosen;
        $updateCollege -> hari = $request->hari;
        $updateCollege -> ruang = $request->ruang;
        $updateCollege -> save();

        if ($updateCollege) {
            return redirect('/Admin/Perkuliahan')->with('Berhasil', 'Data Berhasil Diperbarui');
        }
    }
}
