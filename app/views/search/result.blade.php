@extends('layouts.front')

@section('style')
<style type="text/css">
	
.search-container {
	margin-top: 100px;
}
.search-result a.item{
	padding: 10px;
	display: block;
	text-decoration: none;
	border-bottom: 1px solid #CCC;
}
.search-result a.item:hover{
	background-color: #F8F8F8;
}
.search-result .item > .title {
	display: inline-block;
	float: left;
	margin-right: 10px;
}
.search-result .item > .name {
	display: inline-block;
	float: left;

}

</style>
@stop

@section('content')
<div class="row">
	<div class="col-sm-12 text-center">
		<h2>Pencarian</h2>

		<div class="search-container">
			{{ Form::open(['route' => 'search.result', 'method' => 'GET']) }}
				<div class="form-group">
					{{ Form::text('search', $search, ['class' => 'form-control input-lg', 'placeholder' => 'Cari nama, nomor anggota, atau nomor undian']) }}
				</div>
			{{ Form::close() }}
		</div>
		
	</div>
</div>

{{--
@if($memberCount == 0)
<div class="row text-center">
	<div class="col-sm-12">
		<h3>{{ $message }}</h3>	
	</div>
</div>
@else
<div class="row text-center">
	<div class="col-sm-12">
		<h3>{{ $member->member_name }}</h3>
	</div>
</div>

<div class="row text-center">

	@foreach($member->undians as $undian)
	<div class="col-sm-4">
		<div class="alert alert-info">{{$undian->undian_number}}</div>
	</div>
	@endforeach
	
</div>
@endif
--}}

<div class="row search-result">
	<div class="col-sm-12">
		@foreach($results as $result)
		<a href="{{ URL::route('search.member', $result['num'])}}?search={{Input::get('search') }}" class="item">
			<div class="item">
				<div class="title">{{ $result['key'] }}:</div>
				<div class="content">{{ $result['val'] }}</div>
			</div>
		</a>
		@endforeach
	</div>
</div>

@stop