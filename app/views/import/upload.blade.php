@extends('layouts.back')

@section('content')
<div class="row">
	<div class="col-sm-12">
		{{ Form::open(array('route' => 'import.upload', 'files'=>true)) }}
			Input your sheet
			{{ Form::file('sheet') }}
			{{ Form::submit('Import') }}
		{{ Form::close() }}
	</div>
</div>
@stop