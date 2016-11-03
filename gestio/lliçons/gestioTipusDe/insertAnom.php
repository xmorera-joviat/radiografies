<?php
include 'session.h';
include 'connect.h';



 	mysqli_query ($mysqli,"SET NAMES 'utf8'");
	
	$sql="INSERT INTO anomalia (noman, descan) VALUES ('";
		

		$sql= $sql . $_POST['noman'];
		$sql= $sql . "','";

		$sql= $sql . $_POST['descan'];
		$sql= $sql . "')";

		
	echo $sql;


$result = mysqli_real_query ($mysqli,$sql);
if (!$result){
	die ('Consulta invalida:' . mysql_error());
}

mysqli_close($mysqli);
header('Location:BorrarTipusAnom.php');

?>
INSERT INTO `anomalia` (`codian`, `noman`, `descan`) VALUES (NULL, 'Jeje', '');