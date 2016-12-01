<?php
$base ="../../../";
include $base.'includes/session.h';
include $base.'includes/connect.h';

	$sql= "INSERT INTO curs(anyInici,anyFI) VALUES (";
	$sql= $sql . "'".$_POST['cursIn'];
	$sql= $sql . "','";
	
	$sql= $sql . $_POST['cursFi'];
	$sql= $sql . "')";
	//echo $sql;
	$result = mysqli_real_query ($mysqli,$sql);

	header('Location: ../gestioUsuaris.php#Quadrat3');
	
	mysqli_close($mysqli);
?>