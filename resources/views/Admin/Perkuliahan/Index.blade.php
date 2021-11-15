@extends('Admin.MainAdmin')
@section('Contents')
{{-- Tab --}}
<ul class="nav nav-tabs nav-fill" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
            type="button" role="tab" aria-controls="pills-home" aria-selected="true">Daftar Perkuliahan</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
            type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Tambah Data</button>
    </li>
</ul>
{{-- Tab --}}

{{-- Content --}}
<div class="tab-content" id="pills-tabContent">
    {{-- Data Mahasiswa --}}
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <table class="table table-bordered shadow" id="sortTable">
            <thead>
                <tr class="table-secondary text-center">
                    <th>Matakuliah</th>
                    <th>Semester</th>
                    <th>Dosen</th>
                    <th>Hari</th>
                    <th style="width: 10REM">Perintah</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Courses as $Item)
                <tr class="table-light text-center align-middle">
                    <td>{{ $Item->matakuliah }}</td>
                    <td>{{ $Item->semester }}</td>
                    <td>{{ $Item->dosen }}</td>
                    <td>{{ $Item->hari }}</td>
                    <td>
                        <div class="row justify-content-center">
                            <div class="col">
                                <a href="/Admin/Perkuliahan/{{ $Item->id }}"
                                    class="btn btn-warning text-decoration-none">
                                    <i class="ph-pencil-simple align-middle"></i>
                                </a>
                            </div>
                            <form action="/Admin/Perkuliahan/Hapus/{{ $Item->id }}" class="col" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Anda Yakin Menghapus Data?')">
                                    <i class="ph-trash-simple align-middle"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if (session()->has('Berhasil'))
        <div class="alert alert-success alert-dismissible fade show my-2" role="alert">
            {{ session('Berhasil') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show my-2" role="alert">
            Gagal Menyimpan Data
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>
    {{-- Tambah Data --}}
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        {{-- Personal Data --}}
        <div class="card">
            <div class="card-header text-center highlight-font fw-bold">
                Data Perkuliahan
            </div>
            <div class="card-body shadow-sm">
                <form method="POST" action="/Admin/Perkuliahan/">
                    @csrf
                    <div class="mb-2">
                        <label for="Nama" class="col-sm-4 col-form-label text-start">Semester</label>
                        <input class="form-control" name="semester" list="datalistSemester" id="exampleDataList"
                            placeholder="Semester...">
                        <datalist id="datalistSemester">
                            <option value="Semester 1">
                            <option value="Semester 2">
                            <option value="Semester 3">
                            <option value="Semester 4">
                            <option value="Semester 5">
                            <option value="Semester 6">
                            <option value="Semester 7">
                            <option value="Semester 8">
                        </datalist>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <label for="Nama" class="col-sm-6 col-form-label text-start">Matakuliah</label>
                            <input type="text" name="matakuliah" class="form-control" placeholder="Nama Matakuliah"
                                aria-label="Nama Matakuliah">
                        </div>
                        <div class="col">
                            <label for="Nama" class="col-sm-6 col-form-label text-start">Dosen</label>
                            <input type="text" name="dosen" class="form-control" placeholder="Nama Dosen"
                                aria-label="Nama Dosen">
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="Nama" class="col-sm-4 col-form-label text-start">Hari</label>
                        <input class="form-control" name="hari" list="datalistDay" id="exampleDataList"
                            placeholder="Hari...">
                        <datalist id="datalistDay">
                            <option value="Senin">
                            <option value="Selasa">
                            <option value="Rabu">
                            <option value="Kamis">
                            <option value="Jumat">
                        </datalist>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                    <button class="btn btn-secondary" type="reset">Kosongkan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection