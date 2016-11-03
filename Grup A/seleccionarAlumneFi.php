<?php 
	include 'connect.h';

	mysqli_query ($mysqli,"SET NAMES 'utf8'");
	$sql="INSERT INTO respostes() VALUES ()";
	//echo $sql3;
	$result = mysqli_query($mysqli, $sql);
	//echo $result3;
	if (!$result) {
		die('Consulta no válida: ' . mysql_error());
	}

	mysqli_close($mysqli);
	header('location:anomalia.php');
?>