@extends('layouts.back')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<h1>Users</h1>
		{{ HTML::linkRoute('users.create', 'Add', [], ['class' => 'btn btn-primary']) }}
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		
		<table class="table table-condensed">
			<thead>
				<tr>
					<th>Email</th>
					<th>Nama</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr>
					<td>{{ HTML::linkRoute('users.show', $user->email, $user->id) }}</td>
					<td>{{ $user->first_name }} {{ $user->last_name }}</td>
					<td>
						{{ HTML::linkRoute('users.edit', 'Edit', $user->id, ['class' => 'btn btn-primary pull-right']) }}
						{{ Form::open(array('route' => ['users.destroy', $user->id], 'class' => ' pull-right', 'method' => 'DELETE')) }}
							{{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
						{{ Form::close() }}
					</td>
				</tr>
				@endforeach
		</table>
	</div>

</div>
@stop