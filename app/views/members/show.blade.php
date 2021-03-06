@extends('layouts.back')

@section('content')
<div class="row">
	<div class="col-sm-12">
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
		<h1>{{$member->member_name}}</h1>
		<h3>{{$member->member_number}}</h3>
	</div>
</div>
<div class="row">
	<div class="col-sm-6">
		<div class="btn-group" role="group" aria-label="memberaction">
			{{ HTML::linkRoute('members.edit', 'Edit', $member->id, ['class' => 'btn btn-primary pull-left']) }}
			{{ HTML::linkRoute('undian.generate', 'Generate Nomor Undian', $member->member_number, ['class' => 'btn btn-primary pull-left']) }}
		</div>
	</div>
	<div class="col-sm-6">
		{{ Form::open(array('route' => ['members.destroy', $member->id], 'class' => ' pull-right', 'method' => 'DELETE')) }}
			{{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
		{{ Form::close() }}
	</div>
</div>
<div class="row">
	<div class="col-sm-12">

		<table class="table table-condensed table-striped">
			<thead>
				<tr>
					<th>Nomor Undian</th>
					<th>Tanggal Mendapatkan Undian</th>
					<th></th>

				</tr>
			</thead>

			<tbody>
				@foreach($member->undians as $undian)
				<tr>
					<td>{{$undian->undian_number}}</td>
					<td>
					@if($undian->dikocok)
					{{$undian->dikocok_date}}
					@else
					-
					@endif
					<td>
					@if(!$undian->dikocok)
						{{ Form::open(array('route' => ['members.undian.destroy', $member->id, $undian->id], 'class' => ' pull-right', 'method' => 'DELETE')) }}
							{{ Form::submit('Delete', array('class' => 'btn btn-danger btn-xs')) }}
						{{ Form::close() }}
					@else
					-
					@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop