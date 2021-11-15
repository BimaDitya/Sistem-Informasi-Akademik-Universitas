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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="Style/MyStyle.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 vertical-center">
                    <div class="align-self-center">
                        <div class="card py-2 px-4 shadow">
                            <main class="form-signin text-center">
                                <h1 class="login-heading-font display-6 py-3">Selamat Datang</h1>
                                <form action="/" method="POST">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input type="number" title="Masukkan NIM" name="nim" id="nim"
                                            class="form-control" placeholder="Nomor Induk Mahasiswa" autofocus required>
                                        <label for="nim">Nomor Induk Mahasiswa</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" pattern=".{8,}" title="Minimal 8 Atau Lebih"
                                            name="password" id="password" class="form-control" placeholder="Password"
                                            required>
                                        <label for="password">Kata Sandi</label>
                                    </div>
                                    <button class="col-12 btn btn-lg btn-primary highlight-font mb-3"
                                        type="submit">Masuk</button>
                                </form>
                            </main>
                        </div>
                        @if (session('Gagal'))
                        <div class="alert alert-danger alert-dismissible fade show my-2" role="alert">
                            {{ session('Gagal') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>