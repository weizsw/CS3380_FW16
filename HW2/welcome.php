<!DOCTYPE html>
<html>
<head>
	<title>Welcome!</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css">
</head>
<style type="text/css">
	h1{
		text-align: center;
		margin-top: 80px;
		color: #56FF1F;
	}

	h2 {
		color: red;
		text-align: center;
		margin-top: 80px;
	}

	li {
		list-style-type: none;
		text-align: center;
		margin-top: 80px;
	}
</style>
<body>

</body>
</html>



<?php
  include("../secure/database.php");
  
  
    $username = $_POST['username'];
    $password = $_POST['password']; 
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    // $username = mysqli_real_escape_string($username);
    // $password = mysqli_real_escape_string($password);
    $link = mysqli_connect(HOST,USERNAME,PASSWORD,DBNAME) or die("Connect Error " . mysqli_error($link));
    
    $sql = "SELECT * FROM admin WHERE username = '$username' and password = '$password'";

    $result = mysqli_query($link, $sql) or die("Failed to query database ".mysql_error());
    $row = mysqli_fetch_array($result);
    // $active = $row['active'];
    if ($row['username'] == $username && $row['password'] == $password) {

      // session_register("username");
      // $_SESSION['login_user'] = $username;
      echo '<h1>'.$row['username'] . ', You have successfully logged in.</h1>';
      echo '<li><a href="index.php" title="">Go back</a></li>';
      
    }
    else {
      echo '<h2>Wrong username or password!</h2>';
      echo '<li><a href="index.php" title="">Go back</a></li>';
    }

  
  

    
?>