<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    
    public function index() {
        return view('Login.Index', ['Title' => 'Login']);
    }
    
    public function authenticate(Request $request) {

        $credentials = $request->validate([
            'nim' => ['required', 'max:11', 'min:11'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)) {
            $request->session();
            return redirect()->intended('/Beranda');
        }
        return back()->with('ErrorLogin', 'Login Gagal!');
    }
}
