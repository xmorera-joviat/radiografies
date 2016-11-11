<?php
include 'session.h';
include 'connect.h';



 	mysqli_query ($mysqli,"SET NAMES 'utf8'");
	
	$sql="UPDATE tipusllico SET ";




	$sql = $sql."tipusllico_id='";
	$sql = $sql.$_POST['idLlico'];

	$sql = $sql."',tipusllico_nom='";
	$sql = $sql.$_POST['nomLesson'];
	$sql= $sql . "'";

		
		echo $sql;


$result = mysqli_real_query ($mysqli,$sql);
if (!$result){
	die ('Consulta invalida:' . mysql_error());
}

mysqli_close($mysqli);
header('Location:ModificaLlico.php');

?>
UPDATE `anomalia` SET `noman` = 'Arracadesx' WHERE `anomalia`.`codian` = 2;

UPDATE `anomalia` SET `codian` = '15', `noman` = 'lol', `descan` = 'jej' WHERE `anomalia`.`codian` = 16;





UPDATE `tipusllico` SET `tipusllico_id` = '4', `tipusllico_nom` = 'LOLXDMirame2' WHERE `tipusllico`.`tipusllico_id` = 5;