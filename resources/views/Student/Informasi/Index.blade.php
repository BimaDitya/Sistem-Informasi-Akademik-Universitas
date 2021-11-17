@extends('Student.MainStudent')
@section('Contents')
{{-- Content --}}
{{-- Data Mahasiswa --}}
	<table class="table table-lg table-hover table-bordered shadow">
		<thead>
			<tr class="table-secondary text-center">
				<th>Nominal</th>
				<th>Tahun Ajaran</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<tr class="table-light text-center align-middle">
			@foreach ($Payment as $Item)
				<td>Rp. {{ number_format($Item->nominal, 0, ".", ".") ?? ''}}</td>
				<td>{{ $Item->tahun ?? '' }}</td>
				<td>{{ $Item->status ?? '' }}</td>
			@endforeach
			</tr>
		</tbody>
	</table>
{{-- Content --}}
@endsection