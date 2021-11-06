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
    
    <!-- Custom Styles -->
    <link href="Style/MyStyle.css" rel="stylesheet">

    {{-- Icons --}}
    <script src="https://unpkg.com/phosphor-icons"></script>
  </head>

  <body class="text-center">
    <nav class="navbar navbar-expand navbar-dark shadow-sm" style="background-color: #3399FF">
      <div class="container">
        <a class="navbar-brand">Selamat Datang, {{ auth()->user()->nama_depan }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="/Mahasiswa/Detail/">Data Mahasiswa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/Admin/MataKuliah">Mata Kuliah & Jadwal</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/Admin/KRS">Kartu Rencana Studi</a>
            </li>
          </ul>
          {{-- Content --}}
          
          {{-- Content --}}
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
  </body>
</html>
