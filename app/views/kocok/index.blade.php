@extends('layouts.back')

@section('content')
<div class="row">
	<div class="col-sm-12 text-center">
		<div class="counter-holder">
			<button class="btn btn-lg btn-success" id="btn-kocok">Kocok</button>
			<div class="hide number" id="number-kocok"></div>		
		</div>
	</div>
</div>
@stop

@section('script')
<script type="text/javascript">
	$('#btn-kocok').click(function() {
		var $this = $(this);
		$this.addClass('disabled').html('Sabar...');

		$.get("{{ URL::route('kocok.random') }}", function(resp) {
			//console.log(resp.undian_number);
			$this.fadeOut('slow', function() {
				$('#number-kocok').removeClass('hide');

				$('#number-kocok').html(resp.undian_number);
				/*setInterval( function() {
				}, 100);*/
			});
		});
	});
</script>
@stop