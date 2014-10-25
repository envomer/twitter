@extends('layout.default')

@section('content')

	<div class="row">
		
		<div class="col-md-6 col-md-offset-3">

			<div class="media">
				<a class="pull-left" href="/user/{{$user->username}}">
					<img class="media-object" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCI+PHJlY3Qgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0IiBmaWxsPSIjZWVlIi8+PHRleHQgdGV4dC1hbmNob3I9Im1pZGRsZSIgeD0iMzIiIHk9IjMyIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjEycHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+NjR4NjQ8L3RleHQ+PC9zdmc+" alt="Profile Image">
				</a>
				<div class="media-body">
					<h1 class="media-heading">{{$user->username}}</h1>
					<ul class="nav nav-pills">
						<li><a href="/user/{{$user->username}}/following">Following</a></li>
						<li><a href="/user/{{$user->username}}/followers">Followers</a></li>
					</ul>
					@if($currentUser && $user->isFollowedBy($currentUser))
						{{Form::open(array('url' => '/follow/' . $user->id, 'method' => 'DELETE'))}}
							{{ Form::submit('Unfollow ' . $user->username, array('class' => 'btn btn-danger')) }}
						{{Form::close()}}
					@elseif( $currentUser && $user != $currentUser )
						{{Form::open(array('url' => '/follow'))}}
							{{ Form::hidden('userToFollow', $user->id) }}
							{{ Form::submit('Follow ' . $user->username, array('class' => 'btn btn-primary')) }}
						{{Form::close()}}
					@endif
				</div>
			</div>

			<hr>

			@include('partials.post-tweet', array('user' => $user))
			@include('partials.tweets')
		</div>

	</div>


@stop