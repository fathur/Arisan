@extends('layouts.back')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<h1>{{ trans('member.edit.title') }}</h1>
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
				{{ Form::label('member_number', trans('member.number.label'), ['class' => 'control-label']) }}
				{{ Form::text('member_number', null, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('member_name', trans('member.name.label'), ['class' => 'control-label']) }}
				{{ Form::text('member_name', null, ['class' => 'form-control']) }}
			</div>
		

			{{ Form::submit(trans('member.button.update'), ['class' => 'btn btn-primary']) }}
		{{ Form::close() }}
		
	</div>
</div>
@stop