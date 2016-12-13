<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>register</title>
     <link rel="stylesheet" type="text/css" href="css2/style.css">


</head>
<style type="text/css">

  p {
    text-align: center;
  }

  li {
    list-style-type: none;
  }
  .align {
    text-align: center;
    margin: 0 auto;

  }
  body{
    text-align: center;
    margin: center;
    
  }



</style>



<body>

  <body class="align">
    <div id="signup" class="site__container">
      <h1 style="color: white;">Sign Up for Free</h1>
      <div class="grid__container">
      <li><a href="Click_here/index.php">Home</a></li>
      <form action="" method="POST" class="form form--login">

       <!--  <div class="top-row form__field">
          <div class="field-wrap">
            <label>
              First Name<span class="req">*</span>
            </label>
            <input name="fname" type="text" placeholder="First Name" required autocomplete="off" />
          </div> -->

          <div class="form__field">
          <label class="fontawesome-user" for="login__username"><span class="hidden">First Name</span></label>
          <input id="login__username" type="text" class="form__input" placeholder="First Name" name="fname" required autocomplete="off">
        </div>
          

         <!--  <div class="field-wrap">
            <label>
              Last Name<span class="req">*</span>
            </label>
            <input name="lname" type="text" placeholder="Last Name" required autocomplete="off"/>
          </div>
        </div> -->
        <div class="form__field">
          <label class="fontawesome-user" for="login__username"><span class="hidden">Last Name</span></label>
          <input id="login__username" type="text" class="form__input" placeholder="Last Name" name="lname" required autocomplete="off">
        </div>

        <!-- <div class="field-wrap">
		   <label>
			Username<span class="req">*</span>
		   </label>
          <input placeholder="Username" name="username" type="text"required autocomplete="off"/>
        </div> -->
        <div class="form__field">
          <label class="fontawesome-user" for="login__username"><span class="hidden">Username</span></label>
          <input id="login__username" type="text" class="form__input" placeholder="Username" name="username" required autocomplete="off">
        </div>

        <!-- <div class="field-wrap">
		   <label>
			Password<span class="req">*</span>
		   </label>
          <input name="password" placeholder="Password" type="password" required autocomplete="off"/>
        </div> -->
        <div class="form__field">
          <label class="fontawesome-user" for="login__username"><span class="hidden">Password</span></label>
          <input id="login__username" type="password" class="form__input" placeholder="Password" name="password" required autocomplete="off">
        </div>

		<!-- <div class="field-wrap">
    <label>
			Type<span class="req">*</span>
		   </label>
		   <input type="text" name="type" placeholder="Pilot, Customer etc." required autocomplete="off"/>			
		</div> -->

    <div class="form__field">
          <label class="fontawesome-user" for="login__username"><span class="hidden">Type</span></label>
          <input id="login__username" type="text" class="form__input" placeholder="Pilot, Customer etc." name="type" required autocomplete="off">
        </div>

       <!--  <input type="submit" name="submit" class="button button-block"/>Sign Up!</input> -->
       <div class="form__field">
          <input type="submit" value="Sign Up!" name="submit">
        </div>
      </form>
    <!-- </div> -->

    </div>
    <p id="infobox"></p>
  </div>

</body>
<script type="text/javascript">

  function infobox() {
    var text = "Registered Successfully!";
    var result = text.fontcolor("#37FF25");
    return result
  }

  function invalid_username() {
    var text = "Username already exist.";
    var result = text.fontcolor("#F51215");
    return result
  }
</script>

<?php

  if(isset($_POST['submit'])) {
	$type = $_POST['type'];
    $link = mysqli_connect('localhost','CS3380GRP15','ee56fe1','CS3380GRP15') or die("Connect Error " . mysqli_error($link));
    $sql = "INSERT INTO Authentication (username, password, type) VALUES (?, ?, ?)";

	$username = $_POST['username'];
	$password = $_POST['password'];
    $password = md5($password);
	
    if($stmt = mysqli_prepare($link, $sql)) {
                        //value in form
      mysqli_stmt_bind_param($stmt, "sss",$username,$password,$type);
      if(mysqli_stmt_execute($stmt)) {
        echo '<script type="text/javascript">';
		echo " You have Sucessfully  Signed up.";
        echo "document.getElementById('infobox').innerHTML = infobox();";
        echo "</script>";
      }
      else {
        echo '<script type="text/javascript">';
		echo "Registration Failed";
        echo "document.getElementById('infobox').innerHTML = invalid_username();";
        echo "</script>";
      }
    }
    else {
      die("Prepared Failed Line 96");
    }

//log
date_default_timezone_set("America/Chicago");
    $key=NULL;
    $ip=$_SERVER['REMOTE_ADDR'];
    $time=date("h:i:s");
    $date=date("Y-m-d");
    $action_type="Registration";
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
