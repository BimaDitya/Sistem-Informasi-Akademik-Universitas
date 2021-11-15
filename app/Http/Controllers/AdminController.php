<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Grades;
use App\Models\Account;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Mahasiswa
    public function storeAccount(Request $request)
    {
        $storeAccount = $request->validate([
            "nim" => "required|min:11|max:11",
            "password" => "required",
            "nama_depan" => "required",
            "nama_belakang" => "required",
        ]);

        $storeAccount = new Account;
        $storeAccount->nim = $request->nim;
        $storeAccount->nama_depan = $request->nama_depan;
        $storeAccount->nama_belakang = $request->nama_belakang;
        $storeAccount->password = Hash::make($request->password);
        $storeAccount->save();

        if ($storeAccount) {
            return redirect('/Admin/Mahasiswa')->with('Berhasil', 'Data Berhasil Disimpan');
        }
    }
    public function readAccount()
    {
        $Accounts = Account::all();
        return view('Admin.Mahasiswa.Index', compact('Accounts'), ['Title' => 'Mahasiswa']);
    }
    public function detailAccount(Account $id)
    {
        $Accounts = Account::find($id)->first();
        return view('Admin.Mahasiswa.Update', compact('Accounts'), ['Title' => 'Update']);
    }
    public function updateAccount(Request $request, Account $id)
    {
        $updateAccount = $request->validate([
            "nim" => "required|min:11|max:11",
            "password" => "required",
            "nama_depan" => "required",
            "nama_belakang" => "required",
        ]);

        $updateAccount = Account::find($id)->first();
        $updateAccount->nim = $request->nim;
        $updateAccount->nama_depan = $request->nama_depan;
        $updateAccount->nama_belakang = $request->nama_belakang;
        $updateAccount->password = Hash::make($request->password);
        $updateAccount->save();

        return redirect('/Admin/Mahasiswa')->with('Berhasil', 'Data Berhasil Diperbarui');
    }
    public function deleteAccount(Account $id)
    {
        $Accounts = Account::find($id)->first();
        $Accounts->delete();
        return back()->with('Berhasil', 'Data Berhasil Dihapus');
    }

    // Perkuliahan
    public function storeCourse(Request $request)
    {
        $storeCourse = $request->validate([
            "matakuliah" => "required",
            "semester" => "required",
            "dosen" => "required",
            "hari" => "required",
        ]);

        $storeCourse = new Course;
        $storeCourse->matakuliah = $request->matakuliah;
        $storeCourse->semester = $request->semester;
        $storeCourse->dosen = $request->dosen;
        $storeCourse->hari = $request->hari;
        $storeCourse->save();

        if ($storeCourse) {
            return redirect('/Admin/Perkuliahan')->with('Berhasil', 'Data Berhasil Disimpan');
        }
    }
    public function readCourse()
    {
        $Courses = Course::all();
        return view('Admin.Perkuliahan.Index', compact('Courses'), ['Title' => 'Perkuliahan']);
    }
    public function detailCourse(Course $id)
    {
        $Courses = Course::find($id)->first();
        return view('Admin.Perkuliahan.Update', compact('Courses'), ['Title' => 'Update']);
    }
    public function updateCourse(Request $request, Course $id)
    {
        $updateCourse = $request->validate([
            "matakuliah" => "required",
            "semester" => "required",
            "dosen" => "required",
            "hari" => "required",
        ]);

        $updateCourse = Course::find($id)->first();
        $updateCourse->matakuliah = $request->matakuliah;
        $updateCourse->semester = $request->semester;
        $updateCourse->dosen = $request->dosen;
        $updateCourse->hari = $request->hari;
        $updateCourse->save();

        return redirect('/Admin/Perkuliahan')->with('Berhasil', 'Data Berhasil Diperbarui');
    }
    public function deleteCourse(Course $id)
    {
        $Courses = Course::find($id)->first();
        $Courses->delete();
        return back()->with('Berhasil', 'Data Berhasil Dihapus');
    }

    // Transkrip
    public function storeGrades(Request $request)
    {
        $storeGrades = $request->validate([
            "account_id" => "required",
            "course_id" => "required",
            "indeks" => "required",
            "nilai" => "required",
            "sks" => "required",
        ]);

        $storeGrades = new Grades;
        $storeGrades->account_id = $request->account_id;
        $storeGrades->course_id = $request->course_id;
        $storeGrades->indeks = $request->indeks;
        $storeGrades->nilai = $request->nilai;
        $storeGrades->sks = $request->sks;
        $storeGrades->save();

        return redirect('/Admin/Transkrip')->with('Berhasil', 'Data Berhasil Diperbarui');
    }
    public function readGrades()
    {
        $Grades = Grades::all();
        $Courses = Course::all();
        $Accounts = Account::all();
        return view('Admin.Transkrip.Index', compact('Grades', 'Courses', 'Accounts'), ['Title' => 'Transkrip Nilai']);
    }
    public function detailGrades(Grades $Grades)
    {
        $Courses = Course::all();
        $Accounts = Account::all();
        return view('Admin.Transkrip.Update', compact('Grades', 'Courses', 'Accounts'), ['Title' => 'Update']);
    }
    public function updateGrades(Request $request, Grades $Grades)
    {
        // This Function Use Route Model Binding For Assigments

        $request->validate([
            "account_id" => "required",
            "course_id" => "required",
            "indeks" => "required",
            "nilai" => "required",
            "sks" => "required",
        ]);

        $Grades -> account_id = $request->account_id;
        $Grades -> course_id = $request->course_id;
        $Grades -> indeks = $request->indeks;
        $Grades -> nilai = $request->nilai;
        $Grades -> sks = $request->sks;
        $Grades -> save();

        return redirect('/Admin/Transkrip')->with('Berhasil', 'Data Berhasil Diperbarui');
    }
    public function deleteGrades(Grades $id)
    {
        $Grades = Grades::find($id)->first();
        $Grades->delete();
        return back()->with('Berhasil', 'Data Berhasil Dihapus');
    }

    // Pembayaran
    public function readPayment()
    {
        $Payments = Payment::all();
        return view('Admin.Mahasiswa.Index', compact('Accounts'), ['Title' => 'Mahasiswa']);
    }
}
