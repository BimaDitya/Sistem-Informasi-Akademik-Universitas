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

  <body class="text-center">
    <div class="row h-100 justify-content-center mt-5 pt-5">
      <div class="col-lg-5 align-self-start">
        <div class="card pt-2 pb-4 px-4 shadow-sm">
          <main class="form-signin">
            <h1 class="h1 fw-normal login-heading-font azure-color-01">Selamat Datang</h1>
            <p class="fs-6 mb-3">Silahkan Login Untuk Melanjutkan</p>
            <form action="/" method="POST">
              @csrf
              <div class="form-floating mb-3">
                <input type="number" title="Masukkan NIM" name="nim" id="nim" class="form-control" placeholder="Nomor Induk Mahasiswa" autofocus required>
                <label for="nim">Nomor Induk Mahasiswa</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" pattern=".{8,}" title="Minimal 8 Atau Lebih" name="password" id="password" class="form-control" placeholder="Password" required>
                <label for="password">Kata Sandi</label>
              </div>
              <button class="w-100 btn btn-lg btn-outline-primary fw-bold" type="submit">Login</button>
            </form>
            @if (session()->has('LoginError'))
                <div class="mt-3 alert alert-danger alert-dissmisible fade show" role="alert">{{ session('LoginError') }}</div>
            @endif
          </main>
        </div>
      </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
  </body>
</html>
