<?php
include 'session.h';
include 'connect.h';

	//echo "------".$_POST['eliminar'];

	
	$query2 = "DELETE FROM usuarigrup WHERE usuari_id="."'".$_POST['eliminar']; $query2=$query2."'";
	//echo $query2;
	
	//$query = $query."WHERE usuari_id='eliminar';"
	//$query = $query.$_SESSION['codiuser'];
	///echo $query;
	//echo $query2;
	
	//$result = mysqli_real_query ($mysqli,$query);
    $result2 = mysqli_real_query ($mysqli,$query2);
	
  header('Location:gestioUsuaris.php');
  	
	
	mysqli_close($mysqli);
?>