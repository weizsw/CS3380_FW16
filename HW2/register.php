<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>register</title>
  
  
  
      <link rel="stylesheet" href="css/style.css">

  
</head>
<style type="text/css">
  
  p {
    text-align: center;
  }

  li {
    list-style-type: none;
  }

  

</style>



<body>

  <body class="align">
  
  <div class="site__container">

    <div class="grid__container">
    <li><a href="index.php">Home</a></li>
      <form action="" method="POST" class="form form--login">

        <div class="form__field">
          <label class="fontawesome-user" for="login__username"><span class="hidden">Username</span></label>
          <input id="login__username" type="text" class="form__input" placeholder="Username" name="username" required>
        </div>

        <div class="form__field">
          <label class="fontawesome-lock" for="login__password"><span class="hidden">Password</span></label>
          <input id="login__password" type="password" class="form__input" placeholder="Password" name="password" required>
        </div>

        <div class="form__field">
          <input type="submit" value="Register" name="submit">
        </div>

      </form>

     

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
  
</body>
</html>

<?php 

  include("../secure/database.php");
  
  if(isset($_POST['submit'])) {
    $link = mysqli_connect(HOST,USERNAME,PASSWORD,DBNAME) or die("Connect Error " . mysqli_error($link));
    $sql = "INSERT INTO admin (username, password) VALUES (?, ?)";

    if($stmt = mysqli_prepare($link, $sql)) {
                        //value in form
      mysqli_stmt_bind_param($stmt, "ss", $_POST['username'], $_POST['password']) or die ("Line 27");
      if(mysqli_stmt_execute($stmt)) {
        echo '<script type="text/javascript">';
        echo "document.getElementById('infobox').innerHTML = infobox();";
        echo "</script>";
      }
      else {
        echo '<script type="text/javascript">';
        echo "document.getElementById('infobox').innerHTML = invalid_username();";
        echo "</script>";
      }
    }
    else {
      die("Prepared Failed Line 96");
    }
  }


 ?>


