<?php
include 'session.h';
include 'connect.h';
	$query = "INSERT INTO grups (grup_nom, curs_curs_id, tutor_id) VALUES (";
	$query = $query."'".$_POST['grup']."', ";
	$query = $query."'".$_POST['CodiCurs']."', ";
	$query = $query.$_SESSION['userid'].")";
	//echo $query;
	$result = mysqli_real_query ($mysqli,$query);

	header('Location: gestioUsuaris.php#Quadrat5');
	
	mysqli_close($mysqli);
?>