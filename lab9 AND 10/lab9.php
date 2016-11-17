<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<style type="text/css">
	li  {
		list-style-type: none;
		text-align: center;
		
	}

	#radiobt {
		margin-left: 10px;
	}

	.deletebtn {
		margin-left: 30px;
	}


	.btn {
		background-color: #337ab7;
		color: white;
	}
	

</style>
<body>
	<li><a href="insert.php" "insert">Create New Class</a></li>
	<form action="" method="POST" class="col-md-4 col-md-offset-5">
		Search: 
		<input type="text" name="search">
		<br><br>
		<input type="radio" name="radio" value="0" checked="check">Name
		<input id="radiobt"  type="radio" name="radio" value="1">Department
		<input id="radiobt"  type="radio" name="radio" value="2">Course_id
		<br><br>
		<input class="btn btn-primary" type="submit" name="submit" value="Execute">

	</form>
	
</body>
</html>

<?php
	include("../secure/database.php");


	$link = mysqli_connect(HOST,USERNAME,PASSWORD,DBNAME) or die("Connect Error " . mysqli_error($link));

	if(isset($_POST['radio'])){
	$selected_radio = $_POST['radio'];
	}

	if(isset($_POST['submit']) && $selected_radio == '0'){
		$sql = "SELECT * FROM classes
				WHERE name 
				LIKE ?";
		$stmt = mysqli_prepare($link, $sql);
		$find = $_POST['search'] . '%';
		mysqli_stmt_bind_param($stmt, "s", $find);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt, $name, $department, $course_id, $start, $end, $days);
		echo "<table class='table'><thead>";
		echo "<tr><th>Name</th><th>Department</th><th>Course_id</th><th>Start</th><th>End</th><th>Days</th><th>Options</th></tr>";
		while(mysqli_stmt_fetch($stmt)) {
			echo"<tr>";
			echo"<td>$name</td><td>$department</td><td>$course_id</td><td>$start</td><td>$end</td><td>$days</td>";
			?>
			<td>
			
			<?php
			echo "<form method = 'POST' action = 'update.php'>";
			echo "<input type = hidden name='name' value='$name'>";
			echo "<input type = hidden name='department' value='$department'>";
			echo "<input type = hidden name='course_id' value='$course_id'>";
			echo "<input type = hidden name='start' value='$start'>";
			echo "<input type = hidden name='end' value='$end'>";
			echo "<input type = hidden name='days' value='$days'>";

			echo "<input type=submit name='send' class='btn' value='UPDATE'>";
			
			echo "</form>";
			?>
			</td>
			<td>
			<?php
			echo "<form method = 'POST' action = 'delete.php'>";
			echo "<input type = hidden name='name' value='$name'>";
			echo "<input type = hidden name='department' value='$department'>";
			echo "<input type = hidden name='course_id' value='$course_id'>";
			echo "<input type = hidden name='start' value='$start'>";
			echo "<input type = hidden name='end' value='$end'>";
			echo "<input type = hidden name='days' value='$days'>";

			echo "<input type=submit name='send' class='btn' value='DELETE'>";

			echo "</form>";

			
			?>
			
			</td>
			<?php
			echo "</tr>";

		}


	}

	else if(isset($_POST['submit']) && $selected_radio == '1') {
		$sql = "SELECT * FROM classes
				WHERE department 
				LIKE ?";
		$stmt = mysqli_prepare($link, $sql);
		$find = $_POST['search'] . '%';
		mysqli_stmt_bind_param($stmt, "s", $find);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt, $name, $department, $course_id, $start, $end, $days);
		echo "<table class='table'><thead>";
		echo "<tr><th>Name</th><th>Department</th><th>Course_id</th><th>Start</th><th>End</th><th>Days</th><th>Options</th></tr>";
		while(mysqli_stmt_fetch($stmt)) {
			echo"<tr>";
			echo"<td>$name</td><td>$department</td><td>$course_id</td><td>$start</td><td>$end</td><td>$days</td>";
			?>
			<td>
			
			<?php
			echo "<form method = 'POST' action = 'update.php'>";
			echo "<input type = hidden name='name' value='$name'>";
			echo "<input type = hidden name='department' value='$department'>";
			echo "<input type = hidden name='course_id' value='$course_id'>";
			echo "<input type = hidden name='start' value='$start'>";
			echo "<input type = hidden name='end' value='$end'>";
			echo "<input type = hidden name='days' value='$days'>";

			echo "<input type=submit name='send' class='btn' value='UPDATE'>";
			
			echo "</form>";
			?>
			</td>
			<td>
			<?php
			echo "<form method = 'POST' action = 'delete.php'>";
			echo "<input type = hidden name='name' value='$name'>";
			echo "<input type = hidden name='department' value='$department'>";
			echo "<input type = hidden name='course_id' value='$course_id'>";
			echo "<input type = hidden name='start' value='$start'>";
			echo "<input type = hidden name='end' value='$end'>";
			echo "<input type = hidden name='days' value='$days'>";

			echo "<input type=submit name='send' class='btn' value='DELETE'>";

			echo "</form>";

			
			?>
			
			</td>
			<?php
			echo "</tr>";

		}


	}

	else if(isset($_POST['submit']) && $selected_radio == '2') {
		$sql = "SELECT * FROM classes
				WHERE course_id 
				LIKE ?";
		$stmt = mysqli_prepare($link, $sql);
		$find = $_POST['search'] . '%';
		mysqli_stmt_bind_param($stmt, "s", $find);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt, $name, $department, $course_id, $start, $end, $days);
		echo "<table class='table'><thead>";
		echo "<tr><th>Name</th><th>Department</th><th>Course_id</th><th>Start</th><th>End</th><th>Days</th><th>Options</th></tr>";
		while(mysqli_stmt_fetch($stmt)) {
			echo"<tr>";
			echo"<td>$name</td><td>$department</td><td>$course_id</td><td>$start</td><td>$end</td><td>$days</td>";
			?>
			<td>
			
			<?php
			echo "<form method = 'POST' action = 'update.php'>";
			echo "<input type = hidden name='name' value='$name'>";
			echo "<input type = hidden name='department' value='$department'>";
			echo "<input type = hidden name='course_id' value='$course_id'>";
			echo "<input type = hidden name='start' value='$start'>";
			echo "<input type = hidden name='end' value='$end'>";
			echo "<input type = hidden name='days' value='$days'>";

			echo "<input type=submit name='send' class='btn' value='UPDATE'>";
			
			echo "</form>";
			?>
			</td>
			<td>
			<?php
			echo "<form method = 'POST' action = 'delete.php'>";
			echo "<input type = hidden name='name' value='$name'>";
			echo "<input type = hidden name='department' value='$department'>";
			echo "<input type = hidden name='course_id' value='$course_id'>";
			echo "<input type = hidden name='start' value='$start'>";
			echo "<input type = hidden name='end' value='$end'>";
			echo "<input type = hidden name='days' value='$days'>";

			echo "<input type=submit name='send' class='btn' value='DELETE'>";

			echo "</form>";

			
			?>
			
			</td>
			<?php
			echo "</tr>";

		}


	}


		
			// if(isset($_POST['submit']) == 'delete') {
			// 		$sql = "DELETE FROM classes
			// 				WHERE course_id = ?";
			// 		$stmt = mysqli_prepare($link, $sql);
			// 		$find = $_POST['course_id'];
			// 		mysqli_stmt_bind_param($stmt, "s", $find);
			// 		mysqli_stmt_execute($stmt);
			// 	}
				
			
	




