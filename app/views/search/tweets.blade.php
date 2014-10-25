@extends('layout.default')

@section('content')
	<div class="row">	
		<div class="col-md-6 col-md-offset-3">
			@include('partials.tweets', $tweets)
		</div>
	</div>

@stop