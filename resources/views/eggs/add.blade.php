@extends('layout')

@section('head')
	<script src="/assets/js/jquery-1.12.4.min.js"></script>
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
@endsection

@section('content')

<!-- Banner -->
<section id="banner">
	<div class="content">
		<header>
			<h1>We got some eggs today!</h1>
			<p>Add our new eggs here.</p>
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
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (Session::has('success'))
    <div class="col-12 alert alert-success text-center">
        <p>
        	{{ Session::get('success') }} 
        	<a href="/eggs" class="close" data-dismiss="alert" aria-label="close">See all the eggs</a>
        </p>
    </div>
@endif

<form method="POST" action="/eggs">
	@csrf

	<div class="row gtr-uniform" id="dynamicForm">
		
		<table id="dynamicTable">
<!--		foreach($chickens as $chicken)-->
			<tr>
				<td>
					<div class="col-4">
						<label class="label" for="addMore[0][layed_on]">Todays Date.</label>
						<input type="date" style="text-align: center;" name="addMore[0][layed_on]" id="addMore[0][layed_on]"/>
					</div>
				</td>
				<td>
					<div class="col-4 col-12-fit">
						<label class="label" for="addMore[0][chicken_name]">Who layed this egg?</label>
						<select name="addMore[0][chicken_name]" id="addMore[0][chicken_name]">
							<option value="brown">Unknown Brown</option>
							<option value="green">Unknown Green</option>
							@foreach($chickens as $chicken)
								<option value="{{$chicken->name}}">{{$chicken->name}}</option>
							@endforeach
						</select>
					</div>
				</td>
				<td>
					<div class="col-4 col-12-fit">
						<label class="label" for="addMore[0][weight]">How much does the egg weight?</label>
						<input type="text" name="addMore[0][weight]" id="addMore[0][weight]" placeholder="Weight"/>
					</div>
				</td>
				<td>
					<div class="col-4 col-12-fit">
						<label class="label" for="addMore[0][comments]">Anything interesting about the egg?</label>
						<textarea name="addMore[0][comments]" id="addMore[0][comments]" placeholder="Optional" rows="1"></textarea>
					</div>
				</td>
			</tr>
		</table>
			<!--<div class="col-12"><hr/></div>-->
			<div class="col-12">
				<ul class="actions">
					<li><button type="button" name="add" id="add" class="primary small btn-success">Add More Rows</button></li>
					<li></li>
				</ul>
			</div>
			
<!--		endforeach-->
		<div class="col-12">
			<ul class="actions">
				<li><input type="submit" value="Add All Eggs" class="primary" /></li>
				<li><input type="reset" value="Clear All" /></li>
			</ul>
		</div>
	</div>
</form>

<script type="text/javascript">

    var i = 0;

    $("#add").click(function(){
        ++i;
        $("#dynamicTable").append(
        	'<tr><td><div class="col-12"><label class="label" for="addMore['+i+'][layed_on]">Todays Date.</label><input type="date" name="addMore['+i+'][layed_on]" id="addMore['+i+'][layed_on]"/></div></td><td><div class="col-4 col-12-xsmall"><label class="label" for="addMore['+i+'][chicken_name]">Who layed this egg?</label><select name="addMore['+i+'][chicken_name]" id="addMore['+i+'][chicken_name]"><option value="brown">Unknown Brown</option><option value="green">Unknown Green</option>@foreach($chickens as $chicken)<option value="{{$chicken->name}}">{{$chicken->name}}</option>@endforeach</select></div></td><td><div class="col-4 col-12-xsmall"><label class="label" for="addMore['+i+'][weight]">How much does the egg weight?</label><input type="text" name="addMore['+i+'][weight]" id="addMore['+i+'][weight]" placeholder="Weight"/></div></td><td><div class="col-4 col-12-xsmall"><label class="label" for="addMore['+i+'][comments]">Anything interesting about the egg?</label><textarea name="addMore['+i+'][comments]" id="addMore['+i+'][comments]" placeholder="Optional" rows="1"></textarea></div></td></tr>');        	
    });

    /*'<tr><td><input type="text" name="addmore['+i+'][name]" placeholder="Enter your Name" class="form-control" /></td><td><input type="text" name="addmore['+i+'][qty]" placeholder="Enter your Qty" class="form-control" /></td><td><input type="text" name="addmore['+i+'][price]" placeholder="Enter your Price" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');

    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });  */
</script>
@endsection