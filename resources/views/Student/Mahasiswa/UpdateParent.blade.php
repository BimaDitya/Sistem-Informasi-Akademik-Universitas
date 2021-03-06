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
    <link href="{{ asset('Style/StudentStyle.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

</head>

<body>
    <main>
        <div class="row justify-content-center py-2">
            <div class="col-lg-6 mt-3">
                <div class="card shadow">
                    <div class="card-header text-center highlight-font fw-bold">
                        Identitas Orang Tua Mahasiswa
                    </div>
                    <form action="/Mahasiswa/Update/Parent/{{ $Account->id }}" method="POST">
                        @csrf
                        {{-- Orang Tua Mahasiswa --}}
                        <div class="card-body">
                            <a href="/Mahasiswa/Detail/{{ $Account->id }}" class="btn btn-primary col-2 mb-3">Kembali</a>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-header text-center">
                                            Identitas Ibu
                                        </div>
                                        <div class="card-body">
                                            <label for="Nama" class="col-sm-6 col-form-label text-start">Nama</label>
                                            <div class="input-group">
                                                <input type="text" name="nama_ibu" aria-label="Nama"
                                                    class="form-control" value="{{ $Account->parent->nama_ibu ?? '' }}"
                                                    placeholder="Contoh: Siti Aminah">
                                            </div>
                                            <label for="Tempat Lahir" class="col-sm-6 col-form-label text-start">Tempat
                                                Lahir</label>
                                            <div class="input-group">
                                                <input type="text" name="tempat_ibu" aria-label="Tempat Lahir"
                                                    class="form-control" value="{{ $Account->parent->tempat_ibu ?? '' }}"
                                                    placeholder="Contoh: Kebon Jeruk">
                                            </div>
                                            <label for="Tanggal Lahir"
                                                class="col-sm-6 col-form-label text-start">Tanggal Lahir</label>
                                            <div class="input-group">
                                                <input type="date" name="tanggal_ibu" aria-label="Tanggal Lahir"
                                                    class="form-control" value="{{ $Account->parent->tanggal_ibu ?? '' }}"
                                                    placeholder="Contoh: YYYY-MM-DD">
                                            </div>
                                            <label for="No. Telepon" class="col-sm-6 col-form-label text-start">No.
                                                Telepon</label>
                                            <div class="input-group">
                                                <input type="number" name="no_ibu" aria-label="No. Telepon"
                                                    class="form-control" value="{{ $Account->parent->no_ibu ?? '' }}"
                                                    placeholder="+62822XXXXXXXX">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-header text-center">
                                            Identitas Ayah
                                        </div>
                                        <div class="card-body">
                                            <label for="Nama" class="col-sm-6 col-form-label text-start">Nama</label>
                                            <div class="input-group">
                                                <input type="text" name="nama_ayah" aria-label="Nama"
                                                    class="form-control" value="{{ $Account->parent->nama_ayah ?? '' }}"
                                                    placeholder="Contoh: Abdullah">
                                            </div>
                                            <label for="Tempat Lahir" class="col-sm-6 col-form-label text-start">Tempat
                                                Lahir</label>
                                            <div class="input-group">
                                                <input type="text" name="tempat_ayah" aria-label="Tempat Lahir"
                                                    class="form-control" value="{{ $Account->parent->tempat_ayah ?? '' }}"
                                                    placeholder="Contoh: Kebon Jeruk">
                                            </div>
                                            <label for="Tanggal Lahir"
                                                class="col-sm-6 col-form-label text-start">Tanggal Lahir</label>
                                            <div class="input-group">
                                                <input type="date" name="tanggal_ayah" aria-label="Tanggal Lahir"
                                                    class="form-control" value="{{ $Account->parent->tanggal_ayah ?? '' }}"
                                                    placeholder="Contoh: YYYY-MM-DD">
                                            </div>
                                            <label for="No. Telepon" class="col-sm-6 col-form-label text-start">No.
                                                Telepon</label>
                                            <div class="input-group">
                                                <input type="number" name="no_ayah" aria-label="No. Telepon"
                                                    class="form-control" value="{{ $Account->parent->no_ayah ?? '' }}"
                                                    placeholder="+62822XXXXXXXX">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-success mt-4 col-2">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
                @if (session('Gagal'))
                <div class="alert alert-alert alert-dismissible fade show col mt-2" role="alert">
                    {{ session('Gagal') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (session('Berhasil'))
                <div class="alert alert-success alert-dismissible fade show col mt-2" role="alert">
                    {{ session('Berhasil') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>