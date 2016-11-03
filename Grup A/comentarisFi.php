<?php 
	include 'connect.h';
	session_start();
	$idResposta = $_SESSION['idResposta'];
	$idUsuari = $_SESSION['idUsuari'];

	$sql="UPDATE respostes SET ";
	$sql= $sql." comentaris=";
	$sql= $sql.'"';
	$sql= $sql.$_POST['Comentari'];
	$sql= $sql.'"';
	$sql= $sql.", nota=";
	$sql= $sql.$_POST['Nota'];
	$sql= $sql." WHERE resposta_id=";
	$sql= $sql.$idResposta;

	//echo $sql;

	$sql2="UPDATE avis SET avis=0 WHERE usuari_id=";
	$sql2= $sql2.$idUsuari;

	$result = mysqli_real_query($mysqli,$sql);
	$result2 = mysqli_real_query($mysqli,$sql2);
	if (!$result){
		die ('Consulta invalida: error a la consulta update' . mysqli_error());
	}
	if (!$result2){
		die ('Consulta invalida: error a la consulta update' . mysqli_error());
	}
	session_destroy();

	header ('location:endProf.html');
?>