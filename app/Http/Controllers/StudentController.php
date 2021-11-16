<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function readHome(){
        $Accounts = Account::all();
        return view('Student.Beranda.Index', compact('Accounts'), ['Title' => 'Beranda']);
    }
}
