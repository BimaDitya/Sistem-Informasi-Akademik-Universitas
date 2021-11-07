<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/Style/Mystyle.css">
    <title>SINIKAD | {{ $Title }}</title>
</head>

<body>
    {{-- Navbar --}}
    <header>
        <nav class="navbar navbar-expand navbar-dark shadow-sm" style="background-color: #3399FF">
            <div class="container">
                <a class="navbar-brand">Selamat Datang, {{ auth()->user()->nama_depan }}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/Admin">Data Mahasiswa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/Admin/MataKuliah">Mata Kuliah & Jadwal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/Admin/KRS">Kartu Rencana Studi</a>
                        </li>
                    </ul>
                    <span class="navbar-text">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <form action="/Logout" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-light fw-bold"><i
                                            class="ph-arrow-bend-down-right-bold align-middle pe-3"></i>Logout</button>
                                </form>
                            </li>
                        </ul>
                    </span>
                </div>
            </div>
        </nav>
    </header>

    {{-- Content --}}
    <main>
        <!--Biodata Mahasiswa-->
        <div class="row h-100 justify-content-center py-4 px-2">
            {{-- Notify --}}
            @if (session('Berhasil'))
            <div class="alert alert-success alert-dismissible fade show col-7" role="alert">
                {{ session('Berhasil') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            {{-- Biodata Mahasiswa --}}
            <div class="col-7">
                <div class="card shadow-sm">
                    <div class="card-header text-center">
                        Biodata Mahasiswa
                    </div>
                    <div class="card-body">
                        <label for="Nama" class="col-sm-4 col-form-label text-start">Nama Mahasiswa</label>
                        <div class="input-group">
                            <input type="text" name="nama_depan" aria-label="Nama Depan" class="form-control"
                                value="{{ auth()->user()->nama_depan }}" disabled readonly>
                            <input type="text" name="nama_belakang" aria-label="Nama Belakang" class="form-control"
                                value="{{ auth()->user()->nama_belakang }}" disabled readonly>
                        </div>
                        <label for="NIM" class="col-sm-4 col-form-label text-start">NIM</label>
                        <div class="input-group">
                            <input type="number" name="nim" aria-label="Nomor Induk Mahasiswa" class="form-control"
                                value="{{ auth()->user()->nim }}" disabled readonly>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/Mahasiswa/Store/Biodata" method="POST">
                            @csrf
                            {{-- Input --}}
                            <label for="Nama" class="col-sm-4 col-form-label text-start">Tempat & Tgl. Lahir</label>
                            <div class="input-group">
                                <input type="text" name="tempat_lahir" aria-label="Tempat Lahir" class="form-control"
                                    value="{{ $Data->student->tempat_lahir ?? '' }}" placeholder="Contoh: Kebon Jeruk">
                                <input type="date" name="tanggal_lahir" aria-label="Tanggal Lahir" class="form-control"
                                    value="{{ $Data->student->tanggal_lahir ?? '' }}">
                            </div>
                            <label for="Jenis Kelamin" class="col-sm-4 col-form-label text-start">Jenis Kelamin</label>
                            <div class="input-group">
                                <select name="jenis_kelamin" class="form-select form-control-lg"
                                    aria-label="Jenis Kelamin">
                                    <option selected>{{ $Data->student->jenis_kelamin ?? '' }}</option>
                                    <option value="Laki-Laki">Laki-Laki
                                    </option>
                                    <option value="Perempuan">Perempuan
                                    </option>
                                </select>
                            </div>
                            <label for="Agama" class="col-sm-4 col-form-label text-start">Agama</label>
                            <div class="input-group">
                                <select name="agama" class="form-select mb-1" aria-label="Agama">
                                    <option selected>{{ $Data->student->agama ?? '' }}</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Nasrani">Nasrani</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                </select>
                            </div>
                            <label for="Jalur Penerimaan" class="col-sm-4 col-form-label text-start">Jalur
                                Penerimaan</label>
                            <div class="input-group">
                                <select name="jalur_penerimaan" class="form-select mb-1" aria-label="Agama">
                                    <option selected>{{ $Data->student->jalur_penerimaan ?? '' }}</option>
                                    <option value="SNMPTN">SNMPTN</option>
                                    <option value="SBMPTN">SBMPTN</option>
                                    <option value="Mandiri">Mandiri</option>
                                </select>
                            </div>
                            @if ($Data->student == "")
                            <div>
                                <button type="submit" class="btn btn-success my-2 col-2">Simpan</button>
                                <a href="/Mahasiswa/Update/Biodata"
                                    class="btn btn-secondary my-4 col-2 disabled">Update</a>
                            </div>
                            @else
                            <div>
                                <button type="submit" class="btn btn-secondary my-2 col-2 disabled">Simpan</button>
                                <a href="/Mahasiswa/Update/Biodata" class="btn btn-primary my-4 col-2">Update</a>
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>

            <!--Edit Alamat-->
            <div class="col-7 mt-2">
                <div class="card shadow-sm">
                    <form action="/Mahasiswa/Store/Alamat" method="POST">
                        @csrf
                        <div class="card-header text-center">
                            Alamat Mahasiswa
                        </div>
                        {{-- Alamat Mahasiswa --}}
                        <div class="card-body">
                            <label for="Jalan" class="col-sm-2 col-form-label text-start">Jalan</label>
                            <div class="input-group">
                                <input type="text" name="jalan" aria-label="Jalan" class="form-control"
                                    value="{{ $Data->address->jalan ?? '' }}"
                                    placeholder="Contoh: Jl. Kehormatan Blok A No.19 RT.02 RW.08">
                            </div>
                            <label for="Kecamatan" class="col-sm-2 col-form-label text-start">Kecamatan</label>
                            <div class="input-group">
                                <input type="text" name="kecamatan" aria-label="Kecamatan" class="form-control"
                                    value="{{ $Data->address->kecamatan ?? '' }}" placeholder="Contoh: Duri Kepa">
                            </div>
                            <label for="Kabupaten" class="col-sm-2 col-form-label text-start">Kabupaten</label>
                            <div class="input-group">
                                <input type="text" name="kabupaten" aria-label="Kabupaten/Kota" class="form-control"
                                    value="{{ $Data->address->kabupaten ?? '' }}" placeholder="Contoh: Kebon Jeruk">
                            </div>
                            <label for="Provinsi" class="col-sm-2 col-form-label text-start">Provinsi</label>
                            <div class="input-group">
                                <input type="text" name="provinsi" aria-label="Provinsi" class="form-control"
                                    value="{{ $Data->address->provinsi ?? '' }}" placeholder="Contoh: Jakarta Barat">
                            </div>
                            @if ($Data->address == "")
                            <div>
                                <button type="submit" class="btn btn-success my-2 col-2">Simpan</button>
                                <a href="/Mahasiswa/Update/Sekolah"
                                    class="btn btn-secondary my-4 col-2 disabled">Update</a>
                            </div>
                            @else
                            <div>
                                <button type="submit" class="btn btn-secondary my-2 col-2 disabled">Simpan</button>
                                <a href="/Mahasiswa/Update/Sekolah" class="btn btn-primary my-4 col-2">Update</a>
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            {{-- Asal Sekolah --}}
            <div class="col-7 mt-2">
                <div class="card shadow-sm">
                    <form action="/Mahasiswa/Store/Sekolah" method="POST">
                        @csrf
                        <div class="card-header text-center">
                            Asal Sekolah Mahasiswa
                        </div>
                        {{-- Sekolah Mahasiswa --}}
                        <div class="card-body">
                            <label for="Kecamatan" class="col-sm-2 col-form-label text-start">Kecamatan</label>
                            <div class="input-group">
                                <input type="text" name="kecamatan" aria-label="Kecamatan" class="form-control"
                                    value="{{ $Data->school->kecamatan ?? '' }}" placeholder="Contoh: Duri Kepa">
                            </div>
                            <label for="Kabupaten" class="col-sm-2 col-form-label text-start">Kabupaten</label>
                            <div class="input-group">
                                <input type="text" name="kabupaten" aria-label="Kabupaten" class="form-control"
                                    value="{{ $Data->school->kabupaten ?? '' }}" placeholder="Contoh: Kebon Jeruk">
                            </div>
                            <label for="Provinsi" class="col-sm-2 col-form-label text-start">Provinsi</label>
                            <div class="input-group">
                                <input type="text" name="provinsi" aria-label="Provinsi" class="form-control"
                                    value="{{ $Data->school->provinsi ?? '' }}" placeholder="Contoh: Jawa Barat">
                            </div>
                            <label for="Nama Sekolah" class="col-sm-2 col-form-label text-start">Nama Sekolah</label>
                            <div class="input-group">
                                <input type="text" name="sekolah" aria-label="Sekolah" class="form-control"
                                    value="{{ $Data->school->sekolah ?? '' }}" placeholder="Contoh: SMAN 01 Duri Kepa">
                            </div>
                            @if ($Data->school == "")
                            <div>
                                <button type="submit" class="btn btn-success my-2 col-2">Simpan</button>
                                <a href="/Mahasiswa/Update/Sekolah"
                                    class="btn btn-secondary my-4 col-2 disabled">Update</a>
                            </div>
                            @else
                            <div>
                                <button type="submit" class="btn btn-secondary my-2 col-2 disabled">Simpan</button>
                                <a href="/Mahasiswa/Update/Sekolah" class="btn btn-primary my-4 col-2">Update</a>
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            {{-- Identitas Orang Tua --}}
            <div class="col-7 mt-2">
                <div class="card shadow-sm">
                    <form action="/Mahasiswa/Store/OrangTua" method="POST">
                        @csrf
                        <div class="card-header text-center">
                            Identitas Orang Tua Mahasiswa
                        </div>
                        {{-- Alamat Mahasiswa --}}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-header text-center">
                                            Identitas Ibu
                                        </div>
                                        <div class="card-body">
                                            <label for="Nama" class="col-sm-6 col-form-label text-start">Nama</label>
                                            <div class="input-group">
                                                <input type="text" name="nama_ibu" aria-label="Nama" class="form-control"
                                                    value="{{ $Data->parent->nama_ibu ?? '' }}" placeholder="Contoh: Siti Aminah">
                                            </div>
                                            <label for="Tempat Lahir"
                                                class="col-sm-6 col-form-label text-start">Tempat Lahir</label>
                                            <div class="input-group">
                                                <input type="text" name="tempat_ibu" aria-label="Tempat Lahir"
                                                    class="form-control" value="{{ $Data->parent->tempat_ibu ?? '' }}" placeholder="Contoh: Kebon Jeruk">
                                            </div>
                                            <label for="Tanggal Lahir"
                                                class="col-sm-6 col-form-label text-start">Tanggal Lahir</label>
                                            <div class="input-group">
                                                <input type="date" name="tanggal_ibu" aria-label="Tanggal Lahir"
                                                    class="form-control" value="{{ $Data->parent->tanggal_ibu ?? '' }}" placeholder="Contoh: YYYY-MM-DD">
                                            </div>
                                            <label for="No. Telepon"
                                                class="col-sm-6 col-form-label text-start">No. Telepon</label>
                                            <div class="input-group">
                                                <input type="number" name="no_ibu" aria-label="No. Telepon"
                                                    class="form-control" value="{{ $Data->parent->no_ibu ?? '' }}" placeholder="Contoh: 0822-3072-XXXX">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-header text-center">
                                            Identitas Ayah
                                        </div>
                                        <div class="card-body">
                                            <label for="Nama" class="col-sm-6 col-form-label text-start">Nama</label>
                                            <div class="input-group">
                                                <input type="text" name="nama_ayah" aria-label="Nama" class="form-control"
                                                    value="{{ $Data->parent->nama_ayah ?? '' }}" placeholder="Contoh: Abdullah">
                                            </div>
                                            <label for="Tempat Lahir"
                                                class="col-sm-6 col-form-label text-start">Tempat Lahir</label>
                                            <div class="input-group">
                                                <input type="text" name="tempat_ayah" aria-label="Tempat Lahir"
                                                    class="form-control" value="{{ $Data->parent->tempat_ayah ?? '' }}" placeholder="Contoh: Kebon Jeruk">
                                            </div>
                                            <label for="Tanggal Lahir"
                                                class="col-sm-6 col-form-label text-start">Tanggal Lahir</label>
                                            <div class="input-group">
                                                <input type="date" name="tanggal_ayah" aria-label="Tanggal Lahir"
                                                    class="form-control" value="{{ $Data->parent->tanggal_ayah ?? '' }}" placeholder="Contoh: YYYY-MM-DD">
                                            </div>
                                            <label for="No. Telepon"
                                                class="col-sm-6 col-form-label text-start">No. Telepon</label>
                                            <div class="input-group">
                                                <input type="number" name="no_ayah" aria-label="No. Telepon"
                                                    class="form-control" value="{{ $Data->parent->no_ayah ?? '' }}" placeholder="Contoh: 0822-3072-XXXX">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if ($Data->parent == "")
                            <div>
                                <button type="submit" class="btn btn-success my-2 col-2">Simpan</button>
                                <a href="/Mahasiswa/Update/OrangTua"
                                    class="btn btn-secondary my-4 col-2 disabled">Update</a>
                            </div>
                            @else
                            <div>
                                <button type="submit" class="btn btn-secondary my-2 col-2 disabled">Simpan</button>
                                <a href="/Mahasiswa/Update/OrangTua" class="btn btn-primary my-4 col-2">Update</a>
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
</body>

</html>
