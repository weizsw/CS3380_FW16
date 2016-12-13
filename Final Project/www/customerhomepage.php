<!DOCTYPE html>
<html>
  <html lang="en"><head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
    <meta charset="utf-8">
    <title>Mizzou Airlines Admin</title>
    <link rel="stylesheet" type="text/css" href="css/css1.css">
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  
  <style>

  table, th, tr{
      text-align: center;
      border-collapse: collapse;
      border: 3px solid black;
      margin: 0 auto;
    }

  table{
      width: 80%;
    }

  td{
      border-left: 3px solid black;
      border-right: 3px solid black;
    }

  h1, h4 {
      text-align: center;
      margin: 0 auto;
    }

</style>

</head>

  <body>
    <div>
      <a href="http://cs3380.rnet.missouri.edu/group/CS3380GRP15/www/Click_here/index.php">Home    </a>


      <hr>
    </div>
    <div><h1>Welcome Back!</h1> </div>
    
    <div class="container">

  <?php

  session_start();
		if(isset($_SESSION['login'])){
          $username=$_SESSION['login'];
					  
           $link = mysqli_connect('localhost','CS3380GRP15','ee56fe1','CS3380GRP15') or die ("Connection error on Line 51: ". mysqli_connect_error());
            
		$log = "SELECT * FROM Log WHERE username  = '$username';";
					
					$result = mysqli_query($link,$log) or die("Query error on line 59: ".mysqli_error($link));
					echo "<br><br>";
					echo "<div class='row'>";
					echo "<h2>Your Log</h2>";
					echo"<table>";
					while($fieldinfo = mysqli_fetch_field($result)){
						echo "<th>".$fieldinfo->name. "</th>";
						
					}
					while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
						echo"<tr>";
						foreach($row as $r){
						echo"<td>$r</td>";
						}
									
						echo"</tr>";
					}
					echo"</table>";			 
		}

  ?>
  </div>
  </body>
</html>
