@extends('layouts.back')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<h1>{{$member->member_name}}</h1>
		{{ HTML::linkRoute('members.edit', 'Edit', $member->id, ['class' => 'btn btn-primary pull-left']) }}
		{{ Form::open(array('route' => ['members.destroy', $member->id], 'class' => ' pull-right', 'method' => 'DELETE')) }}
			{{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
		{{ Form::close() }}
	</div>
</div>
<div class="row">
	<div class="col-sm-12">

		<table class="table table-condensed table-bordered">
			<thead>
				<tr>
					<th>Nomor Undian</th>
					<th>Tanggal Mendapatkan Undian</th>
				</tr>
			</thead>

			<tbody>
				@foreach($member->undians as $undian)
				<tr>
					<td>{{$undian->undian_number}}</td>
					@if($undian->dikocok)
					<td>{{$undian->dikocok_date}}</td>
					@else
					<td> - </td>
					@endif
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop