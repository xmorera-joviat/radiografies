<?php
$base ="../../../";
include $base.'includes/session.h';
include $base.'includes/connect.h';


$sql="INSERT INTO usuarigrup (usuari_id, grup_id) VALUES (";
	
	$sql= $sql . $_POST['nom'];
	$sql= $sql . ", ";
	
	$sql= $sql . $_POST['grup'];
	$sql= $sql . ")";
	
	$result = mysqli_real_query ($mysqli,$sql);

	mysqli_close($mysqli);
  header('Location:../gestioUsuaris.php');
?> 	
