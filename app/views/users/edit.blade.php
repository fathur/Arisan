@extends('layouts.back')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<h1>Create Users</h1>
		{{ Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT'] ) }}
			<div class="form-group">
				{{ Form::label('email', 'Email', ['class' => 'control-label']) }}
				{{ Form::text('email', null, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('first_name', 'Nama Depan', ['class' => 'control-label']) }}
				{{ Form::text('first_name', null, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('last_name', 'Nama Belakang', ['class' => 'control-label']) }}
				{{ Form::text('last_name',  null, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('password', 'Password', ['class' => 'control-label']) }}
				{{ Form::password('password', ['class' => 'form-control']) }}
			</div>

			{{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
		{{ Form::close() }}
		
	</div>
</div>
@stop