@extends('layouts.back')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<h1>Daftar Anggota</h1>
	</div>
</div>

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
		{{ Form::open(['route' => 'members.search', 'method' => 'GET']) }}
		<div class="input-group">
			{{ Form::text('search', Input::get('search'), ['class' => 'form-control', 'placeholder' => 'Cari Nama atau Nomor Anggota']) }}
			<span class="input-group-btn">
				{{ Form::submit('Cari!', ['class' => 'btn btn-primary']); }}
			</span>
		</div>
		{{ Form::close() }}
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		{{ HTML::linkRoute('members.create', 'Add', [], ['class' => 'btn btn-primary']) }}
	</div>
	<div class="col-sm-6">
		<buttoon id="destroy-members" class="pull-right btn btn-danger" data-toggle="modal" data-target="#modalDestroyMembers">
			<span class="glyphicon glyphicon-warning-sign"></span> Destroy
		</buttoon>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<table class="table table-condensed">
			<thead>
				<tr>
					<th>Nomor Anggota</th>
					<th>Nama</th>
					<th>Voucher</th>
				</tr>
			</thead>
			<tbody>
				@foreach($members as $member)
				<tr>
					<td>{{ HTML::linkRoute('members.show', $member->member_number, $member->id) }}</td>
					<td>{{ $member->member_name }}</td>
					<td>{{ count($member->undians) }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		{{ $members->appends(array('search' => Input::get('search')))->links(); }}
	</div>
</div>

<div class="modal fade" id="modalDestroyMembers" tabindex="-1" role="dialog" aria-labelledby="modalDestroyMembersLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="modalDestroyMembersLabel">Modal title</h4>
			</div>
			<div class="modal-body">
				Apakah Anda yakin mau menghapus semua anggota tanpa tersisa?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
				<a href="{{ route('members.truncate') }}" class="btn btn-danger" id="destroy-members">Ya</a>
			</div>
		</div>
	</div>
</div>
@stop

@section('script')
<script type="text/javascript">
	$('#destroy-members').click(function (e) {
		
	})
</script>
@stop