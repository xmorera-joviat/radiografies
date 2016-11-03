<?php
include 'session.h';
include 'connect.h';



 	mysqli_query ($mysqli,"SET NAMES 'utf8'");
		echo $sql;
	$sql="UPDATE tipususuari SET ";




	$sql = $sql."rol_nom='";
	$sql = $sql.$_POST['nomRol'];
	//$sql = $sql.",";

	
	$sql = $sql."'WHERE rol_id='";
	$sql = $sql.$_POST['idRol'];
	$sql= $sql . "'";

		
		echo $sql;


$result = mysqli_real_query ($mysqli,$sql);
if (!$result){
	die ('Consulta invalida:' . mysql_error());
}

mysqli_close($mysqli);
header('Location:ModificaLlico.php');

?>


