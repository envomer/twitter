@if( ! $tweets->getTotal() )
	<h1 class="lead">No Tweets found:(</h1>
@else
	@foreach( $tweets as $tweet )
		<div class="panel panel-info">
			<div class="panel-heading"><a href="/user/{{$tweet->user->username}}">{{ $tweet->user->username }}</a> &middot; {{ $tweet->created_at->diffForHumans() }}</div>
			<div class="panel-body">{{ $tweet->body }}</div>
		</div>
	@endforeach
	{{ $tweets->links() }}
@endif