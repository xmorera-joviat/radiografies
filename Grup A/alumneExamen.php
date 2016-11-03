<?php
include 'connect.h';
session_start();
$_SESSION['idUsuari'] = $_POST['Alumnes'];


	$sql="UPDATE avis SET ";
	$sql= $sql."avis=1";
	$sql= $sql." WHERE usuari_id=";
	$sql= $sql.$_POST['Alumnes'];

	echo $sql;


	$result = mysqli_real_query($mysqli,$sql);
	if (!$result){
		die ('Consulta invalida: error a la consulta update' . mysqli_error());
	}
	
	$codi = $_POST['Preguntes'];
	$codi_explode = explode('|', $codi);
	$_SESSION['idPregunta'] = $codi_explode[0];

	$sql2="INSERT INTO respostes (data,preguntes_preguntes_id,usuaris_usuari_id,xray_codi) VALUES (now(),'";

	$sql2= $sql2 . $codi_explode[0];
	$sql2= $sql2 . "','";
	
	$sql2= $sql2 . $_POST['Alumnes'];
	$sql2= $sql2 . "','";
	
	$sql2= $sql2 . $codi_explode[1];
	
	$sql2= $sql2 . "')";

	echo $sql2;


	$result2 = mysqli_real_query($mysqli,$sql2);
	if (!$result2){
		die ('Consulta invalida: error a la consulta update' . mysqli_error());
	}
	
	if ($result2) {
		$sql3="SELECT * FROM respostes ORDER BY resposta_id DESC";
		$result3 = mysqli_query($mysqli, $sql3);
		$row = mysqli_fetch_assoc($result3);
		$_SESSION['idResposta'] = $row['resposta_id'];

		if (!$result3) {
			die('Consulta no válida: ' . mysql_error());
		}


		header ('location:actProfe.php');
	}

	mysql_close($link);

?>