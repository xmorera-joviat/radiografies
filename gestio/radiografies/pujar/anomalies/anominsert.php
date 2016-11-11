<?php
$base ="../../../../";
include $base.'includes/session.h';
include $base.'includes/connect.h';


	//$mysqli = mysqli_connect("localhost", "test", "test", "projectx");
 	mysqli_query ($mysqli,"SET NAMES 'utf8'");
	
	$sql="INSERT INTO xrayanom(codixray,codianom,userid,data) VALUES ('";
		$sql= $sql . $_SESSION['codi'];
		$sql= $sql . "','";
		
		$sql= $sql . $_POST['anomalia'];
		$sql= $sql . "','";

		$sql= $sql . $_SESSION['userid']."',now()";
		$sql= $sql . ")";

	//echo $sql;

$result = mysqli_real_query ($mysqli,$sql);
if (!$result){
	die ('Consulta invalida:' . mysql_error());
}

mysqli_close($mysqli);
header('Location:anomalia.php');

?>
