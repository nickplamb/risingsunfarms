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
		<span class="image object">
			<img src="/images/pets/petsadd.jpg" alt="" />
		</span>
	</section>


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color:red;">{{ $error }}</li>
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
		<div class="col-12 col-12-xsmall">
			<label class="label" for="name">What's their name?</label>
			<input type="text" name="name" id="name" placeholder="Name" required />
		</div>
		<!-- Break -->
		<div class="col-4">
			<label class="label" for="DOB">When were they born?</label>
			<input type="date" name="DOB" id="DOB"/>
		</div>
		<div class="col-4">
			<label class="label" for="DOD">When did they Die?</label>
			<input type="date" name="DOD" id="DOD"/>
		</div>
		<div class="col-4">
			<label class="label" for="sex">What sex are they?</label>
			<select name="sex" id="sex">
				<option value="female">Female</option>
				<option value="male">Male</option>
				<option value="unknown">Unknown</option>
				<option value="no_matter">Doesn't Matter</option>
			</select>
		</div>		
		<!-- Break -->
		<div class="col-12">
			<label class="label" for="breed">What's her Breed?</label>
			<select name="breed" id="breed">
				<option value="">- Breed -</option>
				<option value="Silver Laced Wyandotte">Silver Laced Wyandotte</option>
				<option value="Cream Legbar">Cream Legbar</option>
				<option value="Black Austrolorpe">Black Austrolorpe</option>
				<option value="Easter Egger">Easter Egger</option>
			</select>
		</div>
		<div class="col-12">
			<label class="label" for="egg_color">What color eggs does she lay?</label>
			<select name="egg_color" id="egg_color">
				<option value="">- Egg Color -</option>
				<option value="Brown">Brown</option>
				<option value="Blueish">Blueish</option>
				<option value="Greenish">Greenish</option>
				<option value="White">White</option>
				<option value="no">He won't lay any eggs.</option>
			</select>
		</div>
		<div>
			<label class="label" for="chicken_photo">Upload a picture of our new chicken</label>
			<input type="file" name="chicken_photo" id="chicken_photo">
		</div>
		<!-- Break -->
		<div class="col-12">
			<label class="label" for="comments">Anything else you want to say about her?</label>
			<textarea name="comments" id="comments" placeholder="Optional" rows="4"></textarea>
		</div>
		<!-- Break -->
		<div class="col-12">
			<ul class="actions">
				<li><input type="submit" value="Add Chicken" class="primary" /></li>
				<li><input type="reset" value="Clear All" /></li>
			</ul>
		</div>
	</div>
</form>

@endsection