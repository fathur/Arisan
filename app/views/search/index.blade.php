@extends('layouts.front')

@section('style')
<style type="text/css">
	
.search-container {
	margin-top: 100px;
}
</style>
@stop

@section('content')
<div class="row">
	<div class="col-sm-12 text-center">
		<h2>Pencarian</h2>

		<div class="search-container">
			{{ Form::open(['route' => 'search.result', 'method' => 'GET']) }}
				<div class="form-group">
					{{ Form::text('search', null, ['class' => 'form-control input-lg', 'placeholder' => 'Cari nama, nomor anggota, atau nomor undian']) }}
				</div>
			{{ Form::close() }}
		</div>
		
	</div>
</div>
@stop