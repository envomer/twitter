@extends('layout.default')

@section('content')
	
	<h1><a href="/user/{{$user->username}}">{{$user->username}}</a> is Following {{ $following->getTotal() }} People</h1>
	<ul class="list-group">
		@foreach($following as $fol_user)
			<li class="list-group-item"><a href="/user/{{$fol_user->username}}">{{$fol_user->username}}</a></li>
		@endforeach
	</ul>

@stop