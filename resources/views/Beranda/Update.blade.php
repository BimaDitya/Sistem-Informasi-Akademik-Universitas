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

    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
  </head>

  <body class="container my-3" style="background: linear-gradient(0deg, rgba(51,153,255,1) 0%, rgba(230,242,255,1) 100%); font-family: Nunito">
      {{-- Content --}}
    <div class="row h-100 justify-content-center py-4">
        <div class="col-6">
          <div class="card shadow-sm">
            <div class="card-header text-center">
              Ubah Data Mahasiswa
            </div>
            <div class="card-body">
              <a href="/Admin" class="btn btn-primary mb-3">Kembali</a>
              <form action="/Admin/{{ $Mhs->id }}/Update" method="POST">
                  @csrf
                    <div class="mb-1">
                      <input type="number" name="nim" class="form-control" id="nim" placeholder="Nomor Induk Mahasiswa">
                      <p class="text-muted">Data Sebelumnya: {{ $Mhs->nim }}</p>
                    </div>
                    <div class="row mb-1">
                      <div class="col">
                        <input type="text" name="nama_depan" class="form-control" placeholder="Nama Depan" aria-label="Nama Depan Mahasiswa">
                        <p class="text-muted">Data Sebelumnya: {{ $Mhs->nama_depan }}</p>
                      </div>
                      <div class="col">
                        <input type="text" name="nama_belakang" class="form-control" placeholder="Nama Belakang" aria-label="Nama Belakang Mahasiswa">
                        <p class="text-muted">Data Sebelumnya: {{ $Mhs->nama_belakang }}</p>
                      </div>
                    </div>
                    <select name="jenis_kelamin" class="form-select form-control-lg" aria-label="Jenis Kelamin" >
                      <option selected>Jenis Kelamin:</option>
                      <option value="Laki-Laki">Laki-Laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                    <p class="text-muted">Data Sebelumnya: {{ $Mhs->jenis_kelamin }}</p>
                    <select name="agama" class="form-select mb-1" aria-label="Agama">
                      <option selected>Agama:</option>
                      <option value="Islam">Islam</option>
                      <option value="Kristen">Kristen</option>
                      <option value="Nasrani">Nasrani</option>
                      <option value="Hindu">Hindu</option>
                      <option value="Budha">Budha</option>
                    </select>
                    <p class="text-muted">Data Sebelumnya: {{ $Mhs->agama }}</p>
                    <div class="mb-3">
                      <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
              </form>
            </div>
          </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
  </body>
</html>
