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
</head>

<body>
    {{-- Content --}}
    <div class="row h-100 justify-content-center py-2">
        <div class="col-6">
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show my-2" role="alert">
                Gagal Menyimpan Data, Periksa Kembali
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="card shadow-sm">
                <div class="card-header text-center">
                    Ubah Data Perkuliahan
                </div>
                <div class="card-body">
                    <a href="/Admin/Perkuliahan" class="btn btn-primary">Kembali</a>
                    <form action="/Admin/Perkuliahan/Update" method="POST">
                        @csrf
                        <div>
                            <label for="Kode" class="col-sm-4 col-form-label text-start">Kode</label>
                            <input type="text" name="kode" class="form-control" id="kode"
                                placeholder="Kode | Cth. 123456" value="{{ $Clg -> kode }}">
                        </div>
                        <div>
                            <label for="Kelas" class="col-sm-4 col-form-label text-start">Kelas</label>
                            <input type="text" name="kelas" class="form-control" id="kelas"
                                placeholder="Kelas | Cth. PTI19B" value="{{ $Clg -> kelas }}">
                        </div>
                        <div>
                            <label for="Nama Matakuliah" class="col-sm-4 col-form-label text-start">Nama
                                Matakuliah</label>
                            <input type="text" name="matakuliah" class="form-control" id="matakuliah"
                                placeholder="Nama Matakuliah" value="{{ $Clg -> matakuliah }}">
                        </div>
                        <div>
                            <label for="Dosen" class="col-sm-4 col-form-label text-start">Dosen</label>
                            <input type="text" name="dosen" class="form-control" id="dosen" placeholder="Dosen Pengampu"
                                value="{{ $Clg -> dosen }}">
                        </div>
                        <div>
                            <label for="Hari" class="col-sm-4 col-form-label text-start">Hari</label>
                            <input type="text" name="hari" class="form-control" id="hari" placeholder="Hari" value="{{ $Clg -> hari }}">
                        </div>
                        <div>
                            <label for="Ruang" class="col-sm-4 col-form-label text-start">Ruang</label>
                            <input type="text" name="ruang" class="form-control" id="ruang"
                                placeholder="Ruang | Cth. A10.19.01" value="{{ $Clg -> ruang }}">
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>