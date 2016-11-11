<?php
include 'session.h';
include 'connect.h';
//include 'session.h';

	$mysqli = mysqli_connect("localhost", "test", "test", "projectx");
 	mysqli_query ($mysqli,"SET NAMES 'utf8'");
	
	$sql="INSERT INTO classes(classname,userid,creationdate) VALUES ('";
		$sql= $sql . $_POST['class'];
		$sql= $sql . "','";

		$sql= $sql . $_SESSION['userid']."',now()";
		$sql= $sql . ")";
	
	//echo $sql;

$result = mysqli_real_query ($mysqli,$sql);
if (!$result){
	die ('Consulta invalida:' . mysql_error());
}

mysqli_close($mysqli);
header('Location:users.php')
?>