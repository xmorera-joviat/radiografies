<?php
include 'session.h';
include 'connect.h';


	//$mysqli = mysqli_connect("localhost", "test", "test", "projectx");
 	mysqli_query ($mysqli,"SET NAMES 'utf8'");
	
	$sql="INSERT INTO `tema` (`tema_nom`, `creador`, `data`, `primerosegon`) VALUES ('";
		
		echo "----".$_POST['nomTema']."-----";
		
		$sql= $sql . $_POST['nomTema'];
		$sql= $sql . "','";

		$sql= $sql . $_SESSION['userid'];
		$sql= $sql . "',";

		$sql= $sql ."now()";
		$sql= $sql . ",'";

		$sql= $sql . $_POST['primerosegon'];
		$sql= $sql . "')";

		
	echo $sql;
		//INSERT INTO `tema` (`tema_id`, `tema_nom`, `creador`, `data`, `primerosegon`) VALUES (NULL, 'tema', 'creador', '2016-05-09', '1');

$result = mysqli_real_query ($mysqli,$sql);
if (!$result){
	die ('Consulta invalida:' . mysql_error());
}

mysqli_close($mysqli);
header('Location:anomalia.php');

?>


