@extends('Student.MainStudent')
@section('Contents')
<main>
  <div class="row h-100 justify-content-center py-4 px-2">

    {{-- Upload image --}}
    <div class="col-lg">
      {{-- Notify --}}
      @if (session('Berhasil'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('Berhasil') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      {{-- Notify --}}
      @if ($errors->any())
      <div class="alert alert-danger alert-dismissible fade show my-2" role="alert">
        Gagal Menyimpan Data. Format file (.jpg, .jpeg, .png). Ukuran Image (max : 1024KB)
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      {{-- Notify --}}

          
        <div class="card shadow" style="width: 18REM;">
          <img src="{{ asset('storage/' . $Image->image) }}" class="card-img-top" alt="...">
          <div class="card-body">
          <h5 class="card-title highlight-font fw-bold">{{ auth()->user()->nama_depan }} {{ auth()->user()->nama_belakang }}</h5>
            <p class="card-text">Pendidikan Teknologi Informasi.
            </p>
          </div>
        </div>
      
    </div>
</main>
@endsection