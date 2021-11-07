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
                        <form action="/Mahasiswa/Update/Address" method="POST">
                            @csrf
                            {{-- Input --}}
                            <label for="Jalan" class="col-sm-4 col-form-label text-start">Jalan</label>
                            <div class="input-group">
                                <input type="text" name="jalan" class="form-control" value="{{ $Data->address->jalan ?? '' }}"
                                placeholder="Contoh: Jl. Kehormatan Blok A No.19 RT.02 RW.08">
                            </div>
                            <label for="Kecamatan" class="col-sm-4 col-form-label text-start">Kecamatan</label>
                            <div class="input-group">
                                <input type="text" name="kecamatan" class="form-control" value="{{ $Data->address->kecamatan ?? '' }}"
                                placeholder="Duri Kepa">
                            </div>
                            <label for="Kabupaten" class="col-sm-4 col-form-label text-start">Kabupaten</label>
                            <div class="input-group">
                                <input type="text" name="kabupaten" class="form-control" value="{{ $Data->address->kabupaten ?? '' }}"
                                placeholder="Kebon Jeruk">
                            </div>
                            <label for="Provinsi" class="col-sm-4 col-form-label text-start">Provinsi</label>
                            <div class="input-group">
                                <input type="text" name="provinsi" class="form-control" value="{{ $Data->address->provinsi ?? '' }}"
                                placeholder="Jakarta Barat">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-success col-2 mt-3">Update</button>
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
