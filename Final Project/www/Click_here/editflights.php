<!DOCTYPE HTML>
<html>
<head>

    </head>

    <body>
	 <form method="POST" action="editflights.php">
	  	 

		<div class="form-group">
	   <label for="rank" class="col-sm-2 control-label">Flight Id(cannot edit)</label>
	   <div class="col-sm-10"><input type="text" name="flight_id" class="form-control" value="<?php echo$_POST['flight_id'];?>"readonly> <br></div></div>
       
       <div class="form-group">
	   <label for="rank" class="col-sm-2 control-label">Plane Id(cannot edit)</label>
	   <div class="col-sm-10"><input type="text" name="plane_id" class="form-control" value="<?php echo$_POST['plane_id'];?>" readonly><br></div></div>
       
       <div class="form-group">
	   <label for="rank" class="col-sm-2 control-label">Departure Date</label>
	   <div class="col-sm-10"><input type="date" name="departure_date" class="form-control" value="<?php echo$_POST['departure_date'];?>"> <br></div></div>

	   <div class="form-group">
	   <label for="status" class="col-sm-2 control-label">Departure Time</label>
	   <div class="col-sm-10"><input type="time" name="departure_time" class="form-control" value="<?php echo$_POST['departure_time'];?>"> <br></div></div>
      
      <div class="form-group">
	   <label for="username" class="col-sm-2 control-label">Departure Location</label>
	   <div class="col-sm-10"><input type="text" name="departure_loc" cass="form-control" value="<?php echo$_POST['departure_loc'];?>" ><br></div></div>
       
       <div class="form-group">
	   <label for="username" class="col-sm-2 control-label">Destination Location</label>
	   <div class="col-sm-10"><input type="text" name="destination_loc" cass="form-control" value="<?php echo$_POST['destination_loc'];?>" ><br></div></div>

	   <div class="form-group">
	   <label for="status" class="col-sm-2 control-label">Arrival Time</label>
	   <div class="col-sm-10"><input type="time" name="arrival_time" class="form-control" value="<?php echo$_POST['arrival_time'];?>"> <br></div></div>
       
       <div class="form-group">
	   <label for="rank" class="col-sm-2 control-label">Arrival Date</label>
	   <div class="col-sm-10"><input type="date" name="arrival_date" class="form-control" value="<?php echo$_POST['arrival_date'];?>"> <br></div></div>
       
       <div class="form-group">
	   <label for="rank" class="col-sm-2 control-label">Price nnnnof Flight</label>
	   <div class="col-sm-10">$<input type="number" name="price_of_flight" class="form-control" value="<?php echo$_POST['price_of_flight'];?>"> <br></div></div>

           <input type="submit" name="submit" value="Update">
	 </form>
<br>
<br>
<br>
        

        <?php 

        session_start();
        $username = $_SESSION['login'];
		
		//if(isset($_POST['submit'])){
        $link = mysqli_connect('localhost','CS3380GRP15','ee56fe1','CS3380GRP15') or die ("Failed to connect: ".mysqli_error($link));
    
	//	$type = mysqli_query($link,"SELECT type FROM Authentication WHERE username = '$username'");
		
	//	while($row = $type->fetch_assoc()){
	//		$employee = $row['type'];
	//	}
	if(isset($_POST['submit'])){
		$sql ="UPDATE Flights SET departure_date=?, departure_time=?, departure_loc=?, destination_loc=? arrival_time=?, arrival_date=?, price_of_flight=?, WHERE flight_id=?";
		$flight_id=($_POST['flight_id']);
		$plane_id=($_POST['plane_id']);
		$departure_date=($_POST['departure_date']);
		$departure_time=($_POST['departure_time']);
		$departure_loc=($_POST['departure_loc']);
		$destination_loc=($_POST['destination_loc']);
		$arrival_time=($_POST['arrival_time']);
		$arrival_date=($_POST['arrival_date']);
		$price_of_flight=($_POST['price_of_flight']);
		if($stmt = mysqli_prepare($link,$sql)){
			mysqli_stmt_bind_param($stmt,"ssssssss", $_POST['departure_date'], $_POST['departure_time'], $_POST['departure_loc'], $_POST['destination_loc'], $_POST['arrival_time'], $_POST['arrival_date'], $_POST['price_of_flight'], $_POST['flight_id']);
			if(mysqli_stmt_execute($stmt)){
				echo "Updated sucessfully<br>";
			}
			else{
				echo "Insertion Error<br>";
			}
		}
		else{
			echo "Prepare Error<br>";
		}

		date_default_timezone_set("America/Chicago");
		$key=NULL;
		$ip=$_SERVER['REMOTE_ADDR'];
		$time=date("h:i:s");
		$date=date("Y-m-d");
		$action_type="Update Account";
		$user=$username;

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
        ?>

		<form method="POST" action="administratorhomepage.php">
		 <input type="submit" name="done"  value="Done">
		</form>
    
    </body>
</html>
