
<!-- BORRAR AIXÒ QUAN TINGUIS FET LA VARIABLE DE SESSIÓ DE USUARI.
<input type="hidden" name="usr" value="Aitor">-->
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
<script>
function recarga(){
location.href=location.href
}
setInterval('recarga()',20000)
</script>

<?php 
include 'connect.h';

	//$query_avis = "SELECT r.preguntes_preguntes_id, p.llico_llico_id FROM avis a, respostes r, preguntes p  WHERE a.usuari_id = r.usuaris_usuari_id AND p.preguntes_id = r.preguntes_preguntes_id  AND a.avis = 1" AND a.usuari_id=(SELECT usuari_id FROM avis WHERE avis=1);

	
	$sql = "SELECT * FROM respostes WHERE usuaris_usuari_id=(SELECT usuari_id FROM avis WHERE avis=1) ORDER BY resposta_id DESC";
	$result = mysqli_query($mysqli, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_NUM);
	
	//echo $sql;
	//echo $sql2;


	//$result_avis = mysqli_query($mysqli, $query_avis);
	//$row_avis = mysqli_fetch_array($result_avis, MYSQLI_NUM);
	if (!$row) {
		echo "<p>No hi ha cap alumne seleccionat per fer l'examen</p>";
		echo "<a href='professormain.php' class='btn btn-success' role='button'>Tornar al menú</a>";	
	}
	else {

		$sql2 = "SELECT * FROM preguntes WHERE preguntes_id=".$row[5];
		$result2 = mysqli_query($mysqli, $sql2);
		$row2 = mysqli_fetch_array($result2, MYSQLI_NUM);
		// Select per trobar l'enunciat de la pregunta
		//$query_enunciat = "SELECT anunciat FROM preguntes WHERE  preguntes_id = $row_avis[0]";
		//$query_enunciat = $query.$_POST[preguntes_id];

		// Select per trobar el nom de la lliçó.
		$query_llico = "SELECT llico_nom FROM llico WHERE llico_id = $row2[3]";
		//$query_enunciat = $query.$_POST[llico_id];

		//$result_enunciat = mysqli_query($mysqli, $query_enunciat);
		$result_llico = mysqli_query($mysqli, $query_llico);

		//$row_enunciat = mysqli_fetch_array($result_enunciat, MYSQLI_NUM);
		$row_llico = mysqli_fetch_array($result_llico, MYSQLI_NUM);

		echo "<body>";
		echo "<div class='container'>";
		echo "<h2>Activitat Avaluable</h2>";
			  echo "<p>Llegeix l'anunciat i clica a començar per fer l'activitat.</p>";

			echo "<div class='col-sm-8 col-md-8'>";
			  //Cuadre del enunciat de la pregutna 
			  echo "<form action='param.php' method='POST'>";
			    echo "<div class='panel panel-primary'>";
				 	echo "<div class='panel-heading'>Lliçó: ".$row_llico[0]."</div>";
				 	echo "<div class='panel-body'>".$row2[1]."</div>";
				 	echo "<input type='hidden' name='id_pregunta' value=".$row2[0].">";
				 	echo "<input type='hidden' name='id_resposta' value=".$row[0].">";
				echo "</div>";
			    echo "<div><button>Començar</button></div>";
			  echo "</form>";
			echo "</div>";
		echo "</div>";
		echo "</body>";
	}
?>

	
</html>