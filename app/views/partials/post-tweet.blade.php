<div class="panel panel-default">
	{{ Form::open(array('url' => '/tweet')) }}
		<div class="panel-body">
			<p class="lead">Post a Tweet</p>
			@if($errors)
				@foreach($errors->all('<div class="alert alert-danger" role="alert">:message</div>') as $message)
					{{ $message }}
				@endforeach
			@endif
			<?php $u = (isset($user)) ? '@' . $user->username . ' ' : null; ?>
			{{ Form::textarea('tweet', $u , array('class' => 'form-control', 'rows' => 3, 'placeholder' => 'Write something funny....', 'required' => 'required')) }}
		</div>
		
		<div class="panel-footer">
			{{ Form::submit('Tweet!', array('class' => 'btn btn-success')) }}
		</div>
	{{ Form::close() }}
</div>