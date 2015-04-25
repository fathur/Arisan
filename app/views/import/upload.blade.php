@extends('layouts.back')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<h2>Import</h2>
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