<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Mizzou Airline</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/index.js"></script>
<link rel="stylesheet" type="text/css" href="css/tabs-css.css">

<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="dropdown.css"> -->
</head>
<body>
<div class="box">
	<div class="header">
	<img class="logo" src="images/Screen Shot 2016-11-23 at 10.38.09 PM.png">
	<h1>Mizzou Airline</h1>
	</div>

	<div class="navi">
		<ul>
			<li class="navi-btn" id="navi1"><a href="#">Home</a></li>
            <li class="navi-btn"><a href="../customer.php">Customer</a></li>
			<li class="navi-btn"><a href="../administrator.php">Admin</a></li>
			<li class="navi-btn"><a href="../employeelogin.php">Employee</a></li>
            <li class="navi-btn"><a href="../register.php">Sign up!</a></li>
</ul>

</div>


	<div class="box_img">
		<div class="box_tab"></div>
		<div class="container">
		  <ul class="nav nav-tabs" id="firstRow">
		    <li class="active"><a data-toggle="tab" href="#menu0">Flight Reservation</a></li>
		    <li><a data-toggle="tab" href="#menu1">My booking</a></li>
		    <li><a data-toggle="tab" href="#menu2">Check-in</a></li>
		    <li><a data-toggle="tab" href="#menu3">Flight Status</a></li>
		  </ul>

  <div class="tab-content">
    <div id="menu0" class="tab-pane fade in active">
	    	<div class="pill-container">
			  <ul class="nav nav-pills">
			    <li class="active"><a data-toggle="pill" href="#roundT">Round Trip</a></li>
			    <li><a data-toggle="pill" href="#oneW">One Way</a></li>
			  </ul>
			</div>

		 <div class="tab-content">
		    <div id="roundT" class="tab-pane fade in active">
				<form method="POST" action="flightbooking.php" id="search">
		      	<div class="cityRow">
		            <input type="text" name="fromCity" placeholder="From: City or airport">

		            <input type="text" name="toCity" placeholder="To: City or airport">

	            </div>
	            <div class="timeRow">
	              <input type="date" name="departDate">
	              <input type="date" name="returnDate" >

	            </div>

	            <div class="countRow" style="text-align: center">
	              <select name="count" >
	                <option value="1" >1(16+years)</option>
	                <option value="2">2(16+years)</option>
	                <option value="3">3(16+years)</option>
	                <option value="4">4(16+years)</option>
	                <option value="5">5(16+years)</option>
	                <option value="6">6(16+years)</option>
	                <option value="7">7(16+years)</option>
	              </select>
	            </div>

		            <div class="rankRow">
		              <select name="rank">
		                <option value="Economy">Economy</option>
		                <option value="Premium Economy">Preminum Economy</option>
		                <option value="Business">Business</option>
		                <option value="First">First</option>
		              </select>
		            </div>
		            <div class="rtBtn">
											<button type="submit" form="search" name="search">Find Flights</button>
		            </div>
						</form>
		    </div> <!-- roundtrip -->
		    <div id="oneW" class="tab-pane fade">
		      <div class="cityRow">
		            <input type="text" name="fromCity" placeholder="From: City or airport">
		            <input type="text" name="toCity" placeholder="To: City or airport">
		      </div>
		            <div class="timeRow">
		              <input type="date" name="departDate">
		              <input type="date" name="returnDate" readonly style="background: #b3b3b3">
		            </div>

		            <div class="countRow">
		              <select name="count">
		                <option value="">1(16+years)</option>
		                <option value="">2(16+years)</option>
		                <option value="">3(16+years)</option>
		                <option value="">4(16+years)</option>
		                <option value="">5(16+years)</option>
		                <option value="">6(16+years)</option>
		                <option value="">7(16+years)</option>
		              </select>
		            </div>

		            <div class="rankRow">
		              <select name="rank">
		                <option value="">Economy</option>
		                <option value="">Preminum Economy</option>
		                <option value="">Business</option>
		                <option value="">First</option>
		              </select>
		            </div>
								<div class="rtBtn">
									<form action="http://cs3380.rnet.missouri.edu/group/CS3380GRP15/www/Click_here/flightbooking.php">
											<button type="submit">Find Flights</button>
									</form>
								</div>
		    </div> <!-- oneway -->
		   </div> <!-- pilltab -->
		<!--   </div> tab-content -->
		</div> <!-- menu0 -->
  	<!-- </div>   -->
    <div id="menu1" class="tab-pane fade">
    	<div class="pill-container">
		  <ul class="nav nav-pills">
		    <li class="active"><a data-toggle="pill" href="#reservationN">Reservation Number</a></li>
		    <li><a data-toggle="pill" href="#e-Ticket">e-Ticket number</a></li>
		  </ul>

		  <div class="tab-content">
		    <div id="reservationN" class="tab-pane fade in active">
		      <div class="cityRow">
		            <input type="text" name="ticketN" placeholder="Reservation Number: Alphanumeric characters [6 digits]">
		            <input type="text" name="firstN" placeholder="First(Given)name: ex. DAVIDSCOTT">

		            <input type="text" name="lastN" placeholder="Last(Family)name: ex. JOHNSON">
		      </div>

					<div class="rtBtn">
						<form action="http://cs3380.rnet.missouri.edu/group/CS3380GRP15/www/Click_here/flightbooking.php">
								<button type="submit">Find Flights</button>
						</form>
					</div>
		    </div>
		    <div id="e-Ticket" class="tab-pane fade">
		      <div class="cityRow">
		            <input type="text" name="ticketN" placeholder="e-Ticket number: Numberic digits [13 digits]">
		            <input type="text" name="firstN" placeholder="First(Given)name: ex. DAVIDSCOTT">

		            <input type="text" name="lastN" placeholder="Last(Family)name: ex. JOHNSON">
		       </div>


		            <div class="rtBtn">
									<form action="http://cs3380.rnet.missouri.edu/group/CS3380GRP15/www/flightbooking.php">
    									<button type="submit">Search</button>
									</form>
		            </div>
		    </div>

		  </div> <!-- tabcontent -->
		</div> <!-- pillcontainer -->
    </div> <!-- menu1 -->
    <div id="menu2" class="tab-pane fade">
    	<p>Online Check-in is available from 24 hours until 75 minutes prior to the departure time of the OUR operated international flight.</p>
    	<div class="pill-container">
		  <ul class="nav nav-pills">
		    <li class="active"><a data-toggle="pill" href="#CreservationN">Reservation Number</a></li>
		    <li><a data-toggle="pill" href="#Ce-Ticket">e-Ticket number</a></li>
		  </ul>

		  <div class="tab-content">
		    <div id="CreservationN" class="tab-pane fade in active">
		      <div class="cityRow">
		            <input type="text" name="ticketN" placeholder="Reservation Number: Alphanumeric characters [6 digits]">
		            <input type="text" name="firstN" placeholder="First(Given)name: ex. DAVIDSCOTT">

		            <input type="text" name="lastN" placeholder="Last(Family)name: ex. JOHNSON">
		      </div>

					<div class="rtBtn">
						<form action="http://cs3380.rnet.missouri.edu/group/CS3380GRP15/www/flightbooking.php">
								<button type="submit">Find Flights</button>
						</form>
					</div>
		    </div>
		    <div id="Ce-Ticket" class="tab-pane fade">
		      <div class="cityRow">
		            <input type="text" name="ticketN" placeholder="e-Ticket number: Numberic digits [13 digits]">
		            <input type="text" name="firstN" placeholder="First(Given)name: ex. DAVIDSCOTT">

		            <input type="text" name="lastN" placeholder="Last(Family)name: ex. JOHNSON">
		       </div>


					 <div class="rtBtn">
						 <form action="http://cs3380.rnet.missouri.edu/group/CS3380GRP15/www/flightbooking.php">
								 <button type="submit">Find Flights</button>
						 </form>
					 </div>
		    </div>

		  </div> <!-- pilltabcontent -->
		</div> <!-- pillcontainer -->


    
    </div> <!-- menu2 -->
    <div id="menu3" class="tab-pane fade">

	  </div>
  <!-- </div> -->

		<!-- <div class="imgHolder">
			<ul>
				<li><img src="images/main_02.jpg"></li>
				<li><img src="images/main_01.jpg"></li>
				<li><img src="images/main_20161028_asia_e.jpg"></li>
			</ul>

		</div> -->


</div>
</div> <!-- outside content -->
<div class="imgHolder">
			<ul>
				<li><img src="images/main_02.jpg"></li>
				<li><img src="images/main_01.jpg"></li>
				<li><img src="images/main_20161028_asia_e.jpg"></li>
			</ul>

		</div>
</div> <!-- outside container -->

</div> <!-- box_img -->

	<!-- </div>

</div> -->
<!--
<?php

/*	$link = mysqli_connect('localhost', 'CS3380GRP15', 'ee56fe1', 'CS3380GRP15') or die ("Connection error: " . mysqli_connect_error());


	if (isset($_POST['submit'])){
		echo "<h1>PHP</h1>";
		$depart_city=$_POST['fromCity'];
		$arrive_city=$_POST['toCity'];
		$depart_date=$_POST['departDate'];
		$return_date=$_POST['returnDate'];
		$numPeople=$_POST['count'];

		echo "here";

		$sql = ("SELECT * FROM Flights WHERE departure_date LIKE '%departDate%' AND arrival_date LIKE '%returnDate%' AND departure_loc LIKE '%fromCity%'  AND destination_loc LIKE '%toCity%'") or die ("Connection error 263" . mysqli_connect_error());

			$result = mysqli_query($link, $sql) or die ("Query error: " . mysqli_error($link));
			if($stmt = mysqli_prepare($link,$sql)){
				mysqli_stmt_bind_param($stmt, 'ssss', $depart_date, $return_date, $depart_city, $arrive_city);
				if(mysqli_stmt_execute($stmt)){

					mysqli-stmt_execute($stmt);
					$result = mysqli_stmt_get_result($stmt);

					echo "<table class='table'>";
					while ($field = mysqli_fetch_field($result)){
						echo "<th>".$field->name."</th>";
					}
					echo "<th>Book Now</th>";
					while ($row = mysqli_fetch_row($result)){
						echo "<tr>";
						foreach($row as $r) {
							echo "<td>$r</td>";
						} ?>
							<td>
							<form method="POST" action="booktrip.php">
								<input type="submit" name="select" value="Select" class="btn btn-primary"></input>
								<input type="hidden" name="xFlight_id" value="<?= $row[0]; ?>"></input>
							</form>
							</td>
							</tr>
						<?php
					}
					}
					else{
						echo"Failed to Prepare statement";}
					?>
					</table>
		<?php }
		} */?>-->
	</body>
</html>
