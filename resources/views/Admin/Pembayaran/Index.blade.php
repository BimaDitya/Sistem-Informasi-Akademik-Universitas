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
    {{-- Data Transkrip --}}
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <table class="table table-bordered">
            <thead>
                <tr class="table-secondary text-center">
                    <th>NIM</th>
                    <th>Matakuliah</th>
                    <th>SKS</th>
                    <th>Nilai</th>
                    <th>Indeks</th>
                    <th style="width: 10REM">Perintah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Grades as $Item)
                <tr class="table-light text-center align-middle">
                    <td>{{ $Item->account->nim ?? '' }}</td>
                    <td>{{ $Item->course->matakuliah ?? ''}}</td>
                    <td>{{ $Item->sks ?? ''}}</td>
                    <td>{{ $Item->nilai ?? ''}}</td>
                    <td>{{ $Item->indeks ?? ''}}</td>
                    <td>
                        <div class="row justify-content-center">
                            <div class="col">
                                <a href="/Admin/Transkrip/{{ $Item->id }}" class="btn btn-warning text-decoration-none">
                                    <i class="ph-pencil-simple align-middle"></i>
                                </a>
                            </div>
                            <form action="/Admin/Transkrip/Hapus/{{ $Item->id }}" class="col" method="POST">
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
        {{-- Grade Data --}}
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header text-center highlight-font fw-bold">
                        Data Transkrip Nilai
                    </div>
                    <div class="card-body shadow-sm">
                        <form method="POST" action="/Admin/Transkrip/">
                            @csrf
                            <div class="mb-1">
                                <label for="matakuliah" class="col-sm-4 col-form-label text-start">Nama
                                    Matakuliah</label>
                                <select class="form-select" name="course_id">
                                    <option value="">Pilih Matakuliah</option>
                                    @foreach ($Courses as $Item)
                                        <option value="{{ $Item->id }}" {{ old('course_id')  == $Item->id ? 'selected' : null}}>{{ $Item->matakuliah }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-1">
                                <label for="nim" class="col-sm-4 col-form-label text-start">Nomor Induk
                                    Mahasiswa</label>
                                <select class="form-select" name="account_id">
                                    <option value="">Pilih Nomor Induk Mahasiswa</option>
                                    @foreach ($Accounts as $Item)
                                        <option value="{{ $Item->id }}" {{ old('account_id') == $Item->id ? 'selected' : null}}>{{ $Item->nim }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="sks" class="col-sm-4 col-form-label text-start">Satuan Kredit
                                    Semester</label>
                                <input type="number" name="sks" class="form-control" id="sks" placeholder="Contoh: 3" value="{{ old('sks') }}">
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="nilai" class="col-lg-4 col-form-label text-start">Nilai
                                        Matakuliah</label>
                                    <select class="form-select" name="nilai">
                                        <option value="">Tentukan Nilai</option>
                                        <option value="A" {{ old('nilai') == "A" ? 'selected' : null}}>A</option>
                                        <option value="A-" {{ old('nilai') == "A-" ? 'selected' : null}}>A-</option>
                                        <option value="B+" {{ old('nilai') == "B+" ? 'selected' : null}}>B+</option>
                                        <option value="B" {{ old('nilai') == "B" ? 'selected' : null}}>B</option>
                                        <option value="B-" {{ old('nilai') == "B-" ? 'selected' : null}}>B-</option>
                                        <option value="C+" {{ old('nilai') == "C+" ? 'selected' : null}}>C+</option>
                                        <option value="C" {{ old('nilai') == "C" ? 'selected' : null}}>C</option>
                                        <option value="C-" {{ old('nilai') == "C-" ? 'selected' : null}}>C-</option>
                                        <option value="D" {{ old('nilai') == "D" ? 'selected' : null}}>D</option>
                                        <option value="E" {{ old('nilai') == "E" ? 'selected' : null}}>E</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="indeks" class="col-lg-4 col-form-label text-start">Indeks
                                        Matakuliah</label>
                                    <select class="form-select" name="indeks">
                                        <option value="">Tentukan Indeks</option>
                                        <option value="4.00">4.00</option>
                                        <option value="3.75">3.75</option>
                                        <option value="3.50">3.50</option>
                                        <option value="3.00">3.00</option>
                                        <option value="2.75">2.75</option>
                                        <option value="2.50">2.50</option>
                                        <option value="2.25">2.25</option>
                                        <option value="2.00">2.00</option>
                                        <option value="1.00">1.00</option>
                                        <option value="0">0</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                            <button class="btn btn-secondary" type="reset">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection