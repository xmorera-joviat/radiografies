<?php 
include 'connect.h';
session_start();
$idUsuari = $_SESSION['idUsuari'];
$idPregunta = $_SESSION['idPregunta'];

	$query_avis = "SELECT llico_llico_id FROM preguntes WHERE preguntes_id = $idPregunta";
	$result_avis = mysqli_query($mysqli, $query_avis);
	$row_avis = mysqli_fetch_array($result_avis, MYSQLI_NUM);
	

	// Select per trobar l'enunciat de la pregunta
	$query_enunciat = "SELECT anunciat FROM preguntes WHERE  preguntes_id = $idPregunta";
	//$query_enunciat = $query.$_POST[preguntes_id];

	// Select per trobar el nom de la lliçó.
	$query_llico = "SELECT llico_nom FROM llico WHERE llico_id = $row_avis[0]";
	//$query_enunciat = $query.$_POST[llico_id];

	$result_enunciat = mysqli_query($mysqli, $query_enunciat);
	$result_llico = mysqli_query($mysqli, $query_llico);

	$row_enunciat = mysqli_fetch_array($result_enunciat, MYSQLI_NUM);
	$row_llico = mysqli_fetch_array($result_llico, MYSQLI_NUM);

?>

<!-- BORRAR AIXÒ QUAN TINGUIS FET LA VARIABLE DE SESSIÓ DE USUARI.
<input type="hidden" name="usr" value="Aitor"> -->


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Activitat Avaluable</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
	<body>
		<div class="container">
		<h2>Activitat Avaluable</h2>
			  <p>Llegeix l'anunciat i clica a començar per comentar l'activitat.</p>

			<div class="col-sm-8 col-md-8">
			  <!-- Cuadre del enunciat de la pregutna -->
			  <form role="form" action="comentaris.php">
			    <div class="panel panel-primary">
				 	<div class="panel-heading">Lliçó: <?php echo $row_llico[0]; ?></div>
				 	<div class="panel-body"><?php echo $row_enunciat[0]; ?></div>
				</div>
			    <div><button>Començar</button></div>
			  </form>
			</div>
		</div>
	</body>
</html>