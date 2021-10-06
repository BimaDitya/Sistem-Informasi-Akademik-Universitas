<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function authenticate (Request $request)
    {
        $credentials = $request->validate([
            'nim' => ['required', 'max:11', 'min:11'],
            'password' => ['required'],
        ]);
        
        if (Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->intended('/beranda');
        }
        return back()->with('ErrorLogin', 'Login Gagal!');
    }
}
