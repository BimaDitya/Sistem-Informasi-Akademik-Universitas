@extends('Admin.MainAdmin')
@section('Contents')
{{-- Tab --}}
<ul class="nav nav-tabs nav-fill" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
            type="button" role="tab" aria-controls="pills-home" aria-selected="true">Daftar Mahasiswa</button>
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
        <table class="table table-bordered">
            <thead>
                <tr class="table-secondary text-center">
                    <th>Nomor Induk Mahasiswa</th>
                    <th>Nama Depan</th>
                    <th>Nama Belakang</th>
                    <th style="width: 10REM">Perintah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Accounts as $Item)
                <tr class="table-light text-center align-middle">
                    <td>{{ $Item->nim}}</td>
                    <td>{{ $Item->nama_depan }}</td>
                    <td>{{ $Item->nama_belakang }}</td>
                    <td>
                        <div class="row justify-content-center">
                            <div class="col">
                                <a href="/Admin/Mahasiswa/{{ $Item->id }}" class="btn btn-warning text-decoration-none">
                                    <i class="ph-pencil-simple align-middle"></i>
                                </a>
                            </div>
                            <form action="/Admin/Mahasiswa/Hapus/{{ $Item->id }}" class="col" method="POST">
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
                Data Mahasiswa
            </div>
            <div class="card-body shadow-sm">
                <form method="POST" action="/Admin/Mahasiswa/">
                    @csrf
                    <div class="mb-2">
                        <label for="Nama" class="col-sm-4 col-form-label text-start">Nomor Induk
                            Mahasiswa</label>
                        <input type="number" name="nim" class="form-control" id="nim" placeholder="Contoh: 12345678900">
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <label for="Nama" class="col-sm-6 col-form-label text-start">Nama Depan</label>
                            <input type="text" name="nama_depan" class="form-control" placeholder="Nama Depan"
                                aria-label="Nama Depan">
                        </div>
                        <div class="col">
                            <label for="Nama" class="col-sm-6 col-form-label text-start">Nama Belakang </label>
                            <input type="text" name="nama_belakang" class="form-control" placeholder="Nama Belakang"
                                aria-label="Nama Belakang Mahasiswa">
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="Nama" class="col-sm-4 col-form-label text-start">Pasword</label>
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Min. 8 Digit">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                    <input class="btn btn-secondary" type="reset" value="Kosongkan">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection