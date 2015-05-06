@extends('layouts.back')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<h1>{{ trans('member.create.title') }}</h1>
		{{ Form::open(['route' => 'members.store']) }}
			<div class="form-group">
				{{ Form::label('member_number', trans('member.number.label'), ['class' => 'control-label']) }}
				{{ Form::text('member_number', null, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('member_name', trans('member.name.label'), ['class' => 'control-label']) }}
				{{ Form::text('member_name', null, ['class' => 'form-control']) }}
			</div>
		

			{{ Form::submit(trans('member.button.save'), ['class' => 'btn btn-primary']) }}
		{{ Form::close() }}
		
	</div>
</div>
@stop