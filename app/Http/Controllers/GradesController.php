<?php

namespace App\Http\Controllers;

use App\Models\Grades;
use App\Models\Account;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GradesController extends Controller
{
    // Transkrip
    public function storeGrades(Request $request)
    {
        $storeGrades = $request->validate([
            "nim" => "required",
            "matakuliah" => "required",
            "sks" => "required",
            "nilai" => "required",
            "indeks" => "required",
        ]);

        $storeGrades = new Grades;
        $storeGrades -> account_id = $request->nim;
        $storeGrades -> nim = $request->nim;
        $storeGrades -> course_id = $request->matakuliah;
        $storeGrades -> matakuliah = $request->matakuliah;
        $storeGrades -> sks = $request->sks;
        $storeGrades -> nilai = $request->nilai;
        $storeGrades -> indeks = $request->indeks;
        $storeGrades -> save();

        if($storeGrades) {
            return redirect('/Admin/Transkrip')->with('Berhasil', 'Data Berhasil Disimpan');
        }
    }

    public function readGrades()
    {
        $Data = Account::all();
        $Grades = Grades::all();
        $Courses = Course::all();
        return view('Admin.Transkrip.Index', compact('Data', 'Grades', 'Courses'), ['Title' => 'Transkrip Nilai']);
    }


    public function detailGrades(Grades $id)
    {
        $Grades = Grades::find($id);
        return view('Admin.Transkrip.Update', compact('Grades'), ['Title' => 'Update']);
    }

    public function updateGrades(Request $request, Grades $id)
    {
        $updateGrades = Grades::find(count(array($id)));
        $updateGrades -> account_id = $request->nim;
        $updateGrades -> course_id = $request->matakuliah;
        $updateGrades -> matakuliah = $request->matakuliah;
        $updateGrades -> sks = $request->sks;
        $updateGrades -> nilai = $request->nilai;
        $updateGrades -> indeks = $request->indeks;
        $updateGrades -> save();

        return redirect('/Admin/Transkrip/') -> with('Berhasil', 'Data Berhasil Diperbarui');
    }

    public function delete(Grades $id)
    {
        $Grades = Grades::find($id);
        $Grades -> delete();
        return redirect('/Admin/Transkrip')->with('Berhasil', 'Data Berhasil Dihapus');
    }
}
