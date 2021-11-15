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
                    Ubah Data Mahasiswa
                </div>
                <div class="card-body">
                    <a href="/Admin/Perkuliahan/" class="btn btn-primary">Kembali</a>
                    <form action="/Admin/Perkuliahan/Update/{{ $Courses->id }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <label for="Nama" class="col-sm-4 col-form-label text-start">Semester</label>
                            <input class="form-control" name="semester" list="datalistSemester" id="exampleDataList"
                                placeholder="Semester..." value="{{ $Courses->semester }}">
                            <datalist id="datalistSemester">
                                <option value="Semester 1">
                                <option value="Semester 2">
                                <option value="Semester 3">
                                <option value="Semester 4">
                                <option value="Semester 5">
                                <option value="Semester 6">
                                <option value="Semester 7">
                                <option value="Semester 8">
                            </datalist>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <label for="Nama" class="col-sm-6 col-form-label text-start">Matakuliah</label>
                                <input type="text" name="matakuliah" class="form-control" placeholder="Nama Matakuliah"
                                    aria-label="Nama Matakuliah" value="{{ $Courses->matakuliah }}">
                            </div>
                            <div class="col">
                                <label for="Nama" class="col-sm-6 col-form-label text-start">Dosen</label>
                                <input type="text" name="dosen" class="form-control" placeholder="Nama Dosen"
                                    aria-label="Nama Dosen" value="{{ $Courses->dosen }}">
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="Nama" class="col-sm-4 col-form-label text-start">Hari</label>
                            <input class="form-control" name="hari" list="datalistDay" id="exampleDataList" placeholder="Hari..."
                            value="{{ $Courses->hari }}">
                            <datalist id="datalistDay">
                                <option value="Senin">
                                <option value="Selasa">
                                <option value="Rabu">
                                <option value="Kamis">
                                <option value="Jumat">
                            </datalist>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                        <button class="btn btn-secondary" type="reset">Kosongkan</button>
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