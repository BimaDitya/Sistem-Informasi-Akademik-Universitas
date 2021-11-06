<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    
    public function index() {

        return view('Login.Index', ['Title' => 'Login']);
    }
    
    public function authMahasiswa(Request $request) {

        $credentials = $request->validate([
            'nim' => ['required', 'max:11', 'min:11'],
            'password' => ['required', 'min:8']
        ]);

        if(Auth::attempt($credentials)) {
            $request->session();
            return redirect()->intended('/Beranda');
        }
        return back()->with('Gagal', 'Login Gagal, Periksa Kembali');
    }

    public function logoutMahasiswa(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
