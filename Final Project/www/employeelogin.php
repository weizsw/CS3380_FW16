<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="css2/style.css">
  <style type="text/css">
    li {
      list-style-type: none;
    }
  </style>
</head>
  <body class="align">
  <div class="site__container">
    <div class="grid__container">
      <li><a href="http://cs3380.rnet.missouri.edu/group/CS3380GRP15/www/Click_here/index.php">Home</a></li>
      <li><a href="administrator.php">Admin?</a></li>
      
      <form action="" method="POST" class="form form--login">

        <div class="form__field">
          <label class="fontawesome-user" for="login__username"><span class="hidden">Employee ID:</span></label>
          <input id="login__username" type="text" class="form__input" placeholder="Employee ID" name="Employee" required>
        </div>

        <div class="form__field">
          <label class="fontawesome-lock" for="login__password"><span class="hidden">Password</span></label>
          <input id="login__password" type="password" class="form__input" placeholder="Password" name="password" required>
        </div>

        <div class="form__field">
          <input type="submit" value="Sign In" name="submit">
        </div>

      </form>

      <p class="text--center">Not a member? <a href="register.php">Sign up now</a> <span class="fontawesome-arrow-right"></span></p>

    </div>

	<?php 
        if(isset($_POST['submit'])){
            $username = $_POST['Employee'];//username and password that the user entered
            $password = $_POST['password'];
            $password = md5($password);
            $link = mysqli_connect('localhost','CS3380GRP15','ee56fe1','CS3380GRP15') or die("connection error: ".mysqli_error());

                $sql ="SELECT * FROM Authentication WHERE username = '$username' AND password = '$password';";
                $result=mysqli_query($link, $sql);
				        $type = mysqli_query($link, "SELECT type FROM Authentication WHERE username = '$username'"); 
                  while ($row = $type->fetch_assoc()) {
                      $employee = $row['type'];
                  }
                echo mysqli_num_rows($result);
                if(mysqli_num_rows($result) > 0 && $employee == 'Attendant' ){	
                    session_start();
                    $_SESSION['login']="$username";
                    header("Location: flightattendant.php");
                }
                else if(mysqli_num_rows($result) > 0 && $employee == 'Pilot'){
                  session_start();
                  $_SESSION['login']="$username";
                  header("Location: pilotpage.php");
                }
                else {
                    echo "Username or password is incorrect.";
                }
                
                date_default_timezone_set("America/Chicago");
                $key=NULL;
                $ip=$_SERVER['REMOTE_ADDR'];
                $time=date("h:i:s");
                $date=date("Y-m-d");
                $action_type="Employee Login";
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
    </div>
</body>
</html>
