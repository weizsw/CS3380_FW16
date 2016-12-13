<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  
  
  
      <link rel="stylesheet" href="css2/style.css">

  
</head>
<style type="text/css">
  li {
    list-style-type: none;
  }
</style>

<body>

  <body class="align">

  <div class="site__container">

    <div class="grid__container">
      <li><a href="Click_here/index.php">Home </a><--  if you are not admin</li>
      <form action="administrator.php" method="POST" class="form form--login">

        <div class="form__field">
          <label class="fontawesome-user" for="login__username"><span class="hidden">Username</span></label>
          <input id="login__username" type="text" class="form__input" placeholder="Username" name="username" required>
        </div>

        <div class="form__field">
          <label class="fontawesome-lock" for="login__password"><span class="hidden">Password</span></label>
          <input id="login__password" type="password" class="form__input" placeholder="Password" name="password" required>
        </div>

        <div class="form__field">
          <input type="submit" value="Sign In" name="submit">
        </div>

      </form>

    </div>

  </div>

</body>
 
<?php

	$link = mysqli_connect('localhost','CS3380GRP15','ee56fe1','CS3380GRP15') or die("Error connecting to database: ".mysqli_error($link));

	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password = md5($password);

		$sql = "SELECT * FROM Authentication WHERE username = '$username' AND password = '$password'";
		$result = mysqli_query($link,$sql);

		if(mysqli_num_rows($result) > 0){
      session_start();
      $_SESSION['login']="$username";
			Header("Location: administratorhomepage.php"); 
		}

    date_default_timezone_set("America/Chicago");
		$key=NULL;
		$ip=$_SERVER['REMOTE_ADDR'];
		$time=date("h:i:s");
		$date=date("Y-m-d");
		$action_type="Admin Login";
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
  
</body>
</html>


