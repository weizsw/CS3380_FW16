<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Mizzou Airlines Flight Attendant</title>
    <link rel="stylesheet" type="text/css" href="css/css1.css">
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
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
      <a href="http://cs3380.rnet.missouri.edu/group/CS3380GRP15/www/Click_here/index.php">Home</a>
      <a href="http://cs3380.rnet.missouri.edu/group/CS3380GRP15/www/administrator.php">Admin?</a>
      <hr>
    </div>
    <div><h1>Welcome Back! Here's Your Flights</h1> </div>
    
    <div class="container">

  <?php

 			session_start();
			if(isset($_SESSION['login'])){
            $username=$_SESSION['login'];
					  
            $link = mysqli_connect('localhost','CS3380GRP15','ee56fe1','CS3380GRP15') or die ("Connection error on Line 51: ". mysqli_connect_error());
            $info = "SELECT * FROM FlightAttendant WHERE username  = '$username';";
            
            $result = mysqli_query($link,$info) or die("Query error on line 59: ".mysqli_error($link));
              echo "<br><br>";
              echo "<div class='row'>";
              echo "<h2>Your Information</h2>";
              echo"<table>";
              while($fieldinfo = mysqli_fetch_field($result)){
                echo "<th>".$fieldinfo->name. "</th>";
              }
              while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
                echo"<tr>";
                foreach($row as $r){
                  echo"<td>$r</td>";
                }
				echo"<td>";
			    echo"<form method='POST' action='editattendant.php'>";
				echo"<input type='submit' name='edit' value='Edit' class='btn btn-danger'>";
				echo"<input type='hidden' name='username' value='$row[0]'>";
				echo"<input type='hidden' name='rank' value='$row[1]'>";
				echo"<input type='hidden' name='status' value='$row[2]'>";
				echo"<input type='hidden' name='total_flyingHours' value='$row[3]'>";
				echo"</form>";
				echo"</td>";
				
				 
                echo"</tr>";
              }
              echo"</table>";
              
  ?>
      </div>

  <?php
            

            $sql = "SELECT Flights.flight_id, Flights.plane_id, Flights.departure_date, Flights.departure_time, Flights.departure_loc, Flights.arrival_date, Flights.arrival_time, Flights.destination_loc, Flights.price_of_flight FROM Flights INNER JOIN FlightEmp ON Flights.flight_id=FlightEmp.flight_id WHERE FlightEmp.username='$username' ORDER BY Flights.departure_date";

            $result = mysqli_query($link,$sql) or die("Query error on line 59: ".mysqli_error($link));
              echo "<br><br>";
              echo "<div class='row'>";
              echo "<h2>Your Flights</h2>";
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
              echo "</div>";
           }

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
        

  ?>
  </div>
  </body>
</html>
