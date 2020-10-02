@extends('layout')

@section('content')

<!-- Banner -->
	<section id="banner">
		<div class="content">
			<header>
				<h1>We got a new Pet!</h1>
				<p>Add our new Pet here.</p>
			</header>
		</div>
		<span class="image object fit">
			<img src="/images/pets/pets.jpg" alt="" />
		</span>
	</section>


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

<form method="POST" action="/pets" enctype="multipart/form-data">
	@csrf

	<div class="row gtr-uniform">
		<div class="col-12">
			<label class="label" for="name">What's their name?</label>
			<input type="text" name="name" id="name" placeholder="Name" required />
		</div>
		<!-- Break -->
		<div class="col-4 col-6-medium">
			<label class="label" for="DOB">When were they born?</label>
			<input type="date" name="DOB" id="DOB"/>
		</div>
		<div class="col-4 col-6-medium">
			<label class="label" for="DOD">When did they Die?</label>
			<input type="date" name="DOD" id="DOD"/>
		</div>
		<div class="col-4 col-12-medium">
			<label class="label" for="sex">What sex are they?</label>
			<select name="sex" id="sex">
				<option value="female">Female</option>
				<option value="male">Male</option>
				<option value="unknown">Unknown</option>
				<option value="no_matter">Doesn't Matter</option>
			</select>
		</div>		
		<!-- Break -->
		<div class="col-6 col-12-medium">
			<label class="label" for="species">What kind of animal are they?</label>
			<select name="species" id="species">
				<option value="">- Animals -</option>
				<option value="dog">Dog</option>
				<option value="cat">Cat</option>
				<option value="turtle">Turtle</option>
				<option value="fish">Fish</option>
				<option value="bird">Bird</option>
				<option value="rat">Rat</option>
				<option value="sea monkies">Sea Monkies</option>
			</select>
		</div>
		<div class="col-6 col-12-medium">
			<label class="label" for="breed">What breed are they?</label>
			<textarea name="breed" id="breed" placeholder="Optional" rows="1"></textarea>
		</div>
		<div class="col-12">
			<label class="label" for="description">Describe them?</label>
			<textarea name="description" id="description" placeholder="Appearance, personality..." rows="1"></textarea>
		</div>
		<div class="col-6 col-12-medium">
			<label class="label" for="person">Who is their person?</label>
			<textarea name="person" id="person" placeholder="Who is THEIR person" rows="1"></textarea>
		</div>
		<div class="col-6 col-12-medium">
			<label class="label" for="people">Who are their other people?</label>
			<textarea name="people" id="people" placeholder="Mommys, daddies, aunts, uncles..." rows="1"></textarea>
		</div>
		<div class="col-12">
			<label class="label" for="favorites">What are some of their favorite things?</label>
			<textarea name="favorites" id="favorites" placeholder="Toys, food, place, activities..." rows="1"></textarea>
		</div>
		<div class="col-12">
			<label class="label" for="dislikes">What are some things they hate?</label>
			<textarea name="dislikes" id="dislikes" placeholder="Being held like a baby, waiting to be fed..." rows="1"></textarea>
		</div>
		<div class="col-12">
			<label class="label" for="origin_story">What is their origin story?</label>
			<textarea name="origin_story" id="origin_story" placeholder="How did they find you? Where did they come from? Who were their biological parents?" rows="1"></textarea>
		</div>
		<div class="col-12">
			<label class="label" for="locations">Where have they lived?</label>
			<textarea name="locations" id="locations" placeholder="Where is or has been Home?" rows="1"></textarea>
		</div>
		<div class="col-12">
			<label class="label" for="comments">Anything else you'd about them?</label>
			<textarea name="comments" id="comments" placeholder="Something that hasn't been covered?" rows="1"></textarea>
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