@extends('layouts.back')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<h2>Import</h2>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<!-- will be used to show any messages -->
		@if (Session::has('message'))
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			{{ Session::get('message') }}
		</div>
		@endif
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		{{ Form::open(array('route' => 'import.upload', 'files'=>true)) }}
		<div class="form-group">
			<label for="sheet">Input your sheet</label>
			{{ Form::file('sheet') }}
			<p class="help-block">Hanya menerima file *.xlsx</p>
		</div>
			
			{{ Form::submit('Import', ['class' => 'btn btn-default']) }}
		{{ Form::close() }}
	</div>
</div>
@stop