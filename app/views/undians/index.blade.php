@extends('layouts.back')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<h2>Daftar Nomor Undian</h2>
	</div>

	<div class="col-sm-12">
		{{ Form::open(['route' => 'undian.search']) }}
			{{ Form::text('search') }}
			{{ Form::select('kocok', array('all' => 'Semua', 1 => 'Sudah Dapat', 0 => 'Belum Dapat')) }}
			{{ Form::submit('Filter') }}
		{{ Form::close() }}

	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Nomor Undian</th>
					<th>Pemilik Nomor</th>
					<th>Dikocok</th>
					<th>Tanggal Dikocok</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($undians as $undian)
				<tr>
					<td>{{ $undian->undian_number }}</td>
					<td>{{ HTML::linkRoute('members.show', $undian->member_name, $undian->member_id) }}</td>
					<td>{{ $undian->dikocok }}</td>
					<td>{{ $undian->dikocok_date }}</td>
					<td></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		{{ $undians->links(); }}
	</div>
</div>
@stop