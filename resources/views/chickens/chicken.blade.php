@extends ('layout')

@section ('content')

<!-- Content -->
	<section>
		<header class="main">
			<h1>These are our Chickens</h1>
		</header>

		<span class="image main"><img src="images/chickens/chickensadd.jpg" alt="" /></span>

		<p>Look at them!</p>
		<p>They poop breakfast!</p>
		<p>They are fucking awesome.</p>
		
		@foreach ($chickens as $chicken)
			<hr/>
			<section>
				<div class="row gtr-200">
					<div class="col-6">
						<header class="major"><a href="/chickens/{{$chicken->name}}"><h2>{{$chicken->name}}</h2></a></header>
						<p>{{$chicken->name}} is a {{$chicken->breed}} who lays {{$chicken->egg_color}} eggs.</p>
						<p>
							@if ($chicken->chicken_sex === "rooster") He 
							@else She 
							@endif
							hatched on {{$chicken->DOB->format('D, M jS Y')}} and 
							@if ($chicken->DOD !== null) died on {{$chicken->died}}.
							@else is now {{$chicken->age}} weeks old.
							@endif
						</p>	
					</div>
					<div class="col-6">
						<span class="image fit">
							@if ($chicken->photo_url === null)
								<img src="/images/chickens/chickensadd.jpg" alt="" />
							@else
								<img src="{{$chicken->image}}" alt="" />
							@endif
						</span>	
					</div>		
				</div>				
			</section>
		@endforeach
		<div class="col-12 row aln-center">{{ $chickens->links() }}</div>
	</section>

@endsection