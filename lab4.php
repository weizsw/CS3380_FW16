<!DOCTYPE html>
<html>
<title>Lab4</title>
<head>
	<meta charset="utf-8">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style type="text/css">
	
	.table{
		text-indent: 50px;
	}
</style>
	
</head>
<body>
	<div class="container">
		<br>
		<br>

		<div class="row">
			<form action="" method="POST" class="col-md-4 col-md-offset-5">
			<select name="dropDown">
				<option value="1">Query 1</option>
				<option value="2">Query 2</option>
				<option value="3">Query 3</option>
				<option value="4">Query 4</option>
				<option value="5">Query 5</option>
			</select>
			<br>
			<br>

			<input class="btn btn-primary" type="submit" name="submit" value="Execute">
			</form>
		</div>
		
	</div>

	
</body>
	<?php
		$hostname = 'localhost';
		$username = 'szz63';
		$password = '466457296';
		$dbname = 'szz63';
		$link = new mysqli($hostname, $username, $password, $dbname) or die("Connection Error on Line 46:" . mysqli_connect_error());


		function executeQuery($sql){
			global $link;
			$result = mysqli_query($link, $sql) or die("Query Error:" . mysqli_error($link));
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
		}

		if(isset($_POST['submit'])){
			switch($_POST['dropDown']){
				case 1;
				$query = "SELECT * FROM classes;";
				break;

				case 2;
				$query = "SELECT name, start FROM classes;";
				break;

				case 3;
				$query = "SELECT * FROM classes WHERE department = 'EDUCATION';";
				break;

				case 4;
				$query = "SELECT name, course_id FROM classes WHERE days='MWF';";
				break;

				case 5;
				$query = "SELECT name, TIMEDIFF(end, start) FROM classes;";
			}

			executeQuery($query);
		}
?>

</html>