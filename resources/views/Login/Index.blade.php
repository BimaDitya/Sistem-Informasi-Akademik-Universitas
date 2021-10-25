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
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Mahasiswa</button>
              <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Admin</button>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            {{-- Tab Mahasiswa --}}
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <div class="card py-2 px-4 shadow-sm">
                <main class="form-signin text-center">
                  <h1 class="h1 fw-normal login-heading-font azure-color-01">Selamat Datang</h1>
                  <p class="fs-6 mb-3">Masuk Sebagai Mahasiswa</p>
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
                    <button class="w-100 btn btn-lg btn-outline-primary fw-bold mb-3" type="submit">Masuk</button>
                  </form>
                  @if (session('Gagal'))
                    <div class="alert alert-danger alert-dismissible fade show my-2" role="alert">
                      {{ session('Gagal') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif
                </main>
              </div>
            </div>
            {{-- Tab Admin --}}
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
              <div class="card py-2 px-4 shadow-sm">
                <main class="form-signin text-center">
                  <h1 class="h1 fw-normal login-heading-font azure-color-01">Selamat Datang</h1>
                  <p class="fs-6 mb-3">Masuk Sebagai Admin</p>
                  <form action="/" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                      <input type="number" title="Masukkan ID" name="nim" id="nim" class="form-control" placeholder="Nomor Identitas Admin" autofocus required>
                      <label for="nim">Nomor Indentitas Admin</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="password" pattern=".{8,}" title="Minimal 8 Atau Lebih" name="password" id="password" class="form-control" placeholder="Password" required>
                      <label for="password">Kata Sandi</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-outline-primary fw-bold mb-3" type="submit">Masuk</button>
                  </form>
                  @if (session()->has('LoginError'))
                      <div class="mt-3 alert alert-danger alert-dissmisible fade show" role="alert">{{ session('LoginError') }}</div>
                  @endif
                </main>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
  </body>
</html>
