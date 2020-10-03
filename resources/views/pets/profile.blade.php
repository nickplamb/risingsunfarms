@extends('layout')

@section('content')
	</br>
	<div class="row gtr-uniform">
		<div class="col-12">
			<h2>Learn A Little More About {{$pet->name}}.</h2>
		</div>
		<dl class="col-6">
			<dt>{{$pet->name}}'s species:</dt>
			<dd><p>{{$pet->species}}</p></dd>
			
			@isset($pet->breed)
				<dt>{{$pet->name}} breed:</dt>
				<dd><p>{{$pet->breed}}</p></dd>
			@endisset

			@isset($pet->DOB)
				<dt>{{$pet->name}}  was born on:</dt>
				<dd><p>{{$pet->born}}</p></dd>
			@endisset

			@isset($pet->DOD)
				<dt>{{$pet->name}} died on:</dt>
				<dd>
					<p>{{$pet->died}}</p>
				</dd>
			@else 
				@isset($pet->DOB)
					<dt>{{$pet->name}}'s age:</dt>
					<dd>
						<p>{{$pet->age}}</p>
					</dd>
				@endisset
			@endisset

			@empty(!$pet->person)
				<dt>{{$pet->name}}'s person:</dt>
				<dd><p>{{$pet->person}}</p></dd>
			@endempty

			@empty(!$pet->people)
				<dt>{{$pet->name}}'s other people:</dt>
				<dd><p>{{$pet->people}}</p></dd>
			@endempty

			@empty(!$pet->favorites)
				<dt>Some of {{$pet->name}}'s favorites:</dt>
				<dd><p>{{$pet->favorites}}</p></dd>
			@endempty

			@empty(!$pet->dislikes)
				<dt>Some of {{$pet->name}}'s dislikes:</dt>
				<dd><p>{{$pet->dislikes}}</p></dd>
			@endempty

			@empty(!$pet->origin_story)
				<dt>{{$pet->name}}'s origin story:</dt>
				<dd><p>{{$pet->origin_story}}</p></dd>
			@endempty

			@empty(!$pet->comments)
				<dt>Some additional details about {{$pet->name}}.</dt>
				<dd><p>{{$pet->comments}}</p></dd>
			@endempty
		</dl>
		<div class="col-6">
			<span class="image object fit">
				@if ($pet->photo_url === null)
					<p>{{$pet->name}} doesn't have a photo uploaded. Edit her profile to add one!</p>
				@else
					<img src="/{{$pet->image}}" alt="" />
				@endif
			</span>
		</div>
		<div class="col-12 col-12-xsmall">
			<a href="/pets/{{$pet->name}}/edit" class="button primary small">Edit her profile</a>
		</div>
	</div>
@endsection

{{-- name
DOB
DOD
species
breed
sex
person
people
favorites
dislikes
origin_story
locations
description
comments --}}