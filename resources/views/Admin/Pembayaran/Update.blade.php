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
    <link href='{{ asset('Style/AdminStyle.css') }}' rel="stylesheet">
</head>

<body>
    {{-- Content --}}
    <div class="row h-100 justify-content-center align-items-center py-4">
        <div class="col-lg-6 vertical-center">
            <div class="card shadow">
                <div class="card-header text-center fw-bold highlight-font">
                    Ubah Data Pemabayaran
                </div>
                <div class="card-body">
                    <a href="/Admin/Pembayaran" class="btn btn-primary">Kembali</a>
                    <form method="POST" action="/Admin/Pembayaran/Update/{{ $Payment->id }}">
                        @csrf
                        <div class="mb-1">
                            <label for="nim" class="col-sm-4 col-form-label text-start">Nomor Induk
                                Mahasiswa</label>
                            <select class="form-select" name="account_id">
                                <option value="">Pilih Nomor Induk Mahasiswa</option>
                                @foreach ($Accounts as $Item)
                                <option value="{{ $Item->id }}" {{ old('account_id', $Payment->account_id)==$Item->id ? 'selected' : null}}>{{ $Item->nim }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="tahun" class="col-sm-4 col-form-label text-start">Tahun Ajaran</label>
                            <input type="text" name="tahun" class="form-control" id="tahun" placeholder="Contoh: 2019/2020 Gasal"
                                value="{{ old('tahun', $Payment->tahun) }}">
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="nominal" class="col-lg-8 col-form-label text-start">Tentukan Nominal UKT</label>
                                <select class="form-select" name="nominal">
                                    <option value="">Tentukan Nominal</option>
                                    <option value="500000" {{ old('nominal', $Payment->nominal)=="500000;" ? 'selected' : null}}>Rp. 500.000</option>
                                    <option value="1000000" {{ old('nominal', $Payment->nominal)=="1000000" ? 'selected' : null}}>Rp. 1.000.000</option>
                                    <option value="2400000" {{ old('nominal', $Payment->nominal)=="2400000" ? 'selected' : null}}>Rp. 2.400.000</option>
                                    <option value="3800000" {{ old('nominal', $Payment->nominal)=="3800000" ? 'selected' : null}}>Rp. 3.800.000</option>
                                    <option value="5200000" {{ old('nominal', $Payment->nominal)=="5200000" ? 'selected' : null}}>Rp. 5.200.000</option>
                                    <option value="6500000" {{ old('nominal', $Payment->nominal)=="6500000" ? 'selected' : null}}>Rp. 6.500.000</option>
                                    <option value="7900000" {{ old('nominal', $Payment->nominal)=="7900000" ? 'selected' : null}}>Rp. 7.900.000</option>
                                    <option value="9300000" {{ old('nominal', $Payment->nominal)=="9300000" ? 'selected' : null}}>Rp. 9.300.000</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="status" class="col-lg-6 col-form-label text-start">Status Pembayaran</label>
                                <select class="form-select" name="status">
                                    <option value="">Tentukan Status Pembayaran</option>
                                    <option value="L" {{ old('status', $Payment->status)=="L" ? 'selected' : null}}>Lunas</option>
                                    <option value="BL" {{ old('status', $Payment->status)=="BL" ? 'selected' : null}}>Belum Lunas</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update Data</button>
                    </form>
                </div>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show my-2" role="alert">
                Gagal Menyimpan Data, Periksa Kembali
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
</body>

</html>