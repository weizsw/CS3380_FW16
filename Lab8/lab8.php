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

</style>
<body>
	<li><a href="insert.php" "insert">Create New Class</a></li>

</body>


<?php
	include("../secure/database.php");
	$link = mysqli_connect(HOST,USERNAME,PASSWORD,DBNAME) or die("Connect Error " . mysqli_error($link));
	$query = "SELECT * FROM classes;"; 
	$result = mysqli_query($link, $query);

	echo "<table class='table table-hover'><thead>";
	while($fieldinfo = mysqli_fetch_field($result)){
				echo "<th>".$fieldinfo->name."</th>";

			}
	while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
				echo "<tr>";
				foreach($row as $r){
					echo "<td> $r </td>";
				}
				echo "</tr>";
			}

	




?>


</html>