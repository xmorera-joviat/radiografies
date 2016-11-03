<?php
$base ="../../../";
include $base.'includes/session.h';
include $base.'includes/connect.h';

	$query = "INSERT INTO curs VALUES (";
	$query = $query."'".$_POST['curs']."')";
	//echo $query;
	$result = mysqli_real_query ($mysqli,$query);

	header('Location: ../gestioUsuaris.php#Quadrat3');
	
	mysqli_close($mysqli);
?>