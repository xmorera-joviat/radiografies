<?php
include 'session.h';
include 'connect.h';

	$query = "UPDATE grups SET grup_nom=";
	$query = $query."'".$_POST['nom']."', ";
	$query = $query."curs_curs_id= ".$_POST['any'];
	$query = $query." WHERE grup_id=".$_POST['grup'];
	//echo $query;
	$result = mysqli_real_query ($mysqli,$query);

	header('Location: gestioUsuaris.php#Quadrat6');
	
	mysqli_close($mysqli);
?>