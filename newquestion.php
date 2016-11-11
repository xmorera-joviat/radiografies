<?php
include 'session.h';
include 'connect.h';

	$sql="INSERT INTO preguntes(anunciat,llico_llico_id,xray_codi) VALUES ('";
		$sql= $sql . $_POST['anunciat'];
		$sql= $sql . "',";
		$sql= $sql . $_POST['llico'];
		$sql= $sql . ",";
		$sql= $sql . $_POST['radiografia'];
		$sql= $sql . ")";

	//echo $sql;
	$insert_row = $mysqli->query($sql);

	if($insert_row){
	    print 'Alta de pregunta correcte amb id : ' .$mysqli->insert_id .'<br />'; 
	}else{
	    die('Error : ('. $mysqli->errno .') '. $mysqli->error);
	}



?>

<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

	<div style="text-align:center">  
		<form action='pregunta_nova.php' method='POST'>
			<input type="submit" class="btn btn-success" value="Enrere" name="submit">
		</form>
	</div> 

</body>
</html>
