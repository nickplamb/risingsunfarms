@extends('layout')

@section('head')
	<title>Coop Logger</title>
	{{-- <style>

	    /*needs @media query*/

	    table, th, td {
	        border: 1px solid black;
	    }
	    th, td {
	        padding: 6px 10px 6px 10px;
	    }
	    table {
	        width:50%;
	        margin-left:auto;
	        margin-right: auto;
	    }
	    th {
	        text-align: left;
	    }
	    tr:nth-child(even) {
	        background-color: #EEE;
	    }
	    tr:nth-child(odd) {
	        background-color: #fff;
	    }
	    h1 {
	        text-align: center;
	    }
	    .datetimecolumn {
	        min-width:140px; 
	    }
	    .datacolumn{
	        min-width: 90px;
	    }
	    .idcolumn{
	        min-width: 40px;
	    }

	</style> --}}
@endsection

@section('content')

	<h1>Chicken Coop Temperature and Humidity Data</h1>

	<table>
		<thead>
		    <tr>
		        <th>ID</th>
		        <th class="datacolumn">Inside Humidity</th>
		        <th class="datacolumn">Inside Temperature</th>
		        <th class="datacolumn">Outside Humidity</th>
		        <th class="datacolumn">Outside Temperature</th>
		        <th class="datacolumn">Door is...</th>
		        <th class="datacolumn">Battery Status</th>
	        	<th class="datetimecolumn">Date Layed</th>
	    	</tr>
	    </thead>
		<tbody>
			@foreach ($coops as $coop)
				<tr>
	    			<td>{{$coop->id}}</td>
	    			<td>{{$coop->inside_humidity}}</td>
	    			<td>{{$coop->inside_temperature}}</td>
	    			<td>{{$coop->outside_humidity}}</td>
	    			<td>{{$coop->outside_temperature}}</td>
	    			<td>@if (isset($coop->door_locked))
	    			    	@if ($coop->door_locked == 1)
	    			    		Locked
	    			    	@elseif ($coop->door_locked == 0)
	    			    		Unlocked
	    					@endif
	    				@else
	    					No Data
	    				@endif
    				</td>
	    			<td>{{$coop->battery_status}}</td>
	    			<td>{{$coop->created_at->format('F j, Y')}}</td>
	    		</tr>
			@endforeach
	    </tbody>
	    
		{{-- <?php
			$servername = "localhost";
			$username = "datalogger";
			$pass = "Grace&Hope1";
			$dbname = "coop_log";

			// Create connection
			$link = new mysqli($servername, $username, $pass, $dbname);
			// Check connection
			if ($link->connect_error) {
			die("Connection failed: " . $link->connect_error);
			} 
			//echo "<table>";
			$sql = "SELECT  id, humidity_1, temp_1, humidity_2, temp_2, reading_time, door_locked, battery_status FROM env_data ORDER BY reading_time DESC LIMIT 100";
			$result = $link->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
				echo "<tr><td>" . $row["id"]. "</td><td>" . $row["humidity_1"]. "</td><td>" . $row["temp_1"]. "</td><td>" . $row["humidity_2"]. "</td><td>" . $row["temp_2"] . "</td><td>" . doorconversion($row["door_locked"]) . "</td><td>" . $row["battery_status"] . "</td><td>" . formatdate($row["reading_time"]) . "</td></tr>";
				}
				} else {
				echo "0 results";
				}

			//echo "</table>";
			$link->close();

			function doorconversion($doorint) {
			    //$doorstring = $doorint;
			    
			    $doorstring = "";
			    if (isset($doorint)) {
			        if ($doorint == 1) {
			            $doorstring = "Locked";
			        } elseif ($doorint == 0) {
			            $doorstring = "Unlocked";
			        }
			    } else {
			        $doorstring = "No Data";
			    }
			    return $doorstring;
			}

			//https://stackoverflow.com/questions/136782/convert-from-mysql-datetime-to-another-format-with-php
			function formatdate($datetimeFromMysql) {
			    $time = strtotime($datetimeFromMysql);
			    $myFormatForView = date("h:i A m/d/y", $time);
			    return $myFormatForView;
			}
		?> --}}
	</table>
@endsection