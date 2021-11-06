<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function create()
    {
        return view('Admin.Index', ['Title' => 'Admin']);
    }
    
    public function storeAccount(Request $request)
    {
        $storeAccount = $request->validate([
            'nim' => 'required|min:11|max:11',
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'password' => 'required|min:8|max:255',
        ]);

        $storeAccount['password'] = Hash::make($storeAccount['password']);

        Account::create($storeAccount);

        return redirect('/Admin')->with('Berhasil', 'Data Berhasil Disimpan');
    }

    public function index() 
    {
        $Mhs = Account::all();
        return view('Admin.Index', ['Title' => 'Admin', 'Mhs' => $Mhs]);
    }

    public function detail($id)
    {
        $Mhs = Account::find($id);
        return view('Beranda.Update', ['Title' => 'Update', 'Mhs' => $Mhs]);
    }

    public function updateAccount(Request $request, $id)
    {
        $store = Account::find($id);
        $store -> nim = $request->nim;
        $store -> nama_depan = $request->nama_depan;
        $store -> nama_belakang = $request->nama_belakang;
        $store -> password = Hash::make($request->password);
        $store ->save();
        
        return redirect('/Admin')->with('Berhasil', 'Data Berhasil Diperbarui');
    }

    public function delete($id)
    {
        $Mhs = Account::find($id);
        $Mhs->delete();
        return redirect('/Admin')->with('Berhasil', 'Data Berhasil Dihapus');
    }
}
