<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
<form method "POST" action="deleteuser.php">
<div class="form-group">
<label for="username" class="col-sm-2 control-label">Are you sure you want to delete:</label>
<div class="col-sm-10"><input type="text" name="username" cass="form-control" value="<?php echo $_POST['username'];?>" readonly>
<br></div>
</div>
<input type="submit" name="submit" value="Delete">
</form>
<?php 

        session_start();
        $username = $_SESSION['login'];
		
		//if(isset($_POST['submit'])){
        $link = mysqli_connect('localhost','CS3380GRP15','ee56fe1','CS3380GRP15') or die ("Failed to connect: ".mysqli_error($link));
    

if(isset($_POST['submit'])){
	$sql = "DELETE FROM Authentication WHERE username= ?";
    if($stmt = mysqli_prepare($link, $sql)){
    	mysqli_stmt_bind_param($stmt, "s", $_POST['username']);
		if(mysqli_stmt_execute($stmt)){
        echo "delete succesful<br>";
    }else{
    	echo "delete not succesful<br>";
    }
}else{
	echo "Prepaere Error<br>";
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
