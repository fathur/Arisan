@extends('layouts.back')
@section('content')
<div class="row">
	<div class="col-sm-12 text-center">
		<div class="counter-holder">
			<div class="number" id="number-kocok">-</div>

			<div class="info hide" id="info-kocok">
				<div class="nama" id="win-nama">Fathur Rohman</div>		
				<div class="ba" id="win-ba">9292399.303030</div>
			</div>
		</div>
		<div class="counter-action">		
			<button class="btn btn-lg btn-success" id="btn-kocok">Kocok</button>
			<div class="reset">
				<a href="#" id="btn-reset" class="hide">Reset</a>
			</div>
		</div>
	</div>
</div>
@stop

@section('script')
<script type="text/javascript">
	$('#btn-kocok').click(function() {
		var $this = $(this);
		$this.addClass('disabled').html('Sabar...');
		$('#btn-reset').addClass('hide');

		var intervalIdFirst = setInterval(function(){
			$.get("{{ URL::route('kocok.acak') }}", function(resp) {
				console.log(resp.undian_number);
				$('#number-kocok').html(resp.undian_number);
			});
		}, {{$interval}});

		setTimeout(function(){
			clearInterval(intervalIdFirst);
		}, {{$timeout}});

		{{-- Mendapatkan orang yang mendapat undian pada kocokan kali ini --}}
		setTimeout(function(){
			$.get("{{ URL::route('kocok.acak') }}", function(resp) {
				console.log(resp);
				$('#number-kocok').html(resp.undian_number);
				$('#win-nama').html(resp.member_name);
				$('#win-ba').html(resp.member_number);
				
				$('#info-kocok').removeClass('hide')
					.css({
						'display': 'none'
					})
					.slideDown('slow');
				$this.html('Selesai');
				$('#btn-reset').removeClass('hide');

			});


		}, {{$timeout}} + 100);
	});

	$('#btn-reset').click(function(e){
		e.preventDefault();
		$('#number-kocok').html('-');
		$('#info-kocok').slideUp('slow', function(){
			$(this).addClass('hide');	
			$('#win-nama').html('');
			$('#win-ba').html('');
		});
		$('#btn-kocok').removeClass('disabled').html('Kocok');
		$(this).addClass('hide');

	});
</script>
@stop