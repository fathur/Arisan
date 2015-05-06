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
				{{ trans('shake.start') }}
			</button>
			<div class="stop">
				<button class="btn btn-lg btn-danger hide" id="btn-stop">
					<span class="glyphicon glyphicon-stop" aria-hidden="true"></span>
					{{ trans('shake.stop') }}
				</button>
				
			</div>
			<div class="reset">
				<a href="#" id="btn-reset" class="hide">{{ trans('shake.reset') }}</a>
			</div>
		</div>
	</div>
</div>
@stop

@section('script')
<script type="text/javascript">

	var intervalId,
		undian_number,
		member_name,
		member_number;

	$('#btn-kocok').click(function() {
		var $this = $(this);
		$this.addClass('disabled').html("{{ trans('shake.wait') }}...");
		$('#btn-reset').addClass('hide');
		$('#btn-stop').removeClass('hide').removeClass('disabled');

		$.get("{{ URL::route('kocok.undian') }}", function(resp) {
			//console.log(typeof(parseInt(resp[0])));
			intervalId = setInterval(function() {
				var randomUndian = parseInt(resp[Math.floor(Math.random() * resp.length)]);
				$('#number-kocok').html(randomUndian);
				undian_number = randomUndian;
				
			}, {{ $interval }});
		});
	});

	$('#btn-stop').click(function(){
		
		clearInterval(intervalId);
		
		$(this).addClass('disabled');
		$.get("{{ URL::to('/') }}/kocok/menang/" + undian_number, function(resp) {
			$('#number-kocok').html(resp[0].undian_number);
			$('#win-nama').html(resp[0].member.member_name);
			$('#win-ba').html(resp[0].member.member_number);
			
			$('#info-kocok').removeClass('hide')
				.css({
					'display': 'none'
				})
				.slideDown('slow');
			$('#btn-kocok').html("{{ trans('shake.finish') }}");
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
		$('#btn-kocok').removeClass('disabled').html("{{ trans('shake.start') }}");
		$('#btn-stop').addClass('hide');

	});
</script>
@stop