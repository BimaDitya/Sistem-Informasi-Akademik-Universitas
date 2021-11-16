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

    <!-- Custom Style -->
    <link href='{{ asset ('Style/AdminStyle.css') }}' rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
</head>

<body>
    {{-- Content --}}
    <div class="row justify-content-center">
        <div class="col-lg-6 vertical-center">
            <div class="card shadow">
                <div class="card-header text-center fw-bold highlight-font">
                    Ubah Data Akun
                </div>
                <div class="card-body">
                    <a href="/Admin/Mahasiswa" class="btn btn-primary">Kembali</a>
                    <form action="/Admin/Mahasiswa/Update/{{ $Accounts->id }}" method="POST">
                        @csrf
                        <div class="mb-1">
                            <label for="NIM" class="col-sm-4 col-form-label text-start">Nomor Identitas</label>
                            <input type="number" name="no_id" class="form-control" id="nim"
                                placeholder="Nomor Identitas" value="{{ $Accounts->no_id }}">
                        </div>
                        <div class="row mb-1">
                            <div class="col">
                                <label for="Nama Depan" class="col-sm-6 col-form-label text-start">Nama Depan</label>
                                <input type="text" name="nama_depan" class="form-control" placeholder="Nama Depan"
                                    aria-label="Nama Depan" value="{{ $Accounts->nama_depan }}">
                            </div>
                            <div class="col">
                                <label for="Nama Belakang" class="col-sm-6 col-form-label text-start">Nama
                                    Belakang</label>
                                <input type="text" name="nama_belakang" class="form-control" placeholder="Nama Belakang"
                                    aria-label="Nama Belakang" value="{{ $Accounts->nama_belakang }}">
                            </div>
                        </div>
                        <div class="mb-1">
                            <label for="Nama" class="col-sm-4 col-form-label text-start">Role Akun</label>
                            <select class="form-select" name="role">
                                <option selected>{{ $Accounts->role }}</option>
                                <option value="Admin">Admin</option>
                                <option value="Student">Student</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Password" class="col-sm-4 col-form-label text-start">Password</label>
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-success">Update Data</button>
                    </form>
                </div>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show my-2" role="alert">
                Gagal Memperbarui Data, Periksa Ulang
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>