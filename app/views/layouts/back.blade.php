<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="sistem informasi e-performance ombudsman RI">
    <meta name="author" content="Lugas">
    <link rel="icon" href="../../favicon.ico">
	<title>Arisan</title>
	<script type="text/javascript">
	var baseUrl = "{{ URL::route('home') }}";
	</script>
	{{ HTML::style('css/bootstrap.css') }}
	{{ HTML::style('css/font-awesome.min.css') }}
	{{ HTML::style('css/main.css') }}

	@yield('styles')
	@yield('style')

</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ URL::route('home') }}">Arisan</a>
			</div>

			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li>{{ HTML::linkRoute('users.index','Users') }}</li>
					<li>{{ HTML::linkRoute('members.index', 'Members') }}</li>
					<li>{{ HTML::linkRoute('undian.index', 'Undian') }}</li>
					<li>{{ HTML::linkRoute('kocok.index', 'Kocok') }}</li>
				</ul>

				@if(Sentry::check())
				<ul class="nav navbar-nav navbar-right">
					<li>{{Html::linkRoute('auth.logout','Logout')}}</li>
				</ul>
				@endif 
			</div>
		</div>
	</nav>

	<div class="container">
		@yield('content')
	</div>

	{{ HTML::script('js/jquery-2.1.3.min.js') }}
	{{ HTML::script('js/bootstrap.min.js') }}

	@yield('scripts')
	@yield('script')
	
</body>
</html>