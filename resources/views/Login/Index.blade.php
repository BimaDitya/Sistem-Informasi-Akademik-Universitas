@extends('Login.MainLogin')
@section('Contents')
    <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 vertical-center">
                        <div class="align-self-center">
                            <div class="card py-2 px-4 shadow">
                                <main class="form-signin text-center">
                                    <h1 class="login-heading-font display-6 py-3">Selamat Datang</h1>
                                    <form action="/" method="POST">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input type="number" title="Masukkan No. Identitas" name="no_id" id="no_id" class="form-control"
                                                placeholder="Nomor Identitas" autofocus required>
                                            <label for="no_id">Nomor Identitas</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" pattern=".{8,}" title="Minimal 8 Atau Lebih" name="password"
                                                id="password" class="form-control" placeholder="Password" required>
                                            <label for="password">Kata Sandi</label>
                                        </div>
                                        <button class="col-12 btn btn-lg btn-primary highlight-font mb-3"
                                            type="submit">Masuk</button>
                                    </form>
                                </main>
                            </div>
                            @if (session('Gagal'))
                            <div class="alert alert-danger alert-dismissible fade show my-2" role="alert">
                                {{ session('Gagal') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </main>
@endsection