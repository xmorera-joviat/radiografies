<?php
include 'session.h';
include 'connect.h';
	$query = "DELETE FROM xrayanom ";
	$query = $query."WHERE codixray=";
	$query = $query.$_SESSION['codirad'];
	//echo $query;
	$result = mysqli_real_query ($mysqli,$query);

	$query = "DELETE FROM xray ";
	$query = $query."WHERE codi=";
	$query = $query.$_SESSION['codirad'];
	//echo $query;
	$result = mysqli_real_query ($mysqli,$query);

	if (!unlink($_SESSION['filetreb'])){
  	header( "refresh:2;url=validacio.php" );
  	echo ("No s'ha pogut eliminar la radiografia.");
  	}
	else{
  	header( "refresh:2;url=validacio.php" );
  	echo ("Radiografia eliminada.");
 	}
	
	mysqli_close($mysqli);
?>
