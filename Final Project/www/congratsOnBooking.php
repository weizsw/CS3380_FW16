<html>

<head>
<!--  I USE BOOTSTRAP BECAUSE IT MAKES FORMATTING/LIFE EASIER -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"><!-- Optional theme -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script><!-- Latest compiled and minified JavaScript -->
<link rel="stylesheet" type="text/css" href="Click_here/css/congratsOnBooking.css">

<style>

  h1{
    text-align: center;
    margin: 0 auto;
  }
  img{
    width: 600px;
  }

  .alignCenter{
      margin: 0 auto;
      text-align: center;
    }


</style>

<body>
  <div class="header">

  <img class="logo" src="Click_here/images/Screen Shot 2016-11-23 at 10.38.09 PM.png">
  <h1>Mizzou Airline</h1>
  <div class="home"><a href="http://cs3380.rnet.missouri.edu/group/CS3380GRP15/www/Click_here/">Home</a></div>
  
</div>

<div class="progress">
  <p class="pacman"></p><span>Flight Search</span>
  <p class="pacman"></p><span>Passenger Information</span>
  <p class="pacman"></p><span>Seat Request</span>
  <p class="pacman"></p><span>Purchase</span>
  <p class="active"></p><span>Complete</span>
</div>
  <h1>Thank You For Flying with Mizzou Airlines!! </h1>
  
  <div class="col-md-8">
    <?php
      if(isset($_POST['confirm'])){
        $flight_id=$_POST['flight_id'];
        $num_bags=$_POST['num_bags'];

        echo "<h3>First Name: ".$_POST['fname']."</h3>";
        echo "<h3>Last Name: ".$_POST['lname']."</h3>";
        echo "<h3>Age: ".$_POST['age']."</h3>";
        echo "<h3>Number of Bags: ".$_POST['num_bags']."</h3>";

			  $link = mysqli_connect( 'localhost',  'CS3380GRP15', 'ee56fe1', 'CS3380GRP15' ) or die ("Connection error on Line 30: ". mysqli_connect_error());
		    $result = mysqli_query($link, "SELECT price_of_flight FROM Flights WHERE flight_id = '$flight_id'"); 
          while($row = $result->fetch_assoc()){
              $price = $row['price_of_flight'];
          }
				  echo "<h3>Flight Price: $".$price."</h3>";
            $bag_fee=$num_bags*20;
          echo "<h3>Bag Fee: $".$bag_fee."</h3>";
            $finalprice=$price+$bag_fee+($price*0.05);

          echo "<h3>Final Price with Tax: $".$finalprice."</h3>";

        $auth ="INSERT IGNORE INTO Authentication SET username=?, password=?, type=?";
        $username = $_POST['username'];
        $password=$_POST['password'];
        $type='Customer';
          if($stmt = mysqli_prepare($link, $auth)) {
              
            mysqli_stmt_bind_param($stmt, "sss",$username,$password, $type);

            if(mysqli_stmt_execute($stmt)) {

              echo "Signup Success<br>";
            }
            else {
              echo "Signup Failure<br>";
            }
          }
        
        
        $new ="INSERT INTO Customer VALUES (?, ?, ?, ?)";
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $age=$_POST['age'];
          if($stmt = mysqli_prepare($link, $new)) {
              
            mysqli_stmt_bind_param($stmt, "ssss",$username,$fname, $lname, $age);

            if(mysqli_stmt_execute($stmt)) {

              echo "Customer Success<br>";
            }
            else {
              echo "Customer Failure<br>";
            }
          }

      

        $reserve ="INSERT INTO Reservation (flight_id, num_bag, cust_username) VALUES (?, ?, ?)";

          if($stmt = mysqli_prepare($link, $reserve)) {
              
            mysqli_stmt_bind_param($stmt, "sss",$flight_id,$num_bags, $username);

            if(mysqli_stmt_execute($stmt)) {

              echo "Reservation Success";
            }
            else {
              echo "Reservation Failed";
            }
          }

          date_default_timezone_set("America/Chicago");
          $key=NULL;
          $ip=$_SERVER['REMOTE_ADDR'];
          $time=date("h:i:s");
          $date=date("Y-m-d");
          $action_type="Flight Reservation";
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
    <hr>
    <!--<h3>Create Account to finish reservation:</h3>
    <form method='POST' action=''>
    <input type='text' name='username' placeholder='Username'/>
    <input type='text' name='password' placeholder='password'/>
    <input type='submit' name='submit' value='Submit'/>
    </form>-->


  </div>
  <div class="col-md-4">
    <div class="alignCenter">
    <img src="confirmcheck.bmp" alt="Confirmed" class="img-responsive"/>
    </div>
  </div>


</body>
</html>
