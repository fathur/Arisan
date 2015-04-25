@extends('layouts.back')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<h2>Daftar Nomor Undian</h2>
	</div>	
</div>

<div class="row">
	<div class="col-sm-12">
		<!-- will be used to show any messages -->
		@if (Session::has('message'))

		<div class="alert {{ Session::get('alertClass') }} alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			{{ Session::get('message') }}
		</div>
		@endif
	</div>
</div>

<div class="row information">
	<div class="col-sm-4 text-center">
		<div class="alert alert-info">
			<h3>Total Undian</h3>
			<h2>
				<a href="{{ URL::route('undian.search') }}?kocok=all">{{$status['total']}}</a>		
			</h2>
		</div>
	</div>
	<div class="col-sm-4 text-center">
		<div class="alert alert-success">
			<h3>Sudah Dapat</h3>
			<h2>
				<a href="{{ URL::route('undian.search') }}?kocok=1">{{$status['sudah']}}</a>		
			</h2>
		</div>
	</div>
	<div class="col-sm-4 text-center">
		<div class="alert alert-danger">
			<h3>Belum Dapat</h3>
			<h2><a href="{{ URL::route('undian.search') }}?kocok=0">{{$status['belum']}}</a></h2>
		</div>
	</div>
</div>

<div class="row">
	{{ Form::open(['route' => 'undian.search', 'method' => 'GET']) }}
	
	<div class="col-sm-6">
		{{ Form::text('search', Input::get('search'), [
			'class' => 'form-control',
			'placeholder' => 'Cari nomor undian atau nama'
		]) }}
	</div>

	<div class="col-sm-6">
		<div class="input-group">
			{{ Form::select('kocok', array('all' => 'Semua', 1 => 'Sudah Dapat', 0 => 'Belum Dapat'), Input::get('kocok'), ['class' => 'form-control']) }}
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
					<td>{{ HTML::linkRoute('members.show', $undian->member_name, $undian->member_id) }}</td>
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
		{{ $undians->appends(array('kocok' => Input::get('kocok')))->links(); }}
	</div>
</div>
@stop