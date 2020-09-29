@extends('layout')

@section('header')
	<style="::-webkit-datetime-edit { padding: 1em; };">
@endsection

@section('content')
	
<!-- Banner -->
<section id="banner">
	<div class="content">
		<header>
			<h1>Update a Chicken Profile</h1>
			<p>We all make mistakes.</p>
		</header>
	</div>
	<span class="image object">
		<img src="/images/chickens/chickensadd.jpg" alt="" />
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
        	<a href="/chickens" class="close" data-dismiss="alert" aria-label="close">See all the Chickens</a>
        </p>
    </div>
@endif

<form method="POST" action="/chickens/{{$chicken->name}}">
	@csrf
	@method('PUT')

	<div class="row gtr-uniform">
		<div class="col-12 col-12-xsmall">
			<label class="label" for="name">What's her name?</label>
			<input type="text" name="name" id="name" value="{{$chicken->name}}" placeholder="" />
		</div>

		<div class="col-3">
			<label class="label" for="DOB">When did she hatch?</label>
			<input type="date" name="DOB" id="DOB" value=@isset($chicken->DOB) {{$chicken->DOB->format('Y-m-d')}} @endisset/>
		</div>
		<div class="col-3">
			<label class="label" for="DOD">Did she die?</label>
			<input type="date" name="DOD" id="DOD" value=@isset($chicken->DOD) {{$chicken->DOD->format('Y-m-d')}} @endisset/>
		</div>
		<div class="col-3" style="position: relative;">
			<div style="position: absolute; bottom: 0;">
				<input type="radio" id="chicken_sex_hen" name="chicken_sex" value="hen" @if($chicken->chicken_sex == 'hen') checked @endif>
				<label for="chicken_sex_hen">Hen</label>
			</div>
		</div>
		<div class="col-3" style="position: relative;">
			<div style="position: absolute; bottom: 0;">
				<input type="radio" id="chicken_sex_rooster" name="chicken_sex" value="rooster"@if($chicken->chicken_sex == 'rooster') checked @endif>
				<label for="chicken_sex_rooster">Rooster</label>
			</div>
		</div>
		<!-- Break -->
		<div class="col-12">
			<label class="label" for="breed">What's @if($chicken->chicken_sex == 'hen') her @else his @endif Breed?</label>
			<select name="breed" id="breed">
				<option value="{{$chicken->breed}}">{{$chicken->breed}}</option>
				<option value="Silver Laced Wyandotte">Silver Laced Wyandotte</option>
				<option value="Cream Legbar">Cream Legbar</option>
				<option value="Black Austrolorpe">Black Austrolorpe</option>
				<option value="Easter Egger">Easter Egger</option>
			</select>
		</div>
		<div class="col-12">
			<label class="label" for="egg_color">What color eggs does @if($chicken->chicken_sex == 'hen') she @else he @endif lay?</label>
			<select name="egg_color" id="egg_color">
				<option value="{{$chicken->egg_color}}">{{$chicken->egg_color}}</option>
				<option value="Brown">Brown</option>
				<option value="Blueish">Blueish</option>
				<option value="Greenish">Greenish</option>
				<option value="White">White</option>
			</select>
		</div>
		<!-- Break -->
		<div>
			<label class="label" for="chicken_photo">Upload a picture of {{-- @if($chicken->chicken_sex == 'hen') her @else him @endif --}} chicken</label>
			<input type="file" name="chicken_photo" id="chicken_photo">
		</div>
		<!-- Break -->
		<div class="col-12">
			<label class="label" for="comments">Anything else you want to say about @if($chicken->chicken_sex == 'hen') her @else him @endif?</label>
			<textarea name="comments" id="comments" value="{{$chicken->comments}}" rows="4"></textarea>
		</div>
		
		<!-- Break -->
		<div class="col-12">
			<ul class="actions">
				<li><input type="submit" value="Update Chicken" class="primary" /></li>
			</ul>
		</div>
	</div>
</form>

@endsection