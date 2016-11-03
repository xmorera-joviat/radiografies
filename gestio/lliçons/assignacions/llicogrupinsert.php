<?php
include '../session.h';
include '../connect.h';


	//$mysqli = mysqli_connect("localhost", "test", "test", "projectx");
 	mysqli_query ($mysqli,"SET NAMES 'utf8'");
	
	$sql="INSERT INTO llicogrup (temagrup_temagrup_id, llico_llico_id) VALUES ('";
	$sql = $sql.$_POST['temagrup']."','".$_POST['llico']."');";
	//echo $sql;

$result = mysqli_real_query ($mysqli,$sql);

mysqli_close($mysqli);
header('Location:llicogrup.php');

?>