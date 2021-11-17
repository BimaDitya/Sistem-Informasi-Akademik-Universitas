<!doctype html>
<html lang="en">

<head>
	@include('Partials.Head_Student')
</head>

<body>

	{{-- Navbar --}}
	<header>
		@include('Partials.Navbar_Student')
	</header>
	{{-- Navbar --}}

	{{-- Content --}}
	<div class="container-lg py-2">
		@yield('Contents')
	</div>
	{{-- Content --}}

	</div>
	@include('Partials.JavaScript')
	
</body>

</html>