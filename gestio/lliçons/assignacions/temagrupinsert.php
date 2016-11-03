<?php
include '../session.h';
include '../connect.h';


	//$mysqli = mysqli_connect("localhost", "test", "test", "projectx");
 	mysqli_query ($mysqli,"SET NAMES 'utf8'");
	
	$sql="INSERT INTO temagrup(status,tema_tema_id,grups_grup_id) VALUES (0,";
		$sql= $sql.$_POST['tema'];
		$sql= $sql . ",";
		$sql= $sql . $_SESSION['grup'];
		$sql= $sql . ")";

	//echo $sql;

$result = mysqli_real_query ($mysqli,$sql);

mysqli_close($mysqli);
header('Location:temagrup.php');

?>
