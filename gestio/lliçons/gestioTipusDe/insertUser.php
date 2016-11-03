<?php
include 'session.h';
include 'connect.h';



 	mysqli_query ($mysqli,"SET NAMES 'utf8'");
	
	$sql="INSERT INTO tipususuari (rol_nom) VALUES ('";
		

		$sql= $sql . $_POST['nomRol'];
		$sql= $sql . "'";

		$sql= $sql . ")";

		
	echo $sql;


$result = mysqli_real_query ($mysqli,$sql);
if (!$result){
	die ('Consulta invalida:' . mysql_error());
}

mysqli_close($mysqli);
header('Location:altaTipusLlico.php');

?>
