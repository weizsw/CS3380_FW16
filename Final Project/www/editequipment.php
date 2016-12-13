<!DOCTYPE HTML>
<html>
<head>

    </head>

    <body>
	 <form method="POST" action="editequipment.php">
	  	  <div class="form-group">
	   <label for="rank" class="col-sm-2 control-label">Plane Id</label>
	   <div class="col-sm-10"><input type="text" name="plane_id" class="form-control" value="<?php echo$_POST['plane_id'];?>" <br></div>
       
       <div class="form-group">
	   <label for="rank" class="col-sm-2 control-label">Seating Capacity</label>
	   <div class="col-sm-10"><input type="number" name="seating_capacity" class="form-control" value="<?php echo$_POST['seating_capacity'];?>" <br></div>

	   <div class="form-group">
	   <label for="rank" class="col-sm-2 control-label">Number of Pilots</label>
	   <div class="col-sm-10"><input type="number" name="num_pilots" class="form-control" value="<?php echo$_POST['num_pilots'];?>" <br></div>
       
       <div class="form-group">
	   <label for="rank" class="col-sm-2 control-label">Number of Attendants</label>
	   <div class="col-sm-10"><input type="number" name="num_attendants" class="form-control" value="<?php echo$_POST['num_attendants'];?>" <br></div>

	   <div class="form-group">
	   <label for="status" class="col-sm-2 control-label">Plane Type</label>
	   <div class="col-sm-10"><input type="text" name="plane_type" class="form-control" value="<?php echo$_POST['plane_type'];?>" <br></div> 
      <div class="form-group">
	   <label for="username" class="col-sm-2 control-label">Serial Number(cannot edit)</label>
	   <div class="col-sm-10"><input type="text" name="serial_num" cass="form-control" value="<?php echo$_POST['serial_num'];?>" readonly><br></div>

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
		$sql = "UPDATE Equipment SET plane_id= ? , seating_capacity= ? , num_pilots= ? , num_attendants= ? , plane_type= ? WHERE serial_num= ? ";
		$plane_id=($_POST['plane_id']);
$seating_capacity=($_POST['seating_capacity']);
$num_pilots=($_POST['num_pilots']);
$num_attendants=($_POST['num_attendants']);
$plane_type=($_POST['plane_type']);
$serial_num=($_POST['serial_num']);
		if($stmt = mysqli_prepare($link,$sql)){
			mysqli_stmt_bind_param($stmt,"ssssss",$_POST['plane_id'], $_POST['seating_capacity'], $_POST['num_pilots'],$_POST['num_attendants'],$_POST['plane_type'],$_POST['serial_num']);
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
