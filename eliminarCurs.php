<?php
include 'session.h';
include 'connect.h';
	$query = "DELETE FROM curs WHERE curs_id=";
	$query = $query."'".$_POST['curs']."'";
	//echo $query;
	$result = mysqli_real_query ($mysqli,$query);

	header('Location: gestioUsuaris.php#Quadrat4');
	
	mysqli_close($mysqli);
?>