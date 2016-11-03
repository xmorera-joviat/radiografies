<?php
$base ="../../../";
include $base.'includes/session.h';
include $base.'includes/connect.h';

	$query = "UPDATE curs SET any=";
	$query = $query."'".$_POST['any']."'";
	$query = $query."WHERE curs_id=".$_POST['curs'];
	//echo $query;
	$result = mysqli_real_query ($mysqli,$query);

	header('Location: ../gestioUsuaris.php#Quadrat4');
	
	mysqli_close($mysqli);
?>