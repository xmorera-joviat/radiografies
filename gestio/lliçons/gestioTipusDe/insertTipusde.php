<?php
include 'session.h';
include 'connect.h';



 	mysqli_query ($mysqli,"SET NAMES 'utf8'");
	
	$sql="INSERT INTO tipusllico (tipusllico_id,tipusllico_nom) VALUES (";
		

		$sql= $sql . $_POST['idLlico'];
		$sql= $sql . ",'";

		$sql= $sql . $_POST['nomLesson'];
		$sql= $sql . "')";

		
	echo $sql;


$result = mysqli_real_query ($mysqli,$sql);
if (!$result){
	die ('Consulta invalida:' . mysql_error());
}

mysqli_close($mysqli);
header('Location:altaTipusLlico.php');

?>

INSERT INTO `tipusllico` (`tipusllico_id`, `tipusllico_nom`) VALUES ('10', '.');