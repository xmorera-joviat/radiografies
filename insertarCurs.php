<?php
include 'session.h';
include 'connect.h';
	$query = "INSERT INTO curs (any) VALUES (";
	$query = $query."'".$_POST['curs']."')";
	//echo $query;
	$result = mysqli_real_query ($mysqli,$query);

	header('Location: gestioUsuaris.php#Quadrat3');
	
	mysqli_close($mysqli);
?>