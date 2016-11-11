<?php 
//include 'session.h';
include 'connect.h';

//usuarris_usuari_id= "$_SESSION['usuari']",
	/*
	$query_resposta = "UPDATE respostes SET preguntes_preguntes_id= '$_POST['id_pregunta']',  KW= '$_POST['KW']', mA='$_POST['mA']', mAs= '$_POST['mAs']', camleft= '$_POST['camaraEsquerra']', camcenter= '$_POST['camaraMig']', camright= '$_POST['camaraDreta']', camleft= '$_POST['camaraEsquerra']', bucky= '$_POST['buky']', focus= '$_POST['focus']', zona= '$_POST['Zona']', os= '$_POST['Os']', centratge= '$_POST['Centratge']', posicio='$_POST['Posicio']' WHERE resposta_id='$_POST['resposta_id']' ";
	*/

	$sql = "UPDATE respostes SET preguntes_preguntes_id=";
	$sql = $sql.$_POST['id_pregunta'];
	$sql = $sql.", p1=";
	$sql = $sql.$_POST['KW'];
	$sql = $sql.", p2=";
	$sql = $sql.$_POST['mA'];
	$sql = $sql.", p3=";
	$sql = $sql.$_POST['mAs'];
	$sql = $sql.", camleft='";
	$sql = $sql.$_POST['camaraEsquerra'];
	$sql = $sql."', camcenter='";
	$sql = $sql.$_POST['camaraMig'];
	$sql = $sql."', camright='";
	$sql = $sql.$_POST['camaraDreta'];
	$sql = $sql."', bucky='";
	$sql = $sql.$_POST['buky'];
	$sql = $sql."', focus='";
	$sql = $sql.$_POST['focus'];
	$sql = $sql."', zona=";
	$sql = $sql.$_POST['Zona'];
	$sql = $sql.", os=";
	$sql = $sql.$_POST['Os'];
	$sql = $sql.", posicio=";
	$sql = $sql.$_POST['Posicio'];
	$sql = $sql.", centratge=";
	$sql = $sql.$_POST['Centratge'];
	$sql = $sql." WHERE resposta_id=";
	$sql = $sql.$_POST['id_resposta'];


	//echo $sql;

	$result = mysqli_real_query($mysqli,$sql);

	if (!$result){
		die ('Consulta invalida: error a la consulta update' . mysqli_error());
	}

	header ('location:examenAcabat.php');
?>
