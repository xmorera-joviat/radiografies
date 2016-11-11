<?php
include 'session.h';
include 'connect.h';



 	mysqli_query ($mysqli,"SET NAMES 'utf8'");
	
	$sql="DELETE FROM anomalia WHERE codian=";
		

		$sql= $sql . $_POST['codian'];
		$sql= $sql . "";

	
		$sql= $sql . "";

		
	echo $sql;


$result = mysqli_real_query ($mysqli,$sql);
if (!$result){
	die ('Consulta invalida:' . mysql_error());
}

mysqli_close($mysqli);
header('Location:BorrarLlico.php');

?>
