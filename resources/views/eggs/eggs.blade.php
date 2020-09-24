@extends('layout')

@section ('content')

	<!-- Banner -->
	<section id="banner">
		<div class="content">
			<header>
				<h1>So Many Eggs</h1>
				<p>Look at them!</p>
			</header>
		</div>
		<span class="image object">
			<img src="/images/chickens/chickensadd.jpg" alt="" />
		</span>
	</section>

	<section id="banner">
		<div class="content">
			<!--<a href="/chickens/{$chicken->name}}"><h2>{$chicken->name}}</h2></a>-->
			<div class="col-12">
				<!-- Table -->
				<h3>Numeber of Eggs Layed Each Day</h3>

				<h4>Default</h4>
				<div class="table-wrapper">
					<table>
						<thead>
							<tr>
								<th class="col">Date</th>
								<th class="col">Eggs Layed</th>
								<th class="col">Average Egg Weight</th>

							</tr>
						</thead>
						<tbody>
							@foreach ($eggs as $egg)
								<tr>
									<td>{{\Carbon\Carbon::parse($egg->date)->format('F j, Y')}}</td>
									<td>{{$egg->eggsPerDay}}</td>
									<td>{{number_format($egg->avgWeight)}} grams</td>
								</tr>
								{{-- @php($totalWeight += $egg->avgWeight) --}}
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<!---->
								<td>Total Average Weight:</td>
								<td colspan="1"></td>
								<td>{{number_format($eggs->avg('avgWeight'))}} grams</td>
							</tr>
						</tfoot>
					</table>
				</div>
				
			</div>
		</div>
	</section>

@endsection