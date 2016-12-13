<!DOCTYPE HTML>

<html>
<head>
<title>EditUser</title>
<link rel="stylesheet" type="text/css" href="Click_here/css/edituser.css">
    </head>

    <body>
    <div class="header">

        <img class="logo" src="Click_here/images/Screen Shot 2016-11-23 at 10.38.09 PM.png">
        <h1>Mizzou Airline</h1>
        <div class="home"><a href="http://cs3380.rnet.missouri.edu/group/CS3380GRP15/www/Click_here/">Home</a>
          <!-- <a href="http://cs3380.rnet.missouri.edu/group/CS3380GRP15/www/administrator.php">Admin?</a> -->
        </div>
        
      </div>
	<?php 
		if(isset($_POST['edit'])){
			$newusername=$_POST['newusername'];
			$type=$_POST['type'];
		}
	?>
	<div class="form">
	 <form method="POST" action="edituser.php">

	  <div class="form-group">
	   <label for="username" class="col-sm-2 control-label" style="color: red;">Username(cannot edit)</label>
	   <div class="col-sm-10"><input type="text" name="username" cass="form-control" value="<?= $newusername ?>"readonly><br></div>
	   </div>

	   <div class="form-group">
	   <label for="rank" class="col-sm-2 control-label">Password</label>
	   <div class="col-sm-10"><input type="text" name="password" class="form-control"placeholder="Enter Password" required<br></div>
		</div>
	   <div class="form-group">
	   <label for="status" class="col-sm-2 control-label">Type(Attendant, Pilot, Admin, Customer)</label>
	   <div class="col-sm-10"><input type="text" name="type" class="form-control" value="<?= $type ?>"<br>
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
		$sql= "UPDATE Authentication SET password= ?, type= ?  WHERE username = ?";
		$newpass=($_POST['password']);
		$newusername=$_POST['username'];
		$type=$_POST['type'];
		if($stmt = mysqli_prepare($link,$sql)) {
			mysqli_stmt_bind_param($stmt,"sss",$newpass,$_POST['type'], $newusername);
			if(mysqli_stmt_execute($stmt)){
				echo "Updated sucessfully<br>";
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
