@extends('layouts.back')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<h2>{{ trans('import.title') }}</h2>
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
			<label for="sheet">{{ trans('import.upload.label') }}</label>
			{{ Form::file('sheet') }}
			<p class="help-block">{{ trans('import.upload.remark') }}</p>
		</div>
			
			{{ Form::submit(trans('import.upload.button'), ['class' => 'btn btn-default']) }}
		{{ Form::close() }}
	</div>
</div>
@stop