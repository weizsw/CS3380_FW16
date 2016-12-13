<html>
<head>
<!--  I USE BOOTSTRAP BECAUSE IT MAKES FORMATTING/LIFE EASIER -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"><!-- Optional theme -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script><!-- Latest compiled and minified JavaScript -->
<link rel="stylesheet" type="text/css" href="css/flightbooking.css"> <!-- CSS -->

<style>
table, th, tr{
	text-align: center;
	border-collapse: collapse;
	border: 3px solid black;
	margin: 0 auto;
	border: 1px solid #d2d2d2;
	/* display: none; */
}
table{
	width: 80%;
	/* margin-left: 50px;
	margin-right: 50px; */

}
td{
	border-left: 1px solid #d2d2d2;
	border-right: 1px solid #d2d2d2;
}



/* table th{
	background: black;
} */
</style>
</head>
<body>
<div class="header">

	<img class="logo" src="images/Screen Shot 2016-11-23 at 10.38.09 PM.png">
	<h1>Mizzou Airline</h1>
	<div class="home"><a href="http://cs3380.rnet.missouri.edu/group/CS3380GRP15/www/Click_here/">Home</a></div>
	
</div>

<div class="progress">
	<p class="active"></p><span>Flight Search</span>
	<p class="pacman"></p><span>Passenger Information</span>
	<p class="pacman"></p><span>Seat Request</span>
	<p class="pacman"></p><span>Purchase</span>
	<p class="pacman"></p><span>Complete</span>
</div>
	

	
<!-- <hr> -->

<?php
if(isset($_POST['search'])){
	$link = mysqli_connect( 'localhost',  'CS3380GRP15', 'ee56fe1', 'CS3380GRP15' ) or die ("Connection error on Line 30: ". mysqli_connect_error());

	$depart_city=$_POST['fromCity'];
	$arrive_city=$_POST['toCity'];
	$depart_date=$_POST['departDate'];
	$return_date=$_POST['returnDate'];
	$numPeople=$_POST['count'];

	echo $depart_date;

		$sql = "SELECT * FROM Flights WHERE departure_date LIKE '$depart_date%' AND arrival_date LIKE '%$return_date%' and departure_loc LIKE '%$depart_city%' AND destination_loc LIKE '%$arrive_city%'" or die( "Connection error 35" . mysqli_connect_error());

		$result = mysqli_query($link, $sql) or die ("Query error: 35" . mysqli_error($link));
		
		/*	mysqli_stmt_bind_param($stmt, 'ssss', $depart_date, $stmt, $depart_city, $arrive_city, $stmt, $return_date, $stmt);
			if (mysqli_stmt_execute($stmt)){
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);*/
			echo "<table class = 'table'>";
			while($field = mysqli_fetch_field($result)){
				echo"<th>" . $field->name."</th>";
			}
			echo "<th> Book Now</th>\n";
			while ($row = mysqli_fetch_row($result)){
				echo"<tr>";
				foreach($row as $r){
					echo "<td>$r</td>";
				}?>
				<td>
				<form method="POST" action="updatebooking.php">
				<input type="submit" name="select" value="Book" clss="btn btn-primary"></input>
				<input type="hidden" name ="xFlight_id" value="<?= $row[0]; ?>"></input>
				</form>
				</td>
				</tr>
				<?php
			}

			date_default_timezone_set("America/Chicago");
			$key=NULL;
			$ip=$_SERVER['REMOTE_ADDR'];
			$time=date("h:i:s");
			$date=date("Y-m-d");
			$action_type="Flight Search";
			$user=NULL;

			$log="INSERT INTO Log VALUES (?, ?, ?, ?, ?, ?)";

			if($stmt = mysqli_prepare($link, $log)) {
								//value in form
			mysqli_stmt_bind_param($stmt, "ssssss", $key,$ip,$time,$date,$action_type,$user);
			if(mysqli_stmt_execute($stmt)) {
				echo '<script type="text/javascript">';
					echo "Log Successful";
				echo "document.getElementById('infobox').innerHTML = infobox();";
				echo "</script>";
			}
			else {
				echo '<script type="text/javascript">';
					echo "Log Error";
				echo "document.getElementById('infobox').innerHTML = invalid_username();";
				echo "</script>";
			}
			}
}

			else{
				echo"failed to prepare statement";}
 
?>
		</table>
<?php 
	?>
