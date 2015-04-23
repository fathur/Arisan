@extends('layouts.back')
@section('content')
<div class="row">
	<div class="col-sm-12 text-center">
		<div class="counter-holder">
			<div class="number" id="number-kocok">-</div>

			<div class="info hide" id="info-kocok">
				<div class="nama" id="win-nama"></div>		
				<div class="ba" id="win-ba"></div>
			</div>
		</div>
		<div class="counter-action">		
			<button class="btn btn-lg btn-success" id="btn-kocok">
				<span class="glyphicon glyphicon-play" aria-hidden="true"></span>
				Kocok
			</button>
			<div class="stop">
				<button class="btn btn-lg btn-danger hide" id="btn-stop">
					<span class="glyphicon glyphicon-stop" aria-hidden="true"></span>
					Stop
				</button>
				
			</div>
			<div class="reset">
				<a href="#" id="btn-reset" class="hide">Reset</a>
			</div>
		</div>
	</div>
</div>
@stop

@section('script')
<script type="text/javascript">

	var intervalId;

	$('#btn-kocok').click(function() {
		var $this = $(this);
		$this.addClass('disabled').html('Sabar...');
		$('#btn-reset').addClass('hide');
		$('#btn-stop').removeClass('hide').removeClass('disabled');

		intervalId = setInterval(function(){
			$.get("{{ URL::route('kocok.acak') }}", function(resp) {
				console.log(resp.undian_number);
				$('#number-kocok').html(resp.undian_number);
			});
		}, {{$interval}});
	});

	$('#btn-stop').click(function(){
		clearInterval(intervalId);
		$(this).addClass('disabled');
		$.get("{{ URL::route('kocok.menang') }}", function(resp) {
			console.log(resp);
			$('#number-kocok').html(resp.undian_number);
			$('#win-nama').html(resp.member_name);
			$('#win-ba').html(resp.member_number);
			
			$('#info-kocok').removeClass('hide')
				.css({
					'display': 'none'
				})
				.slideDown('slow');
			$('#btn-kocok').html('Selesai');
			$('#btn-reset').removeClass('hide');

		});
	});

	$('#btn-reset').click(function(e){
		e.preventDefault();
		$(this).addClass('hide');
		$('#number-kocok').html('-');
		$('#info-kocok').slideUp('slow', function(){
			$(this).addClass('hide');	
			$('#win-nama').html('');
			$('#win-ba').html('');
		});
		$('#btn-kocok').removeClass('disabled').html('Kocok');
		$('#btn-stop').addClass('hide');

	});
</script>
@stop