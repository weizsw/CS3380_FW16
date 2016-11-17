<!DOCTYPE html>
<html>
<head>
	<title>Insert Information</title>
	<meta charset="utf-8">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<style type="text/css">
	
	.box {
		width: 200px;
		margin-left: auto;
		margin-right: auto;
		margin-top: 80px;
	}

	li {
		list-style-type: none;
		margin-bottom: 50px;
	}
	p {
		text-align: center;
	}
		
</style>
<body>
	
	<form action="" class="box" method="POST" >
	<li><a href="lab9.php">Home</a></li>
	Class Name:<br>
	<input type="text" name="Cname" value="" placeholder="name of class"><br>
	Department:<br>
	<input type="text" name="department" value="" placeholder="department of class"><br>
	Course_id:<br>
	<input type="text" name="Cid" value="" placeholder="id of course"><br>
	Start Time:<br>
	<select name="start" >
	<option disabled selected value> -- select a start time -- </option>
	<?php
	for($i=1;$i<=24;$i++){
		if(isset($_POST['start'])&&$_POST['start']==$i){
			echo"<option selected = 'selected' value = '".$i.":00:00'> ".$i.":00:00</option>";
			
}
		else{
			echo"<option value = '".$i.":00:00'>".$i.":00:00</option>";	
		}
	}
	?>
	</select><br>
	End Time:<br>
	<select name="end" >
	<option disabled selected value> -- select a end time -- </option>
	<?php

	for($i=1;$i<=24;$i++){
		if(isset($_POST['end'])&&$_POST['end']==$i){
			echo"<option selected = 'selected' value = '".$i.":00:00'> ".$i.":00:00</option>";
			echo"<option selected = 'selected' value = '".$i.":30:00'> ".$i.":30:00</option>";
			
}
		else{
			echo"<option value = '".$i.":00:00'>".$i.":00:00</option>";	
			echo"<option value = '".$i.":30:00'>".$i.":30:00</option>";	
		}
	}
	?>
	</select><br>

	Days:<br>
	<select name="days">
		<option disabled selected value> -- select days -- </option>
		<option value="MWF">MWF</option>
		<option value="TTh">TTh</option>
		
	</select><br><br>

	<input class = "btn btn-primary" type = "submit" name = "submit" value = "Create Class">
	
	</form>


</body>


<?php 
	include("../secure/database.php");
	
	if(isset($_POST['submit'])) {
		$link = mysqli_connect(HOST,USERNAME,PASSWORD,DBNAME) or die("Connect Error " . mysqli_error($link));
		$sql = "INSERT INTO classes (name, department, course_id, start, end, days) VALUES (?, ? ,? ,? ,?, ?)";

		if($stmt = mysqli_prepare($link, $sql)) {
												//value in form
			mysqli_stmt_bind_param($stmt, "ssisss", $_POST['Cname'], $_POST['department'], $_POST['Cid'], $_POST['start'], $_POST['end'], $_POST['days']) or die ("Line 27");
			if(mysqli_stmt_execute($stmt)) {
				echo "<div class = box>Class Added</div>";
			}
			else {
				echo"Course already existed";
			}
		}
		else {
			die("Prepared Failed Line 96");
		}
	}
	// mysql_close($link);

	// if(isset($_POST['submit'])) {
	// 	$link = mysqli_connect(HOST,USERNAME,PASSWORD,DBNAME) or die (mysqli_connect_error());
	// 	$sql = "INSERT INTO Users (name) VALUES (?)";

	// 	if($stmt = mysqli_prepare($link, $sql)) {
	// 											//value in form
	// 		mysqli_stmt_bind_param($stmt, "s", $_POST['uName']) or die ("Line 27");
	// 		if(mysqli_stmt_execute($stmt)) {
	// 			echo "User Added";

	// 		}
	// 		else {
	// 			echo" User Added error on line 24";
	// 		}
	// 	}
	// 	else {
	// 		die("Line 29");
	// 	}
	// }

 ?>
</html>
