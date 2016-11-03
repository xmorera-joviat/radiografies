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
  <title>Notes</title>

</head>

<body>
<?php include 'sideProfessor.h'; ?>

<div class="container">
<?php
	$_SESSION['usuariID']=$_POST['usuari'];
	$_SESSION['usuariNom']=$_POST['usuari_nom']." ".$_POST['usuari_cognom'];
	
	$llico="(SELECT l.llico_nom, l.llico_id FROM llico l WHERE l.llico_id IN (SELECT llico_llico_id FROM preguntes WHERE preguntes_id IN (SELECT preguntes_preguntes_id FROM respostes WHERE usuaris_usuari_id=".$_SESSION['usuariID'].")))";			
	$lli = mysqli_query($mysqli,$llico);
	$mitja = 0;
	$sum = 0;
	
	echo "<h2>".$_SESSION['usuariNom']."</h2>";
	echo "</br>";
	echo "<div class='row'>";
	
		while ($fila = mysqli_fetch_assoc($lli)) {
			
		echo "<h2>".$fila['llico_nom']."</h2>";
		
		echo "<table class='table-responsive col-md-12' align='left' width=50% >";
		echo "<tr><th align='center'>&nbspEnunciat&nbsp</th><th align='center'>&nbspNota&nbsp</th>";
		
		$preguntes="(SELECT p.anunciat, r.nota FROM preguntes p, respostes r WHERE p.preguntes_id=r.preguntes_preguntes_id AND r.usuaris_usuari_id=".$_SESSION['usuariID']." AND llico_llico_id=".$fila['llico_id'].")";			
		$pregu = mysqli_query($mysqli,$preguntes);
			while ($fila1 = mysqli_fetch_assoc($pregu)) {
					
			
				echo "<tr>";
				echo "<td align='center' >";
				echo $fila1['anunciat'];
				echo "</td>";
				
				echo "<td align='center' >";
				echo $fila1['nota'];
				echo "</td>";
				echo "</tr>";
				$sum = $fila1['nota'] + $sum;
				$mitja = $mitja +1;
		
			}
			echo "<tr>";
			echo "<th align='center' >";
			echo "Nota mitja";
			echo "</th>";
				
			echo "<th align='center' >";
			echo $sum/$mitja;
			echo "</th>";
			echo "</tr>";
		echo "</table>";
		$sum=0;
		$mitja=0;
		echo "<br>";
		echo "</br>";echo "<br>";
		echo "</br>";echo "<br>";
		echo "</br>";echo "<br>";
		echo "</br>";echo "<br>";
		echo "</br>";
		} ?>
	</div>

		
</div>



</body>
</html>