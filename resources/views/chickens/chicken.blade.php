@extends ('layout')

@section ('content')

<!-- Content -->
	<section>
		<header class="main">
			<h1>These are our Chickens</h1>
		</header>

		<span class="image main"><img src="images/pic11.jpg" alt="" /></span>

		<p>Look at them!</p>
		<p>They poop breakfast!</p>
		<p>They are fucking awesome.</p>
		
		@foreach ($chickens as $chicken)
			<hr class="major" />

			<section id="banner">
				<div class="content">
					<a href="/chickens/{{$chicken->name}}"><h2>{{$chicken->name}}</h2></a>
					<div class="col-6">
						<p>{{$chicken->name}} is a {{$chicken->breed}} who lays {{$chicken->egg_color}} eggs.</p>
						<p>She hatched on {{$chicken->DOB->format('D, M jS Y')}} and 
						@if ($chicken->DOD !== null)
							died on {{$chicken->DOD->format('D, M jS Y')}}.</p>
						@else
							is now {{$chicken->age}} weeks old.</p> 
						@endif
					</div>
				</div>
				<span class="image object">
					<img src="/images/chickens/{{$chicken->name}}.jpg" alt="" />
				</span>
			</section>
		@endforeach
		
<!--ADD pagination!!!-->


	</section>

@endsection