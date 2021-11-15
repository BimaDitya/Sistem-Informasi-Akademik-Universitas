<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Mahasiswa | {{ $Title }}</title>

  <!-- Bootstrap Core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- Custom Style -->
  <link href="{{ asset('Style/MyStyle.css') }}" rel="stylesheet">

  {{-- Icon --}}
  <script src="https://unpkg.com/phosphor-icons"></script>
</head>

<body>
  {{-- Navbar --}}
  <header>
    @include('Partials.Navbar')
  </header>
  {{-- Navbar --}}
  {{-- Content --}}
  <div class="container-fluid p-3">
    {{-- Tabel KRS --}}
    <div class="row">
      {{-- Kiri --}}
      <div class="col-sm-6">
        <div class="card border-success mb-3">
          <div class="card-header text-center">Tersedia</div>
          <div class="card-body text-success">
            <form action="/KRS/Detail/Store" method="POST">
              @csrf
              <table class="table table-sm table-hover table-bordered border-primary shadow-sm">
                <tr class="table-primary text-center">
                  <th>Nama Matakuliah</th>
                  <th>Dosen Pengampu</th>
                  <th>Semester</th>
                  <th>Perintah</th>
                </tr>
                <tr class="table-light text-center align-middle">
                  <td>Matakuliah</td>
                  <td>Dosen Pengampu</td>
                  <td>Semester</td>
                  <td>
                  <label>
                    <input type="checkbox"/>
                    <span class="m-checkbox">
                      <span><i class="ph-check"></i></span>
                    </span>
                  </label>
                  </td>
                </tr>
              </table>
              <button class="btn btn-success" type="submit">Simpan</button>
            </form>
          </div>
        </div>
      </div>

      {{-- Kanan --}}
      <div class="col-sm-6">
        <div class="card border-dark mb-3">
          <div class="card-header text-center">Dipilih</div>
          <div class="card-body text-dark">
            <table class="table table-sm table-hover table-bordered border-primary shadow-sm">
              <tr class="table-primary text-center">
                <th>Nama Matakuliah</th>
                <th>Dosen Pengampu</th>
                <th>Perintah</th>
              </tr>
              <tr class="table-light text-center align-middle">
                <td>A</td>
                <td>B</td>
                <td>
                  <input type="checkbox" />
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- Content --}}
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>

</html>