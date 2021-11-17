<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    
    public function index() {

        return view('Login.Index', ['Title' => 'Login']);
    }

    public function authAccount(Request $request, Account $Account) {

        $input = $request->all();
   
        $this->validate($request, [
            'no_id' => 'required|',
            'password' => 'required',
        ]);
   
        if(Auth::attempt(array('no_id' => $input['no_id'], 'password' => $input['password'])))
        {
            if (auth()->user()->role == 'Admin') {
                return redirect('/Admin/Mahasiswa/');
            } else {
                return redirect('/Beranda');
            }
        }else{
            return redirect()->route('login')
                ->with('Gagal','Login Gagal Periksa Kembali');
        }
    }

    public function logoutAccount(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
