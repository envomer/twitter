<!DOCTYPE html>
<html>
<head>
	<title>Twitter</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

	@include('partials.navbar')

	<div class="container">
		@if( Session::has('flash_message') )
			<div class="alert alert-info" role="alert">{{ Session::get('flash_message') }}</div>
		@endif
		
		@yield('content')
	</div>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>