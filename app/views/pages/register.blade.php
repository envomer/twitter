@extends('layout.default')

@section('content')
	<div class="col-md-6">
		<h1>Register!</h1>

		@if($errors)
			@foreach($errors->all('<div class="alert alert-danger" role="alert">:message</div>') as $message)
				{{ $message }}
			@endforeach
		@endif


		{{ Form::open(array('url' => '/register')) }}

		<div class="form-group">
			{{ Form::label('username', 'Username') }}
			{{ Form::text('username', null, array('class' => 'form-control', 'required' => 'required')) }}
		</div>

		<div class="form-group">
			{{ Form::label('email', 'Email') }}
			{{ Form::text('email', null, array('class' => 'form-control', 'required' => 'required')) }}
		</div>

		<div class="form-group">
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password', array('class' => 'form-control', 'required' => 'required')) }}
		</div>

		<div class="form-group">
			{{ Form::label('password_confirmation', 'Password Confirmation') }}
			{{ Form::password('password_confirmation', array('class' => 'form-control', 'required' => 'required')) }}
		</div>

		<div class="form-group">
			{{ Form::submit('Sign me up!', array('class' => 'btn btn-primary'))  }}
		</div>
	</div>
@stop