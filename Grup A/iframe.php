<?php 
include 'connect.h';
?>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	<body>
		<?php
			mysqli_query ($mysqli,"SET NAMES 'utf8'");
			$sql="SELECT * FROM respostes WHERE resposta_id=11";
			//echo $sql;
			$result = mysqli_query($mysqli, $sql);
			if (!$result) {
				die('Consulta no válida: ' . mysql_error());
			}
			echo "<select class='form-control'name='Alumnes'>";
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<option value=".$row['usuari_id'].">".$row['usuari_nom'].' '.$row['usuari_cognom']."</option>";
				}
			echo "</select>";
		?>
	</body>
</html>