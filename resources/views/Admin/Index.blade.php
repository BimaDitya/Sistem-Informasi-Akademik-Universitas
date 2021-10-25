<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>SINIKAD | {{ $Title }} Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- Custom Style -->
    <link href="Style/MyStyle.css" rel="stylesheet">

    {{-- Icon --}}
    <script src="https://unpkg.com/phosphor-icons"></script>
  </head>

  <body>
    {{-- Navbar --}}
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
                <a class="nav-link" href="#">Logout</a>
              </li>
            </ul>
          </span>
        </div>
      </div>
    </nav>
    {{-- Navbar --}}
    {{-- Content --}}
    <div class="container my-2">
      {{-- Tab --}}
      <ul class="nav nav-pills mb-2" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Daftar Mahasiswa</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Tambah Data</button>
        </li>
      </ul>
      {{-- Tab --}}
      {{-- Content --}}
      <div class="tab-content" id="pills-tabContent">
        {{-- Data Mahasiswa --}}
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
          <table class="table table-sm table-hover table-bordered border-primary shadow-sm">
            <tr class="table-primary text-center">
              <th>Nomor Induk Mahasiswa</th>
              <th>Nama Depan</th>
              <th>Nama Belakang</th>
              <th>Jenis Kelamin</th>
              <th>Agama</th>
              <th>Perintah</th>
            </tr>
            @foreach ($Mhs as $Mhs)
            <tr class="table-light text-center align-middle">
              <td>{{ $Mhs->nim}}</td>
              <td>{{ $Mhs->nama_depan }}</td>
              <td>{{ $Mhs->nama_belakang }}</td>
              <td>{{ $Mhs->jenis_kelamin }}</td>
              <td>{{ $Mhs->agama }}</td>
              <td>
                <div class="row justify-content-center">
                  <div class="col-4">
                    <a href="/Admin/{{ $Mhs->id }}" class="btn btn-info btn-lg text-decoration-none">
                      <i class="ph-pencil-simple align-middle"></i>
                    </a>
                  </div>
                    <form action="/Admin/{{ $Mhs->id }}/Hapus" class="col-4" method="POST">
                      @method('DELETE')
                      @csrf
                      <button class="btn btn-danger btn-lg" onclick="return confirm('Anda Yakin Menghapus Data?')">
                        <i class="ph-eraser-light align-middle"></i>
                      </button>
                    </form>
                </div>
              </td>
            </tr>
            @endforeach
          </table>
          @if (session('Berhasil'))
            <div class="alert alert-success alert-dismissible fade show my-2" role="alert">
              {{ session('Berhasil') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
        </div>
        {{-- Tambah Data --}}
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
          <div class="card">
            <div class="card-header text-center">
              Tambah Data Mahasiswa
            </div>
            <div class="card-body shadow-sm">
              <form method="POST" action="/Admin">
                @csrf
                  <div class="mb-2">
                    <input type="number" name="nim" class="form-control" id="nim" placeholder="Nomor Induk Mahasiswa">
                  </div>
                  <div class="row mb-2">
                    <div class="col">
                      <input type="text" name="nama_depan" class="form-control" placeholder="Nama Depan" aria-label="Nama Depan Mahasiswa">
                    </div>
                    <div class="col">
                      <input type="text" name="nama_belakang" class="form-control" placeholder="Nama Belakang" aria-label="Nama Belakang Mahasiswa">
                    </div>
                  </div>
                  <select name="jenis_kelamin" class="form-select form-control-lg mb-2" aria-label="Jenis Kelamin">
                    <option selected>Jenis Kelamin Mahasiswa:</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                  <select name="agama" class="form-select mb-2" aria-label="Agama">
                    <option selected>Agama Mahasiswa:</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Nasrani">Nasrani</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                  </select>
                  <div class="mb-2">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                  </div>
                  <button type="submit" class="btn btn-primary">Tambahkan Data</button>
                  <input class="btn btn-secondary" type="reset" value="Kosongkan">
              </form>
            </div>
          </div>
        </div>
      </div>
      {{-- Content --}}
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
  </body>
</html>
