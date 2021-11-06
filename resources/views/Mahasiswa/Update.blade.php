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
    <link href="{{ asset('Style/MyStyle.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

</head>

<body>
    <main>
        <div class="row h-100 justify-content-center py-4">
            <div class="col-6">
                <div class="card shadow-sm">
                    <div class="card-header text-center">
                        Update Data Mahasiswa
                    </div>
                    <div class="card-body">
                        <a href="/Mahasiswa/Detail" class="btn btn-primary col-2">Kembali</a>
                        <form action="/Mahasiswa/Update/" method="POST">
                            @csrf
                            {{-- Input --}}
                            <label for="Nama" class="col-sm-4 col-form-label text-start">Tempat & Tgl. Lahir</label>
                            <div class="input-group">
                                <input type="text" name="tempat_lahir" aria-label="Tempat Lahir" class="form-control"
                                    value="{{ $Data->student->tempat_lahir ?? '' }}">
                                <input type="date" name="tanggal_lahir" aria-label="Tanggal Lahir" class="form-control"
                                    value="{{ $Data->student->tanggal_lahir ?? '' }}">
                            </div>
                            <label for="Jenis Kelamin" class="col-sm-4 col-form-label text-start">Jenis Kelamin</label>
                            <div class="input-group">
                                <select name="jenis_kelamin" class="form-select form-control-lg"
                                    aria-label="Jenis Kelamin">
                                    <option selected>{{ $Data->student->jenis_kelamin ?? '' }}</option>
                                    <option value="Laki-Laki">Laki-Laki
                                    </option>
                                    <option value="Perempuan">Perempuan
                                    </option>
                                </select>
                            </div>
                            <label for="Agama" class="col-sm-4 col-form-label text-start">Agama</label>
                            <div class="input-group">
                                <select name="agama" class="form-select mb-1" aria-label="Agama">
                                    <option selected>{{ $Data->student->agama ?? '' }}</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Nasrani">Nasrani</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                </select>
                            </div>
                            <label for="Jalur Penerimaan" class="col-sm-4 col-form-label text-start">Jalur
                                Penerimaan</label>
                            <div class="input-group">
                                <select name="jalur_penerimaan" class="form-select mb-4" aria-label="Agama">
                                    <option selected>{{ $Data->student->jalur_penerimaan ?? '' }}</option>
                                    <option value="SNMPTN">SNMPTN</option>
                                    <option value="SBMPTN">SBMPTN</option>
                                    <option value="Mandiri">Mandiri</option>
                                </select>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-success col-2">Update</button>
                            </div>
                        </form>
                    </div>
                    @if (session('Gagal'))
                    <div class="alert alert-alert alert-dismissible fade show col-6" role="alert">
                        {{ session('Gagal') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                </div>
            </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
