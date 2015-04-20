@extends('layouts.back')

@section('content')
<div class="row">

	<div class="col-sm-12">

		<h1>Daftar Anggota</h1>
		{{ Form::open(['route' => 'members.search']) }}
			<div class="col-sm-6">
			{{ Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Cari Nama atau Nomor Anggota']) }}
			</div>
			{{ Form::submit('Cari!', ['class' => 'btn btn-primary']); }}
		{{ Form::close() }}


	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		{{ HTML::linkRoute('members.create', 'Add', [], ['class' => 'btn btn-primary']) }}
		<table class="table table-condensed">
			<thead>
				<tr>
					<th>Nomor Anggota</th>
					<th>Nama</th>
				</tr>
			</thead>
			<tbody>
				@foreach($members as $member)
				<tr>
					<td>{{ HTML::linkRoute('members.show', $member->member_number, $member->id) }}</td>
					<td>{{ $member->member_name }}</td>
				</tr>
				@endforeach
		</table>
	</div>

</div>

<div class="row">
	<div class="col-sm-12">
		{{ $members->links(); }}
	</div>
</div>
@stop