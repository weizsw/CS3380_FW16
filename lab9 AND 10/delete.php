<!DOCTYPE html>
<html>
<head>
	<title>Resualt</title>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<style type="text/css">
	* {
		margin-left: 40%
	}

	p {
		color: green;
	}
</style>
<body>


</body>
</html>

<?php
	include("../secure/database.php");
	$link = mysqli_connect(HOST,USERNAME,PASSWORD,DBNAME) or die("Connect Error " . mysqli_error($link));
	$sql = "DELETE FROM classes
			WHERE course_id = ?";
	$stmt = mysqli_prepare($link, $sql);
	$find = $_POST['course_id'];
	mysqli_stmt_bind_param($stmt, "s", $find);
	mysqli_stmt_execute($stmt);
	echo "<p>Delete Successfully!</p><br>";
	echo "<a href='lab9.php'>Home</a>";