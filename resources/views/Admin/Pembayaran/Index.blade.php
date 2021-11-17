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
                    <th>Tahun Ajaran</th>
                    <th>Nominal</th>
                    <th>Status</th>
                    <th style="width: 10REM">Perintah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Payments as $Item)
                <tr class="table-light text-center align-middle">
                    <td>{{ $Item->account->nim ?? '' }}</td>
                    <td>{{ $Item->tahun ?? ''}}</td>
                    <td>Rp. {{ number_format($Item->nominal, 0, ".", ".") ?? ''}}</td>
                    <td>{{ $Item->status ?? ''}}</td>
                    <td>
                        <div class="row justify-content-center">
                            <div class="col">
                                <a href="/Admin/Pembayaran/{{ $Item->id }}" class="btn btn-warning text-decoration-none">
                                    <i class="ph-pencil-simple align-middle"></i>
                                </a>
                            </div>
                            <form action="/Admin/Pembayaran/Hapus/{{ $Item->id }}" class="col" method="POST">
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
                        Data Pembayaran UKT
                    </div>
                    <div class="card-body shadow-sm">
                        <form method="POST" action="/Admin/Pembayaran/">
                            @csrf
                            <div class="mb-1">
                                <label for="account_id" class="col-sm-4 col-form-label text-start">Nomor Induk
                                    Mahasiswa</label>
                                <select class="form-select" name="account_id">
                                    <option value="">Pilih Nomor Induk Mahasiswa</option>
                                    @foreach ($Accounts as $Item)
                                        <option value="{{ $Item->id }}" {{ old('account_id') == $Item->id ? 'selected' : null}}>{{ $Item->no_id }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="tahun" class="col-sm-4 col-form-label text-start">Tahun Ajaran</label>
                                <input type="text" name="tahun" class="form-control" id="tahun" placeholder="Contoh: 2019/2020 Gasal" value="{{ old('tahun') }}">
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="nominal" class="col-lg-4 col-form-label text-start">Tentukan Nominal UKT</label>
                                    <select class="form-select" name="nominal">
                                        <option value="">Tentukan Nominal</option>
                                        <option value="500000" {{ old('nominal') == "500000;" ? 'selected' : null}}>Rp. 500.000</option>
                                        <option value="1000000" {{ old('nominal') == "1000000" ? 'selected' : null}}>Rp. 1.000.000</option>
                                        <option value="2400000" {{ old('nominal') == "2400000" ? 'selected' : null}}>Rp. 2.400.000</option>
                                        <option value="3800000" {{ old('nominal') == "3800000" ? 'selected' : null}}>Rp. 3.800.000</option>
                                        <option value="5200000" {{ old('nominal') == "5200000" ? 'selected' : null}}>Rp. 5.200.000</option>
                                        <option value="6500000" {{ old('nominal') == "6500000" ? 'selected' : null}}>Rp. 6.500.000</option>
                                        <option value="7900000" {{ old('nominal') == "7900000" ? 'selected' : null}}>Rp. 7.900.000</option>
                                        <option value="9300000" {{ old('nominal') == "9300000" ? 'selected' : null}}>Rp. 9.300.000</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="status" class="col-lg-4 col-form-label text-start">Status Pembayaran</label>
                                    <select class="form-select" name="status">
                                        <option value="">Tentukan Status Pembayaran</option>
                                        <option value="L" {{ old('status') == "Lunas" ? 'selected' : null}}>Lunas</option>
                                        <option value="BL" {{ old('status') == "Belum Lunas" ? 'selected' : null}}>Belum Lunas</option>
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