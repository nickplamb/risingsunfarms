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

<form method="POST" action="/chickens/{{$chicken->name}}">
	@csrf
	@method('PUT')

	<div class="row gtr-uniform">
		<div class="col-12 col-12-xsmall">
			<label class="label" for="name">What's her name?</label>
			<input type="text" name="name" id="name" value="{{$chicken->name}}" placeholder="" />
		</div>
		<div class="col-6">
			<label class="label" for="DOB">When did she hatch?</label>
			<input type="date" name="DOB" id="{{$chicken->DOB}}" value="{{$chicken->DOB}}" placeholder="{{$chicken->DOB}}" />
		</div>
		<div class="col-6">
			<label class="label" for="DOB">Did she die?</label>
			<input type="date" name="DOB" id="{{$chicken->DOB}}" value="{{$chicken->DOB}}"/>
		</div>
		<!-- Break -->
		<div class="col-12">
			<label class="label" for="breed">What's her Breed?</label>
			<select name="breed" id="breed">
				<option value="{{$chicken->breed}}">{{$chicken->breed}}</option>
				<option value="Silver Laced Wyandotte">Silver Laced Wyandotte</option>
				<option value="Cream Legbar">Cream Legbar</option>
				<option value="Black Austrolorpe">Black Austrolorpe</option>
				<option value="Easter Egger">Easter Egger</option>
			</select>
		</div>
		<div class="col-12">
			<label class="label" for="egg_color">What color eggs does she lay?</label>
			<select name="egg_color" id="egg_color">
				<option value="{{$chicken->egg_color}}">{{$chicken->egg_color}}</option>
				<option value="Brown">Brown</option>
				<option value="Blueish">Blueish</option>
				<option value="Greenish">Greenish</option>
				<option value="White">White</option>
			</select>
		</div>
		<!-- Break -->
		<div class="col-12">
			<label class="label" for="comments">Anything else you want to say about her?</label>
			<textarea name="comments" id="comments" value="{{$chicken->comments}}" placeholder="{{$chicken->comments}}" rows="4"></textarea>
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