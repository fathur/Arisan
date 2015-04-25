@extends('layouts.back')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<h2>Daftar Nomor Undian</h2>
	</div>	
</div>

<div class="row">
	<div class="col-sm-4 text-center">
		<div class="alert alert-info">
			<h3>Total Undian</h3>
			<h2>{{ $status['total'] }}</h2>
		</div>
	</div>
	<div class="col-sm-4 text-center">
		<div class="alert alert-success">
			<h3>Sudah Dapat</h3>
			<h2>{{ $status['sudah'] }}</h2>
		</div>
	</div>
	<div class="col-sm-4 text-center">
		<div class="alert alert-danger">
			<h3>Belum Dapat</h3>
			<h2>{{ $status['belum'] }}</h2>
		</div>
	</div>
</div>

<div class="row">
	{{ Form::open(['route' => 'undian.search']) }}
	
	<div class="col-sm-6">
		{{ Form::text('search', null, [
			'class' => 'form-control',
			'placeholder' => 'Cari nomor undian atau nama'
		]) }}
	</div>

	<div class="col-sm-6">
		<div class="input-group">
			{{ Form::select('kocok', array('all' => 'Semua', 1 => 'Sudah Dapat', 0 => 'Belum Dapat'), null, ['class' => 'form-control']) }}
			<span class="input-group-btn">
				{{ Form::submit('Filter', ['class' => 'btn btn-primary']) }}
			</span>
		</div>
	</div>

	{{ Form::close() }}
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
					{{-- <th>Action</th> --}}
				</tr>
			</thead>
			<tbody>
				@foreach($undians as $undian)
				<tr>
					<td>{{ $undian->undian_number }}</td>
					<td>{{ HTML::linkRoute('members.show', $undian->member->member_name, $undian->member->id) }}</td>
					<td>
					@if($undian->dikocok)
						<div class="btn btn-success btn-xs disabled">sudah</div>
						<a href="{{ route('undian.undo', $undian->undian_id) }}" class="btn btn-danger btn-xs">
							<span class="glyphicon glyphicon-repeat"></span>
							 Batal
						</a>
					@else
						<div class="btn btn-danger btn-xs disabled">belum</div>
					@endif
					</td>
					<td>{{ $undian->dikocok_date }}</td>
					{{-- <td></td> --}}
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