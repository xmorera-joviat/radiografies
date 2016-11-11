<?php
include 'session.h';
include 'connect.h';



 	mysqli_query ($mysqli,"SET NAMES 'utf8'");
		echo $sql;
	$sql="UPDATE anomalia SET ";




	$sql = $sql."noman='";
	$sql = $sql.$_POST['nomAn'];
		$sql= $sql . "',";
	//$sql = $sql.",";

	
	$sql = $sql." descan='";
	$sql = $sql.$_POST['descripcio'];

		$sql = $sql." 'WHERE codian='";
		$sql = $sql.$_POST['codian'];
	$sql= $sql . "'";

		
		echo $sql;


$result = mysqli_real_query ($mysqli,$sql);
if (!$result){
	die ('Consulta invalida:' . mysql_error());
}
else{
	echo $sql;
}
mysqli_close($mysqli);
header('Location:ModificaLlico.php');

?>


UPDATE `anomalia` SET `noman` = 'ACHEDE', `descan` = 'holaxiks' WHERE `anomalia`.`codian` = 2;