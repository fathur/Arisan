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


<div class="row text-center">
	<div class="col-sm-12">
		<h3>{{ $member->member_name }}</h3>
		<h4>({{ $member->member_number }})</h4>
	</div>
</div>

<div class="row information">
	<div class="col-sm-4 text-center">
		<div class="alert alert-warning">
			<h4>Total Undian</h4>
			<h3>
				{{$status['total']}}
			</h3>
		</div>
	</div>
	<div class="col-sm-4 text-center">
		<div class="alert alert-warning">
			<h4>Sudah Dikocok</h4>
			<h3>
				{{$status['sudah']}}
			</h3>
		</div>
	</div>
	<div class="col-sm-4 text-center">
		<div class="alert alert-warning">
			<h4>Belum Dikocok</h4>
			<h3>
				{{$status['belum']}}
			</h3>
		</div>
	</div>
</div>

<div class="row text-center">

	@foreach($member->undians as $undian)
	<div class="col-sm-4">
		@if($undian->dikocok)
		<div class="alert alert-danger">{{$undian->undian_number}}</div>
		@else
		<div class="alert alert-info">{{$undian->undian_number}}</div>
		@endif
	</div>
	@endforeach
	
</div>
@stop