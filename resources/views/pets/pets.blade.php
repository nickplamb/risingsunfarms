@extends('layout')

@section('content')
	<!-- Content -->
	<section>
		<header class="main">
			<h1>These are our Pets</h1>
		</header>

		<span class="image main"><img src="images/pets/pets.jpg" alt="" /></span>

		<p>Look at them!</p>
		<p>They are so cute!</p>
		<p>We love them all so much!.</p>
		
		@foreach ($pets as $pet)
			<hr class="major" />

			<section id="banner">
				<div class="content">
					<a href="/pets/{{$pet->name}}"><h2>{{$pet->name}}</h2></a>
					<div class="col-6">
						<p>{{$pet->name}} is a {{$pet->breed}} who lays {{$pet->egg_color}} eggs.</p>
						<p>
							@if ($pet->chicken_sex === "rooster")
								He 
							@else
								She
							@endif

							hatched on {{$pet->DOB->format('D, M jS Y')}} and 

							@if ($pet->DOD !== null)
								died on {{$pet->DOD->format('D, M jS Y')}}.
							@else
								is now {{$pet->age}} years old.
							@endif
						</p> 
						<p></p>
					</div>
				</div>
				<span class="image object">
					@if ($pet->photo_url === null)
						<img src="/images/pets/pets.jpg" alt="" />
					@else
					<img src="{{$pet->image}}" alt="" />
					@endif
				</span>
			</section>
		@endforeach
		
<!--ADD pagination!!!-->


	</section>
@endsection