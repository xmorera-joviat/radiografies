<?php
include '../session.h';
include '../connect.h';


	//$mysqli = mysqli_connect("localhost", "test", "test", "projectx");
 	mysqli_query ($mysqli,"SET NAMES 'utf8'");
	
	$sql="DELETE FROM temagrup WHERE tema_tema_id=".$_POST['tema']." AND grups_grup_id=".$_SESSION['grup'].";";

	//echo $sql;

$result = mysqli_real_query ($mysqli,$sql);

mysqli_close($mysqli);
header('Location:temagrup.php');

?>
