<?php
$base ="../../../";
include $base.'includes/session.h';
include $base.'includes/connect.h';

$query = "UPDATE usuaris SET ";
	$query = $query."usuari_nom='";
	$query = $query.$_POST[1];
	$query = $query."',usuari_cognom='";
	$query = $query.$_POST[2];
	$query = $query."',username='";
	$query = $query.$_POST[3];
	$query = $query."',correu='";
	$query = $query.$_POST[4];	
	$query = $query."' WHERE usuari_id=";
	$query = $query.$_POST[5];
	

	$result = mysqli_real_query ($mysqli,$query);
	header('Location:../gestioUsuaris.php');


