<?php
include '../session.h';
include '../connect.h';


	//$mysqli = mysqli_connect("localhost", "test", "test", "projectx");
 	mysqli_query ($mysqli,"SET NAMES 'utf8'");
	
	$sql="DELETE FROM llicogrup WHERE llico_llico_id=".$_POST['llico']." AND temagrup_temagrup_id=".$_POST['temagrup'].";";

	//echo $sql;

$result = mysqli_real_query ($mysqli,$sql);

mysqli_close($mysqli);
header('Location:llicogrup.php');

?>