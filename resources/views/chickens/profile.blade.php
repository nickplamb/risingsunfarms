@extends('layout')

@section('content')
	</br>
	<div class="row gtr-uniform">
		<div class="col-12">
			<h2>Learn A Little More About {{$chicken->name}}.</h2>
		</div>
		<dl class="col-6">
			<dt>{{$chicken->name}}'s Breed:</dt>
			<dd>
				<p>{{$chicken->breed}}</p>
			</dd>
			<dt>{{$chicken->name}}'s egg color:</dt>
			<dd>
				<p>{{$chicken->egg_color}} colored eggs</p>
			</dd>
			<dt>{{$chicken->name}} hatched on:</dt>
			<dd>
				<p>{{$chicken->born}}</p>
			</dd>
			@isset($chicken->DOD)
				<dt>{{$chicken->name}} died on:</dt>
				<dd>
					<p>{{$chicken->died}}</p>
				</dd>
			@else 
				<dt>{{$chicken->name}}'s age:</dt>
				<dd>
					<p>{{$chicken->age}}</p>
				</dd>
			@endisset
			<dt> some additional details about {{$chicken->name}}.</dt>
			<dd>
				<p>{{$chicken->comments}}</p>
			</dd>
		</dl>
		<div class="col-6">
			<span class="image object fit">
				@if ($chicken->photo_url === null)
					<p>{{$chicken->name}} doesn't have a photo uploaded. Edit her profile to add one!</p>
				@else
					<img src="/{{$chicken->image}}" alt="" />
				@endif
			</span>
		</div>
		<div class="col-12 col-12-xsmall">
			<a href="/chickens/{{$chicken->name}}/edit" class="button primary small">Edit her profile</a>
		</div>
	</div>

@endsection