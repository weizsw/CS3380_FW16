<html>


	<head>
        
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"><!-- Optional theme -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script><!-- Latest compiled and minified JavaScript -->

	</head>
	
	<link rel="stylesheet" type="text/css" href="css/updatebooking.css">


<body>
<div class="header">

	<img class="logo" src="images/Screen Shot 2016-11-23 at 10.38.09 PM.png">
	<h1>Mizzou Airline</h1>
	<div class="home"><a href="http://cs3380.rnet.missouri.edu/group/CS3380GRP15/www/Click_here/">Home</a></div>
	
</div>

<div class="progress">
	<p class="pacman"></p><span>Flight Search</span>
	<p class="active"></p><span>Passenger Information</span>
	<p class="active"></p><span>Seat Request</span>
	<p class="active"></p><span>Purchase</span>
	<p class="pacman"></p><span>Complete</span>
</div>

<h5>Please Confirm Flight Details</h5>
<?php

	if(isset($_POST['select'])){
		$link = mysqli_connect( 'localhost',  'CS3380GRP15', 'ee56fe1', 'CS3380GRP15' ) or die ("Connection error on Line 30: ". mysqli_connect_error());
		$flight_id=$_POST['xFlight_id'];
		$num=0;
		
			$sql = "SELECT * FROM Flights WHERE flight_id = '$flight_id'" or die( "Connection error 35" . mysqli_connect_error());

			$result = mysqli_query($link, $sql) or die ("Query error: 35" . mysqli_error($link));

			echo"<table class='table'>";
              while($fieldinfo = mysqli_fetch_field($result)){
                echo "<th>".$fieldinfo->name. "</th>";              
              }
              while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
                echo"<tr>";
                foreach($row as $r){
                  echo"<td>$r</td>";
                }
                              
                echo"</tr>";
              }
              echo"</table>";
			}

               ?>
<div class="information">
<form action = "http://cs3380.rnet.missouri.edu/group/CS3380GRP15/www/congratsOnBooking.php" method= "POST">
		<input type='text' name='fname' placeholder='First Name'/>
		<input type='text' name='lname' placeholder='Last Name'/>
		<input type='text' name='age' placeholder='Age'/>
		<input type='text' name='num_bags' placeholder='Number of Bags'/>
		<input type='hidden' name='flight_id' value='<?= $flight_id ?>'/>
		<input type='text' name='username' placeholder='Username'/>
		<input type='password' name='password' placeholder='Password'/>
		<div class="submit-btn">
		<input type='submit' name='confirm' value='Continue'/>	
		</div>
</form>
</div>
</body>
</html>
