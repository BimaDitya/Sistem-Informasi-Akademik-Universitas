<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/style.css">
    <title>Data Mahasiswa</title>
</head>
<body>
    <header>
        <body class="text-center">
            <nav class="navbar navbar-expand navbar-dark shadow-sm" style="background-color: #3399FF">
              <div class="container">
                <a class="navbar-brand">Selamat Datang</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
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
                          <button type="submit" class="btn btn-light fw-bold"><i class="ph-arrow-bend-down-right-bold align-middle pe-3"></i>Logout</button>
                        </form>
                      </li>
                    </ul>
                  </span>
                </div>
              </div>
            </nav>
    </header>                                                               

    <main>
        <!--Biodata Mahasiswa-->
        <div id="Biodata" class="container border rounded-3">
            <div class="ms-3 me-3">
            <h1 class="text-center mb-3 mt-5 p-3 bg-info text-dark rounded-3">Biodata Mahasiswa</h1><br>
            @if (session('Berhasil'))
            <div class="alert alert-success alert-dismissible fade show my-2" role="alert">
              {{ session('Berhasil') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
            <form action="GET" method="{{url('/DataMahasiswa')}}" enctype="multipart/form-data">
                @csrf
                @foreach ($students as $data)
                    <div class="mb-3 row">
                        <label for="Nama" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                            <div class="col-sm-10">
                                <span class="input-group-text" id="basic-addon3">{{ $data->nama_depan}} {{$data->nama_belakang}}</span>
                            </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="Nama" class="col-sm-2 col-form-label">NIM</label>
                            <div class="col-sm-10">
                                <span class="input-group-text" id="basic-addon3">{{ $data->nim }}</span>
                            </div>
                    </div>
                @endforeach

                @foreach ($data_mahasiswas as $data)
                    <div class="mb-3 row">
                        <label for="TempatLahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-10">
                                <span class="input-group-text" id="basic-addon3">{{ $data->TempatLahir }}</span>
                            </div>
                    </div>
                    <div class="mb-3 row">
                            <label for="TanggalLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <span class="input-group-text" id="basic-addon3">{{ $data->TanggalLahir }}</span>
                            </div>
                    </div>
                    @endforeach
                    @foreach ($students as $data)
                    <div class="mb-3 row">
                        <label for="JenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <span class="input-group-text" id="basic-addon3">{{ $data->jenis_kelamin }}</span>
                            </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="Agama" class="col-sm-2 col-form-label">Agama</label>
                            <div class="col-sm-10">
                                <span class="input-group-text" id="basic-addon3">{{ $data->agama }}</span>
                            </div>
                    </div>
                    @endforeach
                    
                    {{-- <div class="mb-3 row">
                        <label for="formFile" class="col-sm-2 col-form-label">Upload Foto</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    </div> --}}
                    @foreach ($data_mahasiswas as $data)
                    <div class="mb-5 row">
                        <label for="JalurPenerimaan" class="col-sm-2 col-form-label">Jalur Penerimaan</label>
                            <div class="col-sm-10">
                                <span class="input-group-text" id="basic-addon3">{{ $data->JalurPenerimaan }}</span>
                            </div>
                    </div>
                    @endforeach
                    </div>
                    </div>
            </form>
                    <div class="text-center mt-5 mb-5">
                        <a href="/DataMahasiswa/CreateDataMahasiswa"><button class="btn btn-primary">Update Data</button></a>
                    </div>
        </div>
                
        
        {{-- <!--Edit Alamat-->
        <div id="Alamat" class="container border rounded-3 mt-5">
            <div class="ms-3 me-3">
            <br>
            <h1 class="text-center mb-3 mt-4 p-3 bg-info text-dark rounded-3">Edit Alamat</h1>
            <br>
            <!--Alamat Sekolah-->
            <div class="sekolah-asal">
                <h2 class="mb-3">Sekolah Asal</h2>
                <div class="mb-3 row">
                    <label for="prov" class="col-sm-2 col-form-label">Provinsi</label>
                    <div class="col-sm-10">
                        <select id="prov" name="id_provinsi" class="form-control" required>
                            <option value="" disabled selected>Pilih Provinsi</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="kab" class="col-sm-2 col-form-label">Kabupaten</label>
                    <div class="col-sm-10">
                        <select id="kab" name="id_kabamatan" class="form-control" required>
                            <option value="" disabled selected>Pilih Kabupaten</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="kec" class="col-sm-2 col-form-label">Kecamatan</label>
                    <div class="col-sm-10">
                        <select id="kec" name="id_kecamatan" class="form-control" required>
                            <option value="" disabled selected>Pilih Kecamatan</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama_sekolah" class="col-sm-2 col-form-label">Nama Sekolah</label>
                    <div class="col-sm-10">
                        <select id="nama_sekolah" name="id_nama_sekolah" class="form-control" required>
                            <option value="" disabled selected>Pilih Nama Sekolah</option>
                        </select>
                    </div>
                </div>
            </div>
            <!--Alamat Sekolah-->
            <div class="sekolah-asal">
                <h2 class="mb-3">Alamat Rumah</h2>
                <div class="d-flex flex-row bd-highlight mb-3">
                    <div class="col-md-3 mb-3 row">
                        <label for="inputnama" class="col-sm-2 col-form-label">Desa</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputnama" placeholder="Nama Lengkap">
                        </div></div>
                    <div class="col-md-3 mb-3 row ms-3">
                        <label for="inputnama" class="col-sm-4 col-form-label ">Dusun</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputnama" placeholder="Nama Lengkap">
                        </div></div>
                    <div class="col-md-3 mb-3 row ms-3">
                        <label for="inputnama" class="col-sm-2 col-form-label">Desa</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputnama" placeholder="Nama Lengkap">
                        </div></div>
                    <div class="col-md-3 mb-3 row ms-3">
                        <label for="inputnama" class="col-sm-2 col-form-label">Desa</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputnama" placeholder="Nama Lengkap">
                        </div></div>
                </div>
            </div>
        </div>
        </div>

        <div id="Orang-tua" class="container">
            <br>
            <h1 class="text-center mb-5 p-3 bg-info text-dark rounded-3">Edit Biodata Orang Tua</h1>
            <br>
        </div> --}}
    </main>
    <footer></footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>

