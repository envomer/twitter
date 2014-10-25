<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">Twitter</a>
		</div>

		@if( $currentUser )
			<p class="navbar-text">Signed in as <b>{{$currentUser->username}}</b></p>
		@endif

		{{ Form::open(array('url' => 'tweets/search', 'class' => 'navbar-form navbar-left', 'role' => 'search', 'method' => 'GET')) }}
			<div class="form-group">
				{{ Form::text('query', null, array('placeholder' => 'Search...', 'class' => 'form-control')) }}
			</div>
			{{ Form::submit('Go!', array('class' => 'btn btn-default')) }}
		{{ Form::close() }}

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				@if($currentUser)
					
					<li><a href="/user/{{$currentUser->username}}/following">Following</a></li>
					<li><a href="/user/{{$currentUser->username}}/followers">Followers</a></li>
					<li><a href="/logout">Logout</a></li>
				@else
					<li><a href="/login">Login</a></li>
					<li><a href="/register">Register</a></li>
				@endif

			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>