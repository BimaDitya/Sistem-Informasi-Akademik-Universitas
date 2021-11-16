@extends('Student.MainStudent')
@section('Contents')
    {{-- Content --}}
        <div class="container-fluid p-4">
            {{-- Data Mahasiswa --}}
            <div class="card p-2">
                <table class="table table-sm table-hover table-bordered border-primary shadow-sm">
                    <tr class="table-primary text-center">
                        <th>Kode</th>
                        <th>Nama Matakuliah</th>
                        <th>Dosen Pengampu</th>
                        <th>Kelas</th>
                        <th>Hari/Tanggal</th>
                        <th>Ruang</th>
                    </tr>
                    <tr class="table-light text-center align-middle">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
        {{-- Content --}}
@endsection