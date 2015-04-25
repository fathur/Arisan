@extends('layouts.back')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<h1>Edit Member</h1>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		{{ Form::model($member, ['route' => ['members.update', $member->id], 'method'=>'PUT']) }}
			<div class="form-group">
				{{ Form::label('member_number', 'Nomor Anggota', ['class' => 'control-label']) }}
				{{ Form::text('member_number', null, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('member_name', 'Nama', ['class' => 'control-label']) }}
				{{ Form::text('member_name', null, ['class' => 'form-control']) }}
			</div>
		

			{{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
		{{ Form::close() }}
		
	</div>
</div>
@stop