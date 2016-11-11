<?php
$base ="../../../../";
include $base.'includes/session.h';
include $base.'includes/connect.h';
 	//$mysqli = mysqli_connect("localhost", "test", "test", "projectx");
 	mysqli_query ($mysqli,"SET NAMES 'utf8'");

	$query = "DELETE FROM xrayanom ";
	$query = $query."WHERE codixa=";
	$query = $query.$_POST['codixa'];
	//echo $query;
	$result = mysqli_real_query ($mysqli,$query);
	

	mysqli_close($mysqli);
	//echo $query;
	if ($result) {
			header ('location:anomalia.php');
		}
?>