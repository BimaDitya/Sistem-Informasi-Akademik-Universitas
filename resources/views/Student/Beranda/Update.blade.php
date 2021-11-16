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
                        Update Foto Profil Mahasiswa
                    </div>
                    <div class="card-body">
                        <a href="/Beranda" class="btn btn-primary col-4">Kembali</a>
                        <form action="/Beranda/Update/Image" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- Input --}}
                            <div class="form-group d-flex justify-content-center mt-3"> 
                                <input type="hidden" name="oldImage" value="{{$Data->image->image}}">
                                @if ($Data->image == "")
                                  <div class="card" style="width: 20vw;">
                                    <img src="https://image.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg" class="card-img-top" alt="defaulf-image" style="width: 20vw">
                                  </div>
                                @else
                                  <div class="card" style="width: 20vw;  max-height: 20vw; overflow: hidden;">
                                    <img src="{{ asset('storage/' . $Data->image->image)}}" class="card-img-top" alt="user-image" style="max-width: 20vw;">
                                  </div>
                                @endif
                              </div>
                            <div class="form-group d-flex justify-content-center mb-3">
                                <div class="input-group mt-3" style="width: 50%";>
                                  <input type="file" name="image" class="form-control">
                                </div>
                              </div>
                            <div>
                                <button type="submit" class="btn btn-success col-4">Update</button>
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
