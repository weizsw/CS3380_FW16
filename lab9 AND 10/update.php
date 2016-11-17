<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Update Information</title>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<style type="text/css">
	.btn {
		background-color: #337ab7;
		color: white;
	}
	#form {
		position: relative;
		margin-left: 40%;
		
	}

	p {
		color: green;
		font-size: 14px;
	}

	


</style>
<body>
<div id="holder">
<div id="form">
	<form action="" method="POST">
		
		Name:
		<?php
		if (isset($_POST['submit'])) {
			$cname = $_POST['uname'];
		}

		else {
			$cname = $_POST['name'];
		}
		echo "<input type='text'  name='uname' value=" . $cname. ">";
		?>
		<br>
		Department:
		<?php
		if (isset($_POST['submit'])) {
			$cdepartment = $_POST['udepartment'];
		}

		else {
			$cdepartment = $_POST['department'];
		}
		echo "<input type='text'  name='udepartment' value=" . $cdepartment. ">";
		?>
		<br>
		Course_id:
		<?php
		if (isset($_POST['submit'])) {
			$ccourse_id = $_POST['ucourse_id'];
		}

		else {
			$ccourse_id = $_POST['course_id'];
		}
		echo "<input type='text' readonly name='ucourse_id' value=" . $ccourse_id . ">";
		?>
		<br>
		Start:
		<?php
		if (isset($_POST['submit'])) {
			$cstart = $_POST['ustart'];
		}

		else {
			$cstart = $_POST['start'];
		}
		echo "<input type='text'  name='ustart' value=" . $cstart . ">";
		?>
		<br>
		End:
		<?php
		if (isset($_POST['submit'])) {
			$cend = $_POST['uend'];
		}

		else {
			$cend = $_POST['end'];
		}
		echo "<input type='text'  name='uend' value=" . $cend . ">";
		?>
		<br>
		Days:
		<?php
		if (isset($_POST['submit'])) {
			$cdays = $_POST['udays'];
		}

		else {
			$cdays = $_POST['days'];
		}
		echo "<input type='text'  name='udays' value=" . $cdays . ">";
		?>
		<br><br>
		<input type="submit" class="btn" name="submit" value="Update">
		

	</form>
	</div>
	</div>
</body>
</html>

<?php
	include("../secure/database.php");
	$link = mysqli_connect(HOST,USERNAME,PASSWORD,DBNAME) or die("Connect Error " . mysqli_error($link));
	
			
	
	echo "<hr>";
	echo "<div id='form'>";
	if(isset($_POST['submit'])) {
		$sql = "UPDATE classes
			SET name = ?,
				department = ?,
				start = ?,
				end = ?,
				days = ?
			WHERE course_id = ?";
		$stmt = mysqli_prepare($link, $sql);
		mysqli_stmt_bind_param($stmt, "ssssss", $_POST['uname'], $_POST['udepartment'], $_POST['ustart'], $_POST['uend'], $_POST['udays'], $_POST['ucourse_id']);
		mysqli_stmt_execute($stmt);
		echo "<P>Update Successfully!</p><br>";
		echo "Name: " . $_POST['uname'] . "<br>";
		echo "Department: " . $_POST['udepartment'] . "<br>";
		echo "Course_id: " . $_POST['ucourse_id'] . "<br>";
		echo "Start: " . $_POST['ustart'] . "<br>";
		echo "End: " . $_POST['uend'] . "<br>";
		echo "Days: " . $_POST['udays'];
		echo "<br>";
		echo "<a href='lab9.php'>Go back</a><br>";
	}
	echo "</div>";