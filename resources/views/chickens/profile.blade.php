@extends('layout')

@section('content')
	</br>
	<h2>{{$chicken->name}}'s Breed:</h2>
	{{$chicken->breed}}
	</br>
	</br>
	<p><a href="/chickens/{{$chicken->name}}/edit" class="button primary small">Edit her profile</a></p>

@endsection