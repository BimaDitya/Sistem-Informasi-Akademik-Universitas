@extends('Student.MainStudent')
@section('Contents')
<main>
    <!--Biodata Mahasiswa-->
    <div class="row h-100 justify-content-center py-2 px-1">
        {{-- Biodata Mahasiswa --}}
        <div class="container-fluid">
            {{-- Notify --}}
            @if (session('Berhasil'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('Berhasil') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show my-2" role="alert">
                Gagal Menyimpan Accounts
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>

        <div class="row">
            {{-- Profile Pictures --}}
            <div class="col-lg-5 mt-2">
                <div class="card shadow-sm">
                    <div class="card-header text-center highlight-font fw-bold">
                        {{ auth()->user()->nama_depan }} {{ auth()->user()->nama_belakang }}
                    </div>
                    <div class="card-body">
                        <form action="/Mahasiswa/Store/Image" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="text-center">
                                <div class="form-group d-flex justify-content-center">
                                    @if ($Account->image == "")
                                    <div class="card" style="width: 12REM; border-radius: 50%">
                                        <img style="width: 12REM; border-radius: 50%" src="{{ asset('/Images/Default.PNG') }}" class="card-img-top img-preview img-fluid"
                                            alt="Photo Profile">
                                    </div>
                                    @else
                                    <div class="card" style="width: 12REM; overflow: hidden; border-radius: 50%">
                                        <img style="width: 12REM; border-radius: 50%" src="{{ asset('storage/'.$Account->image->image) }}" class="card-img-top img-preview img-fluid"
                                            alt="Photo Profile">
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    @if ($Account->image == "")
                                    <div class="file_upload btn btn-sm btn-primary">
                                        <span>Upload</span>
                                        <input type="file" name="image" class="upload" id="image" onchange="imagesPreview()"/>
                                    </div>
                                    <div class="mt-2">
                                        <button type="submit" class="btn btn-sm btn-success"
                                            data-bs-toggle="modal">Simpan</button>
                                        <a href="/Mahasiswa/Update/" class="btn btn-sm btn-secondary disabled">Update</a>
                                    </div>
                                    @else
                                    <div class="mt-2">
                                        <button type="submit" class="btn btn-sm btn-secondary disabled">Simpan</button>
                                        <a href="/Mahasiswa/Update/{{ $Account->id }}" class="btn btn-sm btn-primary">Update</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- Personal --}}
            <div class="col-lg-7 mt-2">
                <div class="card shadow-sm">
                    <div class="card-header text-center highlight-font fw-bold">
                        Biodata Mahasiswa
                    </div>
                    <div class="card-body">
                        <label for="Nama" class="col-sm-4 col-form-label text-start">Nama Mahasiswa</label>
                        <div class="input-group">
                            <input type="text" name="nama_depan" aria-label="Nama Depan" class="form-control"
                                value="{{ auth()->user()->nama_depan }}" disabled readonly>
                            <input type="text" name="nama_belakang" aria-label="Nama Belakang" class="form-control"
                                value="{{ auth()->user()->nama_belakang }}" disabled readonly>
                        </div>
                        <label for="NIM" class="col-sm-4 col-form-label text-start">NIM</label>
                        <div class="input-group">
                            <input type="number" name="no_id" aria-label="Nomor Identitas" class="form-control"
                                value="{{ auth()->user()->no_id }}" disabled readonly>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Biodata --}}
            <div class="col-lg-12 mt-2">
                <div class="card shadow-sm ">
                    <form action="/Mahasiswa/Store/Biodata/" method="POST">
                        @csrf
                        <div class="card-header text-center highlight-font fw-bold">
                            Biodata Mahasiswa
                        </div>
                        {{-- Biodata Mahasiswa --}}
                            <div class="card-body">
                                <label for="Nama" class="col-sm-4 col-form-label text-start">Tempat & Tgl. Lahir</label>
                                <div class="input-group">
                                    <input type="text" name="tempat_lahir" aria-label="Tempat Lahir" class="form-control"
                                        value="{{ old('tempat_lahir', $Account->student->tempat_lahir ?? '') }}"
                                        placeholder="Contoh: Kebon Jeruk">
                                    <input type="date" name="tanggal_lahir" aria-label="Tanggal Lahir" class="form-control"
                                        value="{{ old('tanggal_lahir', $Account->student->tanggal_lahir ?? '') }}">
                                </div>
                                <label for="Jenis Kelamin" class="col-sm-4 col-form-label text-start">Jenis Kelamin</label>
                                <div class="input-group">
                                    <select name="jenis_kelamin" class="form-select form-control-lg"
                                        aria-label="Jenis Kelamin">
                                        <option selected>Pilih Jenis Kelamin </option>
                                        <option value="Laki-Laki" {{ old('jenis_kelamin', $Account->student->jenis_kelamin ?? '')
                                            ==
                                            "Laki-Laki" ? 'selected' : null}}>Laki-Laki
                                        </option>
                                        <option value="Perempuan" {{ old('jenis_kelamin', $Account->student->jenis_kelamin ?? '')
                                            ==
                                            "Perempuan" ? 'selected' : null}}>Perempuan
                                        </option>
                                    </select>
                                </div>
                                <label for="Agama" class="col-sm-4 col-form-label text-start">Agama</label>
                                <div class="input-group">
                                    <select name="agama" class="form-select mb-1" aria-label="Agama">
                                        <option selected>Pilih Agama</option>
                                        <option value="Islam" {{ old('agama', $Account->student->agama ?? '') == "Islam" ?
                                            'selected'
                                            : null}}>Islam</option>
                                        <option value="Kristen" {{ old('agama', $Account->student->agama ?? '') == "Kristen" ?
                                            'selected' : null}}>Kristen</option>
                                        <option value="Nasrani" {{ old('agama', $Account->student->agama ?? '') == "Nasrani" ?
                                            'selected' : null}}>Nasrani</option>
                                        <option value="Hindu" {{ old('agama', $Account->student->agama ?? '') == "Hindu" ?
                                            'selected'
                                            : null}}>Hindu</option>
                                        <option value="Budha" {{ old('agama', $Account->student->agama ?? '') == "Budha" ?
                                            'selected'
                                            : null}}>Budha</option>
                                    </select>
                                </div>
                                <label for="Jalur Penerimaan" class="col-sm-4 col-form-label text-start">Jalur
                                    Penerimaan</label>
                                <div class="input-group">
                                    <select name="jalur_penerimaan" class="form-select mb-1" aria-label="Agama">
                                        <option value="">Pilih Jalur Penerimaan</option>
                                        <option value="SNMPTN" {{ old('jalur_penerimaan', $Account->student->jalur_penerimaan ?? '')
                                            == "SNMPTN" ? 'selected' : null}}>SNMPTN</option>
                                        <option value="SBMPTN" {{ old('jalur_penerimaan', $Account->student->jalur_penerimaan ?? '')
                                            == "SBMPTN" ? 'selected' : null}}>SBMPTN</option>
                                        <option value="Mandiri" {{ old('jalur_penerimaan', $Account->student->jalur_penerimaan ?? '') 
                                            == "Mandiri" ? 'selected' : null}}>Mandiri</option>
                                    </select>
                                </div>
                                @if ($Account->student == "")
                                <div>
                                    <button type="submit" class="btn btn-success my-2 col-2"
                                        data-bs-toggle="modal">Simpan</button>
                                    <a href="/Mahasiswa/Update/Biodata"
                                        class="btn btn-secondary my-4 col-2 disabled">Update</a>
                                </div>
                                @else
                                <div>
                                    <button type="submit" class="btn btn-secondary my-2 col-2 disabled">Simpan</button>
                                    <a href="/Mahasiswa/Update/Biodata/{{ $Account->id }}" class="btn btn-primary my-4 col-2">Update</a>
                                </div>
                                @endif
                            </div>
                    </form>
                </div>
            </div>
            {{-- Address --}}
            <div class="col-lg-12 mt-2">
                <div class="card shadow-sm">
                    <form action="/Mahasiswa/Store/Alamat" method="POST">
                        @csrf
                        <div class="card-header text-center highlight-font fw-bold">
                            Alamat Mahasiswa
                        </div>
                        {{-- Alamat Mahasiswa --}}
                        <div class="card-body">
                            <label for="Jalan" class="col-sm-2 col-form-label text-start">Jalan</label>
                            <div class="input-group">
                                <input type="text" name="jalan" aria-label="Jalan" class="form-control"
                                    value="{{ $Account->address->jalan ?? '' }}"
                                    placeholder="Contoh: Jl. Kehormatan Blok A No.19 RT.02 RW.08">
                            </div>
                            <label for="Kecamatan" class="col-sm-2 col-form-label text-start">Kecamatan</label>
                            <div class="input-group">
                                <input type="text" name="kecamatan" aria-label="Kecamatan" class="form-control"
                                    value="{{ $Account->address->kecamatan ?? '' }}" placeholder="Contoh: Duri Kepa">
                            </div>
                            <label for="Kabupaten" class="col-sm-2 col-form-label text-start">Kabupaten</label>
                            <div class="input-group">
                                <input type="text" name="kabupaten" aria-label="Kabupaten/Kota" class="form-control"
                                    value="{{ $Account->address->kabupaten ?? '' }}" placeholder="Contoh: Kebon Jeruk">
                            </div>
                            <label for="Provinsi" class="col-sm-2 col-form-label text-start">Provinsi</label>
                            <div class="input-group">
                                <input type="text" name="provinsi" aria-label="Provinsi" class="form-control"
                                    value="{{ $Account->address->provinsi ?? '' }}" placeholder="Contoh: Jakarta Barat">
                            </div>
                            @if ($Account->address == "")
                            <div>
                                <button type="submit" class="btn btn-success my-2 col-2">Simpan</button>
                                <a href="/Mahasiswa/Update/Alamat/"
                                    class="btn btn-secondary my-4 col-2 disabled">Update</a>
                            </div>
                            @else
                            <div>
                                <button type="submit" class="btn btn-secondary my-2 col-2 disabled">Simpan</button>
                                <a href="/Mahasiswa/Update/Alamat/{{ $Account->id }}" class="btn btn-primary my-4 col-2">Update</a>
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
            {{-- Schools --}}
            <div class="col-lg-12 mt-2">
                <div class="card shadow-sm">
                    <form action="/Mahasiswa/Store/Sekolah" method="POST">
                        @csrf
                        <div class="card-header text-center highlight-font fw-bold">
                            Asal Sekolah Mahasiswa
                        </div>
                        {{-- Sekolah Mahasiswa --}}
                        <div class="card-body">
                            <label for="Kecamatan" class="col-sm-2 col-form-label text-start">Kecamatan</label>
                            <div class="input-group">
                                <input type="text" name="kecamatan" aria-label="Kecamatan" class="form-control"
                                    value="{{ $Account->school->kecamatan ?? '' }}" placeholder="Contoh: Duri Kepa">
                            </div>
                            <label for="Kabupaten" class="col-sm-2 col-form-label text-start">Kabupaten</label>
                            <div class="input-group">
                                <input type="text" name="kabupaten" aria-label="Kabupaten" class="form-control"
                                    value="{{ $Account->school->kabupaten ?? '' }}" placeholder="Contoh: Kebon Jeruk">
                            </div>
                            <label for="Provinsi" class="col-sm-2 col-form-label text-start">Provinsi</label>
                            <div class="input-group">
                                <input type="text" name="provinsi" aria-label="Provinsi" class="form-control"
                                    value="{{ $Account->school->provinsi ?? '' }}" placeholder="Contoh: Jawa Barat">
                            </div>
                            <label for="Nama Sekolah" class="col-sm-2 col-form-label text-start">Nama Sekolah</label>
                            <div class="input-group">
                                <input type="text" name="sekolah" aria-label="Sekolah" class="form-control"
                                    value="{{ $Account->school->sekolah ?? '' }}" placeholder="Contoh: SMAN 01 Duri Kepa">
                            </div>
                            @if ($Account->school == "")
                            <div>
                                <button type="submit" class="btn btn-success my-2 col-2">Simpan</button>
                                <a href="/Mahasiswa/Update/Sekolah/"
                                    class="btn btn-secondary my-4 col-2 disabled">Update</a>
                            </div>
                            @else
                            <div>
                                <button type="submit" class="btn btn-secondary my-2 col-2 disabled">Simpan</button>
                                <a href="/Mahasiswa/Update/Sekolah/{{ $Account->id }}" class="btn btn-primary my-4 col-2">Update</a>
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
            {{-- Parents --}}
            <div class="col-lg-12 mt-2">
                <div class="card shadow-sm">
                    <form action="/Mahasiswa/Store/OrangTua" method="POST">
                        @csrf
                        <div class="card-header text-center highlight-font fw-bold">
                            Identitas Orang Tua Mahasiswa
                        </div>
                        {{-- Alamat Mahasiswa --}}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-header text-center highlight-font fw-bold">
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
                                                class="col-sm-6 col-form-label text-start">Tanggal
                                                Lahir</label>
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
                                                    placeholder="Contoh: 0822-3072-XXXX">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-header text-center highlight-font fw-bold">
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
                                                class="col-sm-6 col-form-label text-start">Tanggal
                                                Lahir</label>
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
                                                    placeholder="Contoh: 0822-3072-XXXX">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if ($Account->parent == "")
                            <div>
                                <button type="submit" class="btn btn-success my-3 col-2">Simpan</button>
                                <a href="/Mahasiswa/Update/OrangTua"
                                    class="btn btn-secondary my-3 col-2 disabled">Update</a>
                            </div>
                            @else
                            <div>
                                <button type="submit" class="btn btn-secondary my-3 col-2 disabled">Simpan</button>
                                <a href="/Mahasiswa/Update/OrangTua/{{ $Account->id }}" class="btn btn-primary my-3 col-2">Update</a>
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection