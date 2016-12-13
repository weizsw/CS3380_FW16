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
      <a href="http://cs3380.rnet.missouri.edu/group/CS3380GRP15/www/administrator.php">Admin?    </a>
      <a href="http://cs3380.rnet.missouri.edu/group/CS3380GRP15/www/log.php">Master LOG</a>

      <hr>
    </div>
    <div><h1>Welcome Back Admin!</h1> </div>
    
    <div class="container">

  <?php

  session_start();
		if(isset($_SESSION['login'])){
          $username=$_SESSION['login'];
					  
           $link = mysqli_connect('localhost','CS3380GRP15','ee56fe1','CS3380GRP15') or die ("Connection error on Line 51: ". mysqli_connect_error());
            $info = "SELECT * FROM Authentication;";
            global $link;
            $result = mysqli_query($link,$info) or die("Query error on line 59: ".mysqli_error($link));
              echo "<br><br>";
              echo "<div class='row'>";
              echo "<h2>All Users</h2>"; ?>
			  <ul>			
			<div class='dropdownContainer'>
			<li class='dropdown'><a class='dropdown-toggle' href='#' data-toggle='dropdown'><button class='dropbtn'>Create New</button></a>
				<div class='dropdown-menu'>
				<form class='form-horizontal' id='addUser' action='' method='POST' accept-charset='utf-8'>
					<input class='input_style first-row' type='text' name='username' required placeholder='username'><br>
					<input class='input_style' type='password' name='password' required placeholder='password'><br>
                    <input class='input_style' type='radio' name='type' value='Admin'>Admin
                    <input class='input_style' type='radio' name='type' value='Pilot'>Pilot
                    <input class='input_style' type='radio' name='type' value='Attendant'>Attendant
                    <input class='input_style' type='radio' name='type' value='Customer'>Customer
                    <br>
					<button class='login-btn' name='addUser' form='addUser' type='submit'>Create</button>
					</form>
			</div>
            </li>
			</div>
  		</ul>

<?php

			  echo "</div>";
              echo"<table>";
              while($fieldinfo = mysqli_fetch_field($result)){
                echo "<th>".$fieldinfo->name. "</th>";
                
              }
			  	echo "<th>Update</th>";
				echo "<th>Delete</th>";
              while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
                echo"<tr>";
                foreach($row as $r){
                  echo"<td>$r</td>";
                } ?>
				<td>
				<form method="POST" action="edituser.php">
					<input type="submit" name="edit" value="Edit" class="btn btn-primary"></input>
					<input type="hidden" name="newusername" value="<?= $row[0]; ?>"></input>
					<input type="hidden" name="password" value="<?= $row[1]; ?>"></input>
					<input type="hidden" name="type" value="<?= $row[2];?>"></input>
					<input type="hidden" name="column" value='username'/>
					<input type="hidden" name="table" value='Authentication'/>
				</form>
				</td>
				<td>
				<form method="POST" action="">
					<input type="submit" name="delete" value="Delete" class="btn btn-danger"></input>
					<input type="hidden" name="primary" value='<?= $row[0]; ?>'/>
					<input type="hidden" name="column" value='username'/>
					<input type="hidden" name="table" value='Authentication'/>
				</form>
				</td>
				<?php
                echo"</tr>";
              }
              echo"</table>";

//create user
			if(isset($_POST['addUser'])) {
				$type = $_POST['type'];
				$sql = "INSERT INTO Authentication (username, password, type) VALUES (?, ?, ?)";

				$newusername = $_POST['username'];
				$password = $_POST['password'];
				$password = md5($password);
				
				if($stmt = mysqli_prepare($link, $sql)) {
									//value in form
				mysqli_stmt_bind_param($stmt, "sss",$newusername,$password,$type);
				if(mysqli_stmt_execute($stmt)) {
					echo '<script type="text/javascript">';
					echo "New User Created";
					echo "document.getElementById('infobox').innerHTML = infobox();";
					echo "</script>";
				}
				else {
					echo '<script type="text/javascript">';
					echo "Creation Failed";
					echo "document.getElementById('infobox').innerHTML = invalid_username();";
					echo "</script>";
				}
				}
				else {
				die("Prepared Failed Line 96");
				}

					date_default_timezone_set("America/Chicago");
						$key=NULL;
						$ip=$_SERVER['REMOTE_ADDR'];
						$time=date("h:i:s");
						$date=date("Y-m-d");
						$action_type="Registration/Admin";
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

//equipment table
            $eqp = "SELECT * FROM Equipment";

            $result = mysqli_query($link,$eqp) or die("Query error on line 59: ".mysqli_error($link));
              echo "<br><br>";
              echo "<div class='row'>";
              echo "<h2>All Equipment</h2>";
			  echo "<ul>";
			  ?>			
			<div class='dropdownContainer'>
			<li class='dropdown'><a class='dropdown-toggle' href='#' data-toggle='dropdown'><button class='dropbtn'>Create New</button></a>
				<div class='dropdown-menu'>
				<form class='form-horizontal' id='addEqp' action='' method='POST' accept-charset='utf-8'>
					<input class='input_style first-row' type='text' name='planeid' placeholder='plane id'><br>
					<input class='input_style' type='number' name='capacity'  min='0' max='300' placeholder='capacity'><br>
					<input class='input_style' type='number' name='num_pilot'  min='1' max='3' placeholder='number of pilot'><br>
					<input class='input_style' type='number' name='num_attend'  min='1' max='10' placeholder='number of attendants'><br>
                    <input class='input_style first-row' type='text' name='planetype' placeholder='plane type'><br>
					<input class='input_style first-row' type='text' name='serialnum' placeholder='serial number'><br>

					<button class='login-btn' name='addEqp' form='addEqp' type='submit'>Create</button>
					</form>
                    </div>
            </li>
			</div>
  		</ul>
	<?php
			  echo "</div>";
              echo"<table>";
              while($fieldinfo = mysqli_fetch_field($result)){
                echo "<th>".$fieldinfo->name. "</th>";
              }
			  	echo "<th>Update</th>";
				echo "<th>Delete</th>";
              while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
                echo"<tr>";
                foreach($row as $r){
                  echo"<td>$r</td>";
                } ?>
				<td>
				<form method="POST" action="editequipment.php">
					<input type="submit" name="edit" value="Edit" class="btn btn-primary"></input>
					<input type="hidden" name="plane_id" value="<?= $row[0]; ?>"/>
					<input type="hidden" name="seating_capacity" value="<?= $row[1]; ?>"/>
					<input type="hidden" name="num_pilots" value="<?= $row[2]; ?>"/>
					<input type="hidden" name="num_attendants" value="<?= $row[3]; ?>"/>
					<input type="hidden" name="plane_type" value="<?= $row[4]; ?>"/>
					<input type="hidden" name="serial_num" value="<?= $row[5]; ?>"></input>
					<input type="hidden" name="column" value='serial_num'/>
					<input type="hidden" name="table" value='Equipment'/>
				</form>
				</td>
				<td>
				<form method="POST" action="">
					<input type="submit" name="delete" value="Delete" class="btn btn-danger"></input>
					<input type="hidden" name="primary" value="<?= $row[5];?>"/>
					<input type="hidden" name="column" value='serial_num'/>
					<input type="hidden" name="table" value='Equipment'/>
				</form>
				</td>
				<?php
                echo"</tr>";
              }
              echo"</table>";

//create equipment
			if(isset($_POST['addEqp'])) {
				$sql = "INSERT INTO Equipment VALUES (?,?,?,?,?,?)";

				$plane_id = $_POST['planeid'];
				$capacity = $_POST['capacity'];
				$numPilot = $_POST['num_pilot'];
				$numAttd = $_POST['num_attend'];
				$plane_type = $_POST['planetype'];
				$serial_num = $_POST['serialnum'];
				
				if($stmt = mysqli_prepare($link, $sql)) {
									//value in form
				mysqli_stmt_bind_param($stmt, "ssssss",$plane_id,$capacity,$numPilot,$numAttd,$plane_type,$serial_num);
				if(mysqli_stmt_execute($stmt)) {
					echo '<script type="text/javascript">';
					echo "New Plane Created";
					echo "document.getElementById('infobox').innerHTML = infobox();";
					echo "</script>";
				}
				else {
					echo '<script type="text/javascript">';
					echo "Creation Failed";
					echo "document.getElementById('infobox').innerHTML = invalid_username();";
					echo "</script>";
				}
				}

						date_default_timezone_set("America/Chicago");
						$key=NULL;
						$ip=$_SERVER['REMOTE_ADDR'];
						$time=date("h:i:s");
						$date=date("Y-m-d");
						$action_type="Create Equipment/Admin";
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

           
//flight table
            $sql = "SELECT * FROM Flights";

            $result = mysqli_query($link,$sql) or die("Query error on line 59: ".mysqli_error($link));
              echo "<br><br>";
              echo "<div class='row'>";
              echo "<h2>All Flights</h2>";
			  echo "<ul>";
			  ?>			
			<div class='dropdownContainer'>
			<li class='dropdown'><a class='dropdown-toggle' href='#' data-toggle='dropdown'><button class='dropbtn'>Create New</button></a>
				<div class='dropdown-menu'>
				<form class='form-horizontal' id='addFlight' action='' method='POST' accept-charset='utf-8'>
					<input class='input_style first-row' type='number' name='flight_id'  min='0' max='9999' placeholder='flight id'><br>
                    <input class='input_style' type='text' name='planeid' placeholder='plane id'><br>
                    Departure Date: <input class='input_style' type='date' name='departDate'><br>
                    Departure Time: <input class='input_style' type='Time' name='departTime'><br>
                    <input class='input_style' type='text' name='departLoc' placeholder='Departure Location'><br>
                    <input class='input_style' type='text' name='destinationLoc' placeholder='Destination Location'><br>
                    Arrival Time: <input class='input_style' type='Time' name='arriveTime'><br>
                    Arrival Date: <input class='input_style' type='date' name='arriveDate'><br>
					$<input class='input_style' type='number' name='price' placeholder='Price of Flight'><br>
					<button class='login-btn' name='addFlight' form='addFlight' type='submit'>Create</button>
					</form>
                    </div>
            </li>
			</div>
  		</ul>
		  <?php
			  echo "</div>";
              echo"<table>";
              while($fieldinfo = mysqli_fetch_field($result)){
                echo "<th>".$fieldinfo->name. "</th>";
              }
			  	echo "<th>Update</th>";
				echo "<th>Delete</th>";
              while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
                echo"<tr>";
                foreach($row as $r){
                  echo"<td>$r</td>";
                } ?>
				<td>
				<form method="POST" action="editflights.php">
					<input type="submit" name="edit" value="Edit" class="btn btn-primary"></input>
					<input type="hidden" name="newusername" value="<?= $row[0]; ?>"></input>
					<input type="hidden" name="flight_id" value="<?= $row[0]; ?>"/>
					<input type="hidden" name="plane_id" value="<?= $row[1]; ?>"/>
					<input type="hidden" name="departure_date" value="<?= $row[2]; ?>"/>
					<input type="hidden" name="departure_time" value="<?= $row[3]; ?>"/>
					<input type="hidden" name="departure_loc" value="<?= $row[4]; ?>"/>
					<input type="hidden" name="destination_loc" value="<?= $row[5]; ?>"/>
					<input type="hidden" name="arrival_time" value="<?= $row[6]; ?>"/>
					<input type="hidden" name="arrival_date" value="<?= $row[7]; ?>"/>
					<input type="hidden" name="price_of_flight" value="<?= $row[8]; ?>"/>
					<input type="hidden" name="column" value='flight_id'/>
					<input type="hidden" name="table" value='Flights'/>
				</form>
				</td>
				<td>
				<form method="POST" action="">
					<input type="submit" name="delete" value="Delete" class="btn btn-danger"></input>
					<input type="hidden" name="primary" value="<?= $row[0];?>"/>
					<input type="hidden" name="column" value='flight_id'/>
					<input type="hidden" name="table" value='Flights'/>
				</form>
				</td>
				<?php
                echo"</tr>";
              }
              echo"</table>";
           }

//create flight
			if(isset($_POST['addFlight'])) {
				$sql = "INSERT INTO Flights VALUES (?,?,?,?,?,?,?,?,?)";

				$flyid = $_POST['flight_id'];
				$planeid = $_POST['planeid'];
				$depart_date = $_POST['departDate'];
				$depart_time = $_POST['departTime'].':00';
				$depart_loc = $_POST['departLoc'];
				$destination_loc = $_POST['destinationLoc'];
				$arrive_time = $_POST['arriveTime'].':00';
				$arrive_date = $_POST['arriveDate'];
				$price = $_POST['price'];
				
				if($stmt = mysqli_prepare($link, $sql)) {
									//value in form
				mysqli_stmt_bind_param($stmt, "sssssssss",$flyid,$planeid,$depart_date,$depart_time,$depart_loc,$destination_loc,$arrive_time,$arrive_date,$price);
				if(mysqli_stmt_execute($stmt)) {
					echo '<script type="text/javascript">';
					echo "New Plane Created";
					echo "document.getElementById('infobox').innerHTML = infobox();";
					echo "</script>";
				}
				else {
					echo '<script type="text/javascript">';
					echo "Creation Failed";
					echo "document.getElementById('infobox').innerHTML = invalid_username();";
					echo "</script>";
				}
				}

						date_default_timezone_set("America/Chicago");
						$key=NULL;
						$ip=$_SERVER['REMOTE_ADDR'];
						$time=date("h:i:s");
						$date=date("Y-m-d");
						$action_type="Create Flight/Admin";
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


//delete
		   if(isset($_POST['delete'])){
				$primary=$_POST['primary']; 
				$column=$_POST['column'];
				$table = $_POST['table'];
				$link = mysqli_connect('localhost', 'CS3380GRP15', 'ee56fe1', 'CS3380GRP15') or die ("Connection error: " . mysqli_connect_error());
				$sql="DELETE FROM $table WHERE $column = ?";
					$stmt = mysqli_prepare($link, $sql);
							if(mysqli_stmt_bind_param($stmt, 's', $primary)){

								if(	mysqli_stmt_execute($stmt)){
									echo "Class deleted.";		
								}
								else {
									echo "Error.";
								}
							}
							else {
								echo "Bind error.";
							}

			}
        

  ?>
  </div>
  </body>
</html>
