@extends('Student.MainStudent')
@section('Contents')
    
<<<<<<< HEAD
@endsection
=======
    <!-- Custom Styles -->
    <link href="Style/MyStyle.css" rel="stylesheet">

    @include('Partials.Icons')
  </head>

  <body>
    {{-- navbar --}}
    <header>
      @include('Partials.Navbar')
    </header>

    {{-- content --}}
    <main>
      <div class="row h-100 justify-content-center py-4 px-2">
        {{-- Upload image --}}
        <div class="col-7">
            {{-- Notify --}}
            @if (session('Berhasil'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('Berhasil') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show my-2" role="alert">
                Gagal Menyimpan Data. Format file (.jpg, .jpeg, .png). Ukuran Image (max : 1024KB)
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            

            <div class="card shadow-sm">
              <form action="/Beranda/Store/Image" method="POST" enctype="multipart/form-data">
                @csrf
                <h3 class="text-center pt-3">{{ auth()->user()->nama_depan }} {{ auth()->user()->nama_belakang }}</h3>
                <div class="text-center">
                  <div class="form-group d-flex justify-content-center"> 
                    @if ($Data->image == "")
                      <div class="card" style="width: 20vw;">
                        <img src="https://image.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg" class="card-img-top" alt="defaulf-image" style="max-width: 20vw">
                      </div>
                    @else
                      <div class="card" style="width: 20vw; max-height: 20vw; overflow: hidden;">
                        <img src="{{ asset('storage/' . $Data->image->image)}}" class="card-img-top" alt="user-image" style="max-width: 20vw; ">
                      </div>
                    @endif
                  </div>
                  <div class="form-group">
                    <div>
                      @if ($Data->image == "")
                        <div class="form-group d-flex justify-content-center">
                          <div class="input-group mt-3" style="width: 50%";>
                            <input type="file" name="image" class="form-control" >
                          </div>
                        </div>
                        <div>
                          <button type="submit" class="btn btn-success my-2 col-3" data-bs-toggle="modal">Simpan</button>
                          <a href="/Beranda/Update/" class="btn btn-secondary my-4 col-3 disabled">Update</a>
                        </div>
                      @else
                        <div>
                          <button type="submit" class="btn btn-secondary my-2 col-3 disabled">Simpan</button>
                          <a href="/Beranda/Update/" class="btn btn-primary my-4 col-3">Update</a>
                        </div>
                      @endif
                    </div>
                  </div>
                </div>
              </form>
            </div>  
        </div>      
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
  </body>
</html>
>>>>>>> f82d46f2c28227eac089cdb5df1a4a81750c9b59
