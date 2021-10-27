<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DataMahasiswa;
use App\Models\Student;

class DataMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('DataMahasiswa.DataMahasiswa', [
            'data_mahasiswas' => DataMahasiswa::all(),
            'students' => Student::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('DataMahasiswa.CreateDataMahasiswa', [
            'data_mahasiswas' => DataMahasiswa::all(),
            'students' => Student::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = new DataMahasiswa();
        $store -> TempatLahir = $request->TempatLahir;
        $store -> TanggalLahir = $request->TanggalLahir;
        $store -> JalurPenerimaan = $request->JalurPenerimaan;
        $store ->save();
        return redirect()->intended('/DataMahasiswa')->with('Berhasil', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $store = Student::find($id);
        // $store -> TempatLahir = $request->TempatLahir;
        // $store -> TanggalLahir = $request->TanggalLahir;
        // $store -> JalurPenerimaan = $request->JalurPenerimaan;
        // $store ->save();
        // return redirect()->intended('/DataMahasiswa')->with('Berhasil', 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
