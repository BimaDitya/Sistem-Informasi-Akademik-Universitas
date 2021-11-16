<!doctype html>
<html lang="en">

<head>
	@include('Partials.Head_Student')
</head>

<body>
	{{-- Content --}}
	<div class="container-lg py-2">
		@yield('Contents')
	</div>
	{{-- Content --}}

	</div>
	@include('Partials.JavaScript')
</body>

</html>