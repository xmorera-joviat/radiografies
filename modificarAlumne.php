<?php
include 'session.h';
include 'connect.h';
?>
<!DOCTYPE html>
<html>
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script type="text/javascript" src="js/jquery-latest.min.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
  <link href='http://fonts.googleapis.com/css?family=Julius+Sans+One' rel='stylesheet' type='text/css'>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/navmenu-push.css" rel="stylesheet">
  <title>Gestió grups</title>

</head>

<?php

$sql="SELECT usuari_id,usuari_nom,usuari_cognom,username,correu FROM usuaris WHERE usuari_id=";
$sql=$sql.$_POST['modificar'];
//$query="SELECT usuari_id,usuari_nom,usuari_cognom,username,tipususuari_rol_id,correu FROM usuaris WHERE username="."'".$_POST['username']; $query=$query."'";
//$sql="SELECT usuari_id,usuari_nom,usuari_cognom,username,tipususuari_rol_id,correu FROM usuaris WHERE usuari_id="."'".$_POST['modificar']; $sql=$sql."'";
//$sql="SELECT usuari_id,usuari_nom,usuari_cognom,username,tipususuari_rol_id,correu FROM usuaris WHERE usuari_id=";$sql=$sql.$_POST['modificar'];
//echo $sql;

$resultado = mysqli_query($mysqli,$sql);

$row=mysqli_fetch_assoc($resultado);


?>
<body>

<div class="row">
<div class="col-md-5 col-md-offset-1 panel-group"> 
<form action ="modificarFinal.php" method="POST">


		Nom Alumne: <br>
		<input type ="text" name="1" value=<?php echo $row ['usuari_nom'];?>>
		<br>
		<br>
		
		Cognom Alumne: <br>
		<input type ="text" name="2" value=<?php echo $row ['usuari_cognom'];?>>
		<br>
		<br>
		Username: <br>
		<input type ="text" name="3" value=<?php echo $row ['username'];?>>
		<br>
		<br>
		Correu : <br>
		<input type ="text" name="4" value=<?php echo $row ['correu'];?>>
		<br>
<br>
		<input type="hidden" name="5" value=<?php echo $row ['usuari_id'];?>>
		
		<input type ="submit" value="Aceptar" button class="btn btn-success">
		
		
		
<form action ="gestioUsuaris.php" method="POST" >
&nbsp;
&nbsp;
<input type ="submit" value="Tornar" button class="btn btn-warning">

		</div>
		</div>
		
		
		
		
		
		
		