@extends('layout')

@section('header')
	<style="::-webkit-datetime-edit { padding: 1em; };">
@endsection

@section('content')
<!-- Banner -->
<section id="banner">
	<div class="content">
		<header>
			<h1>Update {{ $pet->name }}'s Profile!</h1>
			<p>There is always more to add.</p>
		</header>
	</div>
	<span class="image object fit">
		<img src="/images/pets/pets.jpg" alt="" />
	</span>
</section>

<!-- Error notification -->
	@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li class="error">{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	@if (Session::has('success'))
	    <div class="col-12 alert alert-success text-center">
	        <p>
	        	{{ Session::get('success') }} 
	        	<a href="/pets" class="close" data-dismiss="alert" aria-label="close">See all the pets</a>
	        </p>
	    </div>
	@endif

<!-- Form -->
	<form method="POST" action="/pets/{{ $pet->name }}" enctype="multipart/form-data">
		@method('PUT')
		@csrf
		<div class="row gtr-uniform">
			<div class="col-12">
				<label class="label" for="name">What's their name?</label>
				<input type="text" name="name" id="name" placeholder="{{ $pet->name }}" required />
			</div>
			<!-- Break -->
			<div class="col-3 col-6-medium">
				<label class="label" for="DOB">When were they born?</label>
				<input type="date" name="DOB" id="DOB" value="@isset($pet->DOB){{ $pet->DOBInputDate }}@endisset" placeholder="{{ $pet->DOBHuman }}" />
			</div>
			<div class="col-3 col-6-medium">
				<label class="label" for="DOD">When did they Die?</label>
				<input type="date" name="DOD" id="DOD" value="@isset($pet->DOD){{ $pet->DODInputDate }}@endisset" placeholder="{{ $pet->DODHuman }}" />
			</div>
			<div class="col-6 col-12-medium">
				<label class="label" for="sex">What sex are they?</label>
				<select name="sex" id="sex">
					<option value="{{ $pet->sex }} selected">{{ $pet->sex }}</option>
					@if($pet->sex === 'female')
						<option value="Male">Male</option>
					@else
						<option value="Female">Female</option>
					@endif
					<option value="unknown">Unknown</option>
					<option value="no_matter">Doesn't Matter</option>
				</select>
			</div>		
			<!-- Break -->
			<div class="col-6 col-12-medium">
				<label class="label" for="species">What kind of animal are they?</label>
				<select name="species" id="species">
					@php
						$species = ['Dog', 'Cat', 'Turtle', 'Fish', 'Bird', 'Rat', 'Sea Monkies'];
						echo "<option value=\"" . $pet->species . "\" selected>" . ucwords($pet->species)  ."</option>";
						foreach($species as $animal) {
							if(strtolower(trim($pet->species)) !== strtolower(trim($animal))) {
								echo "<option value=\"" . $animal . "\">" . $animal  ."</option>";
							}
						}
					@endphp
				</select>
			</div>
			<div class="col-6 col-12-medium">
				<label class="label" for="breed">What breed are they?</label>
				<textarea name="breed" id="breed" placeholder="{{ $pet->breed }}" value="{{ $pet->breed }}" rows="1"></textarea>
			</div>
			<div class="col-12">
				<label class="label" for="description">Describe them?</label>
				<textarea name="description" id="description" placeholder="{{ $pet->description }}" value="{{ $pet->description }}" rows="1"></textarea>
			</div>
			<div class="col-6 col-12-medium">
				<label class="label" for="person">Who is their person?</label>
				<textarea name="person" id="person" placeholder="{{ ucwords($pet->person) }}" value="{{ $pet->person }}" rows="1"></textarea>
			</div>
			<div class="col-6 col-12-medium">
				<label class="label" for="people">Who are their other people?</label>
				<textarea name="people" id="people" placeholder="{{ ucwords($pet->people) }}" value="{{ $pet->people }}" rows="1"></textarea>
			</div>
			<div class="col-12">
				<label class="label" for="favorites">What are some of their favorite things?</label>
				<textarea name="favorites" id="favorites" placeholder="{{ $pet->favorites }}" value="{{ $pet->favorites }}" rows="1"></textarea>
			</div>
			<div class="col-12">
				<label class="label" for="dislikes">What are some things they hate?</label>
				<textarea name="dislikes" id="dislikes" placeholder="{{ $pet->dislikes }}" value="{{ $pet->dislikes }}" rows="1"></textarea>
			</div>
			<div class="col-12">
				<label class="label" for="origin_story">What is their origin story?</label>
				<textarea name="origin_story" id="origin_story" placeholder="{{ $pet->origin_story }}" value="{{ $pet->origin_story }}" rows="1"></textarea>
			</div>
			<div class="col-12">
				<label class="label" for="locations">Where have they lived?</label>
				<textarea name="locations" id="locations" placeholder="{{ $pet->locations }}" value="{{ $pet->locations }}" rows="1"></textarea>
			</div>
			<div class="col-12">
				<label class="label" for="comments">Anything else you'd about them?</label>
				<textarea name="comments" id="comments" placeholder="{{ $pet->comments }}" value="{{ $pet->comments }}" rows="1"></textarea>
			</div>
			<div class="col-12">
				<label class="label" for="pet_photo">Upload a picture of our Pet.</label>
				<input type="file" name="pet_photo" id="pet_photo">
			</div>
			<div class="col-12">
				<ul class="actions">
					<li><input type="submit" value="Add Pet" class="primary" /></li>
					<li><input type="reset" value="Clear All" /></li>
				</ul>
			</div>
		</div>
	</form>
@endsection

			{{-- @php
				$species = [Dog, Cat, Turtle, Fish, Bird, Rat, Sea Monkies];
				echo "<option value=\"" . $pet->sex . "\">" . $pet->sex  ."</option>";
				foreach($species as $animal) {
					if(strtolower(trim($pet->sex)) !== strtolower(trim($animal))) {
						echo "<option value=\"" . $animal . "\">" . $animal  ."</option>";
					}
				}
			@endphp
				<select name="species" id="species">
					<option value="">- Animals -</option>
					<option value="dog">Dog</option>
					<option value="cat">Cat</option>
					<option value="turtle">Turtle</option>
					<option value="fish">Fish</option>
					<option value="bird">Bird</option>
					<option value="rat">Rat</option>
					<option value="sea monkies">Sea Monkies</option>
				</select> --}}