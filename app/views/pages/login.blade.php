@extends('layout.default')

@section('content')
	<div class="col-md-6">
		<h1>Login!</h1>

		@if($errors)
			@foreach($errors->all('<div class="alert alert-danger" role="alert">:message</div>') as $message)
				{{ $message }}
			@endforeach
		@endif


		{{ Form::open(array('url' => '/login')) }}

		<div class="form-group">
			{{ Form::label('username', 'Username') }}
			{{ Form::text('username', null, array('class' => 'form-control', 'required' => 'required')) }}
		</div>

		<div class="form-group">
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password', array('class' => 'form-control', 'required' => 'required')) }}
		</div>

		<div class="form-group">
			{{ Form::submit('Log me in!', array('class' => 'btn btn-primary'))  }}
		</div>
	</div>
@stop