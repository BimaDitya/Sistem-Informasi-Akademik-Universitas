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
    
    <!-- Custom styles for this template -->
    <link href="Style/MyStyle.css" rel="stylesheet">
  </head>

  <body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="#">Selamat Datang, </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="#">Data Mahasiswa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Mata Kuliah & Jadwal</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Kartu Rencana Studi</a>
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
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
        </li>
      </ul>
      {{-- Tab --}}
      {{-- Content --}}
      <div class="tab-content" id="pills-tabContent">
        {{-- Data Mahasiswa --}}
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
          <table class="table table-sm table-hover table-bordered border-primary">
            <tr class="table-primary text-center">
              <th>Nama Depan</th>
              <th>Nama Belakang</th>
              <th>Jenis Kelamin</th>
              <th>Agama</th>
              <th>Alamat</th>
              <th>Nomor Induk Mahasiswa</th>
            </tr>
            @foreach ($Mahasiswa as $Mhs)
            <tr class="table-light text-center">
              <td>{{ $Mhs->nama_depan }}</td>
              <td>{{ $Mhs->nama_belakang }}</td>
              <td>{{ $Mhs->jenis_kelamin }}</td>
              <td>{{ $Mhs->agama }}</td>
              <td>{{ $Mhs->alamat }}</td>
              <td>{{ $Mhs->nim}}</td>
            </tr>
            @endforeach
          </table>
        </div>
        {{-- Tambah Data --}}
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
          <form method="POST" action="/Admin">
            @csrf
              <div class="form-floating mb-1">
                <input type="number" name="nim" class="form-control" id="nim" placeholder="Nomor Induk Mahasiswa">
                <label for="nim">Nomor Induk Mahasiswa</label>
              </div>
              <div class="form-floating mb-1">
                <input type="text" name="nama_depan" class="form-control" id="nama_depan" placeholder="Nama Depan Mahasiswa">
                <label for="nama_depan">Nama Depan</label>
              </div>
              <div class="form-floating mb-1">
                <input type="text" name="nama_belakang" class="form-control" id="nama_belakang" placeholder="Nama Belakang Mahasiswa">
                <label for="nama_belakang">Nama Belakang</label>
              </div>
              <select name="jenis_kelamin" class="form-select mb-1" aria-label="Jenis Kelamin">
                <option selected>Jenis Kelamin Anda:</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
              <select name="agama" class="form-select mb-1" aria-label="Agama">
                <option selected>Agama Yang Anda Ikuti:</option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Nasrani">Nasrani</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
              </select>
              <div class="form-floating mb-1">
                <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat Mahasiswa">
                <label for="alamat">Alamat</label>
              </div>
              <div class="form-floating mb-2">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
              </div>
              <button type="submit" class="btn btn-primary">Tambahkan Data</button>
              <input class="btn btn-secondary" type="reset" value="Kosongkan">
          </form>
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
      </div>
      {{-- Content --}}
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
  </body>
</html>
