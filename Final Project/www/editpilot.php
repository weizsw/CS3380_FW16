<!DOCTYPE HTML>

<html>
<head>
<link rel="stylesheet" type="text/css" href="Click_here/css/editpilot.css">
    </head>

    <body>
    <div class="header">

        <img class="logo" src="Click_here/images/Screen Shot 2016-11-23 at 10.38.09 PM.png">
        <h1>Mizzou Airline</h1>
        <div class="home"><a href="http://cs3380.rnet.missouri.edu/group/CS3380GRP15/www/Click_here/">Home</a>
          <!-- <a href="http://cs3380.rnet.missouri.edu/group/CS3380GRP15/www/administrator.php">Admin?</a> -->
        </div>
        
      </div>
      <div class="form">
	 <form method="POST" action="editpilot.php">
	  

	  <div class="form-group">
	   <label for="username" class="col-sm-2 control-label" style="color: red;">Username(cannot edit)</label>
	   <div class="col-sm-10"><input type="text" name="username" cass="form-control" value="<?php echo $_POST['username'];?>"readonly><br></div>
	   </div>

	   <div class="form-group">
	   <label for="rank" class="col-sm-2 control-label">Rank</label>
	   <div class="col-sm-10"><input type="text" name="rank" class="form-control" value="<?php echo $_POST['rank'];?>"><br></div>
	   </div>

	   <div class="form-group">
	   <label for="status" class="col-sm-2 control-label">Pilot Status</label>
	   <div class="col-sm-10"><input type="text" name="pilot_status" class="form-control" value="<?php echo $_POST['pilot_status'];?>"<br></div>
	   </div>

	   <div class="form-group">
	    <label for"total_flyingHours" class="col-sm-2 control-label">Total Flying Hours</label>
		<div class="col-sm-10"><input type="text" name="total_flyingHours" class="form-control" value="<?php echo $_POST['total_flyingHours'];?>"><br>
		</div>
		</div>
		<input type="submit" name="submit" value="Update">
	 </form>
	 </div>
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
		$sql = "UPDATE Pilot SET rank=?, pilot_status=?, total_flyingHours=? WHERE username = ?";

		if($stmt = mysqli_prepare($link,$sql)){
			mysqli_stmt_bind_param($stmt,"ssss",$_POST['rank'],$_POST['pilot_status'],$_POST['total_flyingHours'],$_POST['username']);
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

		<form method="POST" action="pilotpage.php">
		 <input type="submit" name="done"  value="Done">
		</form>
    
    </body>
</html>
