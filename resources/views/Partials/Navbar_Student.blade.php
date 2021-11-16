<nav class="navbar navbar-expand navbar-dark shadow-sm" style="background-color: #68A6D1">
    <div class="container highlight-font">
        <a class="navbar-brand fw-bold">Hallo, {{ auth()->user()->nama_depan }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mx-1 mb-lg-0">
                <li class="nav-item mx-1">
                    <a class="btn btn-outline-light {{ ($Title === 'Beranda') ? 'active fw-bold' : '' }}"
                        href="/Beranda">Beranda</a>
                </li>
                <li class="nav-item mx-1">
                    <a class="btn btn-outline-light {{ ($Title === 'Mahasiswa') ? 'active fw-bold' : '' }}"
                        href="/Mahasiswa/Detail">Mahasiswa</a>
                </li>
                <li class="nav-item mx-1">
                    <a class="btn btn-outline-light {{ ($Title === 'Perkuliahan') ? 'active fw-bold' : '' }}"
                    href="/Kuliah/Detail">Perkuliahan</a>
                </li>
                <li class="nav-item mx-1">
                    <a class="btn btn-outline-light {{ ($Title === 'Transkrip Nilai') ? 'active fw-bold' : '' }}"
                        href="#">Transkrip Nilai</a>
                </li>
                <li class="nav-item mx-1">
                    <a class="btn btn-outline-light {{ ($Title === 'KRS') ? 'active fw-bold' : '' }}" href="/KRS/Detail">KRS</a>
                </li>
                <li class="nav-item mx-1">
                    <a class="btn btn-outline-light {{ ($Title === 'UKT') ? 'active fw-bold' : '' }}" href="#">UKT</a>
                </li>
            </ul>
            <span class="navbar-text">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <form action="/Logout" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger border-light"><i
                                    class="ph-arrow-bend-down-right-bold align-middle pe-3"></i>Logout</button>
                        </form>
                    </li>
                </ul>
            </span>
        </div>
    </div>
</nav>