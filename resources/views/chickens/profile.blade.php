@extends('layout')

@section('content')
	</br>
		<section id="banner">
			<div class="content">
				<a href="/chickens/{{$chicken->name}}"><h2>{{$chicken->name}}</h2></a>
				<div class="col-6">
					<p>{{$chicken->name}} is a {{$chicken->breed}} who lays {{$chicken->egg_color}} eggs.</p>
					<p>
						@if ($chicken->chicken_sex === "rooster")
							He 
						@else
							She
						@endif

						hatched on {{$chicken->DOB->format('D, M jS Y')}} and 

						@if ($chicken->DOD !== null)
							died on {{$chicken->DOD->format('D, M jS Y')}}.
						@else
							is now {{$chicken->age}} weeks old.
						@endif
					</p> 
					<p></p>
				</div>
			</div>
			<span class="image object">
				@if ($chicken->photo_url === null)
					<img src="/images/chickens/chickensadd.jpg" alt="" />
				@else
				<img src="{{$chicken->image}}" alt="" />
				@endif
			</span>
		</section>
	</br>
	</br>
	<p><a href="/chickens/{{$chicken->name}}/edit" class="button primary small">Edit her profile</a></p>

@endsection