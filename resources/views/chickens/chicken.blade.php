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
				<div class="row gtr-uniform">
					<div class="col-6">
						<header class="major"><a href="/chickens/{{ $chicken->name }}"><h2>{{ $chicken->name }}</h2></a></header>
						<p>{{ $chicken->name }} is a {{ $chicken->breed }} who lays 
							@if (strtolower($chicken->egg_color) == "no")
								{{ $chicken->egg_color }} eggs, because he is a rooster.</p>
							@else	
								{{ $chicken->egg_color }} eggs.</p>
							@endif
						<p>
							@if ($chicken->chicken_sex === "rooster") He 
							@else She 
							@endif
							hatched on {{ $chicken->Born }} and 
							@if ($chicken->DOD !== null) died on {{ $chicken->died }}.
							@else is now {{ $chicken->age }}.
							@endif
						</p>	
					</div>
					<div class="col-6">
						<span class="image fit">
							@if ($chicken->photo_url === null)
								<img src="/images/chickens/chickensadd.jpg" alt="" />
							@else
								<img src="{{ $chicken->image }}" alt="" />
							@endif
						</span>	
					</div>		
				</div>				
			</section>
		@endforeach
		<section>
			<hr class="major"/>
			<div class="col-12 row aln-center">{{ $chickens->links() }}</div>
		</section>
	</section>

@endsection