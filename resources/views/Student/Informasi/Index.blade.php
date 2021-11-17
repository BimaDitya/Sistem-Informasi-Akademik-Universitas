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
				<td>Rp. {{ $Account->$Payment->nominal ?? ''}}</td>
				<td>{{ $Account->$Payment->tahun ?? '' }}</td>
				<td>{{ $Account->$Payment->status ?? '' }}</td>
			</tr>
		</tbody>
	</table>
{{-- Content --}}
@endsection