@extends('layouts.back')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<h1>Users</h1>
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

<div class="row">
	<div class="col-sm-12">
		{{ HTML::linkRoute('users.create', 'Add', [], ['class' => 'btn btn-primary']) }}
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		
		<table class="table table-condensed table-striped table-hover">
			<thead>
				<tr>
					<th>Email</th>
					<th>Nama</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr>
					<td>{{ HTML::linkRoute('users.show', $user->email, $user->id) }}</td>
					<td>{{ $user->first_name }} {{ $user->last_name }}</td>
					<td>
						{{ HTML::linkRoute('users.edit', 'Edit', $user->id, ['class' => 'btn btn-primary pull-right btn-xs']) }}
						{{ Form::open(array('route' => ['users.destroy', $user->id], 'class' => ' pull-right', 'method' => 'DELETE')) }}
							{{ Form::submit('Delete', array('class' => 'btn btn-warning btn-xs')) }}
						{{ Form::close() }}
					</td>
				</tr>
				@endforeach
		</table>
	</div>

</div>
@stop