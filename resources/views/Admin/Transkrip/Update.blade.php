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
                    Ubah Data Nilai
                </div>
                <div class="card-body">
                    <a href="/Admin/Transkrip" class="btn btn-primary">Kembali</a>
                    <form method="POST" action="/Admin/Transkrip/Update/{{ $Grades->id }}">
                        @csrf
                        <div class="mb-1">
                            <label for="matakuliah" class="col-sm-4 col-form-label text-start">Nama
                                Matakuliah</label>
                            <select class="form-select" name="course_id">
                                <option value="">Pilih Matakuliah</option>
                                @foreach ($Courses as $Item)
                                <option value="{{ $Item->id }}" {{ old('course_id', $Grades->course_id)==$Item->id ? 'selected' : null}}>{{ $Item->matakuliah }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="nim" class="col-sm-4 col-form-label text-start">Nomor Induk
                                Mahasiswa</label>
                            <select class="form-select" name="account_id">
                                <option value="">Pilih Nomor Induk Mahasiswa</option>
                                @foreach ($Accounts as $Item)
                                <option value="{{ $Item->id }}" {{ old('account_id', $Grades->account_id)==$Item->id ? 'selected' : null}}>{{ $Item->nim }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="sks" class="col-sm-5 col-form-label text-start">Satuan Kredit
                                Semester</label>
                            <input type="number" name="sks" class="form-control" id="sks" placeholder="Contoh: 3" value="{{ old('sks', $Grades->sks) }}">
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="nilai" class="col-sm-6 col-form-label text-start">Nilai
                                    Matakuliah</label>
                                <select class="form-select" name="nilai">
                                    <option value=""></option>
                                    <option value="A" {{ old('nilai', $Grades->nilai)=="A" ? 'selected' : null}}>A</option>
                                    <option value="A-" {{ old('nilai', $Grades->nilai)=="A-" ? 'selected' : null}}>A-</option>
                                    <option value="B+" {{ old('nilai', $Grades->nilai)=="B+" ? 'selected' : null}}>B+</option>
                                    <option value="B" {{ old('nilai', $Grades->nilai)=="B" ? 'selected' : null}}>B</option>
                                    <option value="B-" {{ old('nilai', $Grades->nilai)=="B-" ? 'selected' : null}}>B-</option>
                                    <option value="C+" {{ old('nilai', $Grades->nilai)=="C+" ? 'selected' : null}}>C+</option>
                                    <option value="C" {{ old('nilai', $Grades->nilai)=="C" ? 'selected' : null}}>C</option>
                                    <option value="C-" {{ old('nilai', $Grades->nilai)=="C-" ? 'selected' : null}}>C-</option>
                                    <option value="D" {{ old('nilai', $Grades->nilai)=="D" ? 'selected' : null}}>D</option>
                                    <option value="E" {{ old('nilai', $Grades->nilai)=="E" ? 'selected' : null}}>E</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="indeks" class="col-sm-6 col-form-label text-start">Indeks
                                    Matakuliah</label>
                                <select class="form-select" name="indeks">
                                    <option value=""></option>
                                    <option value="4.00" {{ old('indeks', $Grades->indeks)=="4.00" ? 'selected' : null}}>4.00</option>
                                    <option value="3.75" {{ old('indeks', $Grades->indeks)=="3.75" ? 'selected' : null}}>3.75</option>
                                    <option value="3.50" {{ old('indeks', $Grades->indeks)=="3.50" ? 'selected' : null}}>3.50</option>
                                    <option value="3.00" {{ old('indeks', $Grades->indeks)=="3.00" ? 'selected' : null}}>3.00</option>
                                    <option value="2.75" {{ old('indeks', $Grades->indeks)=="2.75" ? 'selected' : null}}>2.75</option>
                                    <option value="2.50" {{ old('indeks', $Grades->indeks)=="2.50" ? 'selected' : null}}>2.50</option>
                                    <option value="2.25" {{ old('indeks', $Grades->indeks)=="2.25" ? 'selected' : null}}>2.25</option>
                                    <option value="2.00" {{ old('indeks', $Grades->indeks)=="2.00" ? 'selected' : null}}>2.00</option>
                                    <option value="1.00" {{ old('indeks', $Grades->indeks)=="1.00" ? 'selected' : null}}>1.00</option>
                                    <option value="0" {{ old('indeks', $Grades->indeks)=="0" ? 'selected' : null}}>0</option>
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