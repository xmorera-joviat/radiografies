<?php
include 'session.h';
include 'connect.h';


	$sql="INSERT INTO usuaris(usuari_nom,usuari_cognom,username,userpass,correu,tipususuari_rol_id) VALUES ('";
		$sql= $sql . $_POST['usuari'];
		$sql= $sql . "','";
		
		$sql= $sql . $_POST['cognom'];
		$sql= $sql . "','";
		
		$sql= $sql . $_POST['user'];
		$sql= $sql . "','";
		
		$sql= $sql . $_POST['pw'];
		$sql= $sql . "','";
		
		$sql= $sql . $_POST['correu'];
		$sql= $sql . "','";
		
		$sql= $sql . $_POST['tipus'];
		$sql= $sql . "')";
		
		$result = mysqli_real_query ($mysqli,$sql);

		mysqli_close($mysqli);
	    header('Location:gestioUsuaris.php');

?> 	
