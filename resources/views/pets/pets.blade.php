@extends('layout')

@section('content')
	<!-- Content -->
	<section>
		<header class="main">
			<h1>These are our Pets!</h1>
		</header>

		<span class="image fit"><img src="images/pets/pets.jpg" alt="" /></span>

		<p>Look at them!<br>
		They are so cute!<br>
		We love them all so much!.</p>
		
		@foreach ($pets as $pet)
			<hr/>
			<section>
				<div class="row gtr-uniform">
					<div class="col-6">
						<header class="major">
							<a href="/pets/{{$pet->name}}"><h2>{{$pet->name}}</h2></a>
						</header>
						<p>{{$pet->name}} is a @isset($pet->breed) {{$pet->breed}} @endisset {{$pet->species}}.</p>
						<p>
							@if($pet->sex === "male") He 
							@else She 
							@endif
							hatched on {{$pet->DOB->format('D, M jS Y')}} and 
							@if($pet->DOD !== null) died on {{$pet->died}}.
							@else is now {{$pet->age}} years old.
							@endif
						</p>	
					</div>
					<div class="col-6">
						<span class="image fit">
							@if ($pet->photo_url === null)
								<img src="/images/pets/pets.jpg" alt="" />
							@else
								<img src="{{$pet->image}}" alt="" />
							@endif
						</span>	
					</div>		
				</div>				
			</section>
		@endforeach
		<div class="col-12 row aln-center">{{ $pets->links() }}</div>
	</section>
@endsection