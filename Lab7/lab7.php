<!DOCTYPE html>
<html>
<head>
	<title>Lab7</title>
</head>
	<meta charset="utf-8">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<style type="text/css">
	*{
		margin-left: 35px;
		padding-right: 55px;
		
	}
</style>
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
				<option value="6">Query 6</option>
				<option value="7">Query 7</option>
				<option value="8">Query 8</option>
				<option value="9">Query 9</option>
				<option value="10">Query 10</option>
				<option value="11">Query 11</option>

			</select>
			<br>
			<br>

			<input class="btn btn-primary" type="submit" name="submit" value="Execute">
			</form>
		</div>
		
	</div>

</body>
	<?php
		include("../secure/database.php");
		$link = mysqli_connect(HOST,USERNAME,PASSWORD,DBNAME) or die("Connect Error " . mysqli_error($link));

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

				$query = "SELECT District, Population 
						FROM City WHERE Name = 'springfield' 
						ORDER BY Population DESC;";
				break;

				case 2;
				$query = "SELECT Name, District, Population 
						FROM City 
						WHERE CountryCode = 'BRA' 
						ORDER BY Name ASC;";
				break;

				case 3;
				$query = "SELECT Name, Continent, SurfaceArea 
					  FROM Country 
					  ORDER BY SurfaceArea ASC
					  LIMIT 20 ;";
				break;

				case 4;
				$query = "SELECT Name, Continent, GovernmentForm, GNP 
						  FROM Country 
						  WHERE GNP >= 200000 
						  ORDER BY Name;";
				break;

				case 5;
				$query = "SELECT Name, LifeExpectancy 
						FROM Country 
						WHERE Lifeexpectancy IS NOT NULL 
						ORDER BY LifeExpectancy DESC
						LIMIT 10 OFFSET 10;";
				break;

				case 6;
				$query = "SELECT Name 
						FROM City 
						WHERE Name 
						LIKE 'B%%s'
						ORDER BY Population DESC;";
				break;

				case 7;
				$query = "SELECT City.Name, Country.Name, City.Population 
						FROM City JOIN Country ON City.CountryCode = Country.Code 
						WHERE City.Population >= 6000000 
						ORDER BY City.Population DESC;";
				break;

				case 8;
				$query = "SELECT Country.Name, Country.IndepYear, Country.Region 
						FROM Country LEFT JOIN CountryLanguage ON Country.COde = CountryLanguage.CountryCode 
						WHERE CountryLanguage.Language = 'English' AND IsOfficial = 'T' ORDER BY Country.region ASC, Country.Name ASC;";
				break;

				case 9;
				$query = "SELECT City.Name, Country.Name, (City.Population/Country.Population)*100 AS 'PercentageLives' 
						FROM City JOIN Country ON City.ID = Country.Capital
						ORDER BY PercentageLives DESC;";
						
				break;
				case 10;
				$query = "SELECT Country.Name, CountryLanguage.Language, CountryLanguage.Percentage*Country.Population/100 AS 'Speakers' 
						FROM Country JOIN CountryLanguage ON Country.Code = CountryLanguage.CountryCode 
						WHERE CountryLanguage.IsOfficial = 'T' 
						ORDER BY Speakers DESC;";
				break;

				case 11;
				$query = "SELECT Name, Region, GNP, GNPOld, (GNP-GNPOld)/GNPOld AS 'Real_Change' 
						FROM Country
						WHERE GNP IS NOT NULL AND GNPOld IS NOT NULL
						ORDER BY Real_Change DESC;";

				
			}

			executeQuery($query);
		}
?>
















</html>