<?php

namespace App\Http\Controllers;

use App\Models\Account;
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
        $storeAccount -> nim = $request->nim;
        $storeAccount -> nama_depan = $request->nama_depan;
        $storeAccount -> nama_belakang = $request->nama_belakang;
        $storeAccount -> password = Hash::make($request->password);
        $storeAccount ->save();

        if($storeAccount) {
            return redirect('/Admin')->with('Berhasil', 'Data Berhasil Disimpan');
        }
    }

    public function index() 
    {
        $Mhs = Account::all();
        return view('Admin.Index', ['Title' => 'Mahasiswa', 'Mhs' => $Mhs]);
    }

    public function detail(Account $id)
    {
        $Mhs = Account::find(count(array($id)));
        return view('Admin.Update', ['Title' => 'Update', 'Mhs' => $Mhs]);
    }

    public function updateAccount(Request $request, Account $id)
    {
        $updateAccount = $request->validate([
            "nim" => "required|min:11|max:11",
            "password" => "required",
            "nama_depan" => "required",
            "nama_belakang" => "required",
        ]);

        $updateAccount = Account::find(count(array($id)));
        $updateAccount -> nim = $request->nim;
        $updateAccount -> nama_depan = $request->nama_depan;
        $updateAccount -> nama_belakang = $request->nama_belakang;
        $updateAccount -> password = Hash::make($request->password);
        $updateAccount ->save();

        if ($updateAccount) {
            return redirect('/Admin') -> with('Berhasil', 'Data Berhasil Diperbarui');
        }
    }

    public function delete(Account $id)
    {
        $Mhs = Account::find($id);
        $Mhs->delete();
        return redirect('/Admin')->with('Berhasil', 'Data Berhasil Dihapus');
    }
}
