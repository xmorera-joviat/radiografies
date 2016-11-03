<?php
include 'session.h';
include 'connect.h';
//include 'session.h';

	$mysqli = mysqli_connect("localhost", "test", "test", "projectx");
 	mysqli_query ($mysqli,"SET NAMES 'utf8'");
	
	$sql = "UPDATE users SET classe= ".$_POST['classe']." WHERE userid= ".$_POST['alumne']."";
	//echo $sql;

$result = mysqli_real_query ($mysqli,$sql);
if (!$result){
	die ('Consulta invalida:' . mysql_error());
}

mysqli_close($mysqli);
header('Location:users.php')
?>