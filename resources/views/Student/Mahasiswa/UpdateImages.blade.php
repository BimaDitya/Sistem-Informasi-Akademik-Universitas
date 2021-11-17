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
        <div class="row justify-content-center py-4">
            <div class="col-lg-6 vertical-center">
                <div class="card shadow-sm">
                    <div class="card-header text-center highlight-font fw-bold">
                        Update Foto Profil Mahasiswa
                    </div>
                    <div class="card-body">
                        <form action="/Mahasiswa/Update/Image/{{ $Account->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- Input --}}
                            <div class="form-group d-flex justify-content-center"> 
                                <input type="hidden" name="oldImage" value="{{$Account->image->image}}">
                                @if ($Account->image == "")
                                <div class="card" style="width: 15REM; height:15REM; border-radius: 50%">
                                  <img src="{{ asset('/Images/Default.PNG') }}" class="card-img-top img-preview img-fluid" alt="Photo Profile">
                                </div>
                                @else
                                <div class="card" style="width: 15REM; height:15REM; overflow: hidden; border-radius: 50%">
                                  <img src="{{ asset('storage/'.$Account->image->image) }}" class="card-img-top img-preview img-fluid" alt="Photo Profile">
                                </div>
                                @endif
                              </div>
                            <div class="form-group d-flex justify-content-center mb-3">
                                <div class="input-group mt-2">
                                  <input type="file" name="image" class="form-control" id="image" onchange="imagesPreview()">
                                </div>
                              </div>
                            <div>
                                <button type="submit" class="btn btn-success col-2">Update</button>
                                <a href="/Mahasiswa/Detail/{{ $Account->id }}" class="btn btn-primary col-2">Kembali</a>
                            </div>
                        </form>
                    </div>
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
    <script>
    function imagesPreview() {
        var image = document.querySelector('#image');
        var imagesPreview = document.querySelector('.img-preview');

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function (oFREvent) {
            imagesPreview.src = oFREvent.target.result;
        }
    }
    </script>
</body>

</html>
