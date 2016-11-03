<?php
$base ="../../../";
include $base.'includes/session.h';
include $base.'includes/connect.h';

	$sql="UPDATE xray SET ";
	$sql= $sql."p1='";
	$sql= $sql.$_POST['slider1'];
	$sql= $sql."',p2='";
	$sql= $sql.$_POST['slider2'];
	$sql= $sql."',p3='";
	$sql= $sql.$_POST['slider3'];
	$sql= $sql."',camleft='";
	$sql= $sql.$_POST['camleft'];
	$sql= $sql."',camcenter='";
	$sql= $sql.$_POST['camcenter'];
	$sql= $sql."',camright='";
	$sql= $sql.$_POST['camright'];
	$sql= $sql."',bucky='";
	$sql= $sql.$_POST['bucky'];
	$sql= $sql."',focus='";
	$sql= $sql.$_POST['focus'];
	$sql= $sql."',zona='";
	$sql= $sql.$_POST['zona'];
	$sql= $sql."',os='";
	$sql= $sql.$_POST['os'];
	$sql= $sql."',centratge_centratge_id='";
	$sql= $sql.$_POST['centratge'];
	$sql= $sql."',posicio_posicio_id='";
	$sql= $sql.$_POST['posicio'];
	$sql= $sql."',validada='";
	$sql= $sql."si";
	$sql= $sql."' WHERE codi=";
	$sql= $sql.$_SESSION['codirad'];

	//cho $sql;

$result = mysqli_real_query($mysqli,$sql);
if (!$result){
	die('Consulta invalida: error a la consulta update' . mysqli_errno($mysqli));
}
	
	
	if ($result) {
		header ('location:validacio.php');
	}
	mysql_close($mysqli);

?>