<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Mahasiswa | {{ $Title }}</title>

    <!-- Bootstrap Core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Custom Style -->
    <link href="{{ asset('Style/MyStyle.css') }}" rel="stylesheet">
    <script src="{{ asset('JavaScript/MyJavaScript.js') }}"></script>

    {{-- Icon --}}
    <script src="https://unpkg.com/phosphor-icons"></script>
</head>

<body>
    {{-- Navbar --}}
    <header>
        @include('Partials.Navbar')
    </header>
    {{-- Navbar --}}
    {{-- Content --}}
    <div class="container p-4">
        {{-- Data Mahasiswa --}}
        <div class="card p-2">
            <label for="Jenis Kelamin" class="col-sm-4 col-form-label text-start">Jenis Kelamin</label>
            <div class="form-group">
                <label>Select2 Multiple</label>
                <select class="form-control select2-container" multiple="">
                    <option>Option 1</option>
                    <option>Option 2</option>
                    <option>Option 3</option>
                    <option>Option 4</option>
                    <option>Option 5</option>
                    <option>Option 6</option>
                </select>
            </div>
        </div>
    </div>
    {{-- Content --}}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
