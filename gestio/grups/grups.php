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
  <title>Grups</title>

</head>

<body>
<?php include 'sideProfessor.h'; ?>

<div class="container">
<?php
	$_SESSION['IDgrup']=$_GET['grupID'];
	$_SESSION['NOMgrup']=$_GET['nom'];
	
	$grups="(SELECT grup_nom, grup_id FROM grups WHERE grup_id=".$_SESSION['IDgrup'].")";			
	$gru = mysqli_query($mysqli,$grups);

	echo "<h2>".$_SESSION['NOMgrup']."</h2>";
	echo "</br>";
	echo "<div class='row'>";
	
		while ($fila = mysqli_fetch_assoc($gru)) {
					
		echo "<table class='table-responsive' align='left' width=50% >";
		echo "<tr><th align='center'>&nbspNom&nbsp</th><th align='center'>&nbspCognom&nbsp</th><th align='center'>&nbspNotes&nbsp</th></tr>";
			
		$usuaris="(SELECT u.usuari_nom, u.usuari_cognom, u.usuari_id FROM usuaris u, usuarigrup ug WHERE u.usuari_id=ug.usuari_id AND ug.grup_id=".$_SESSION['IDgrup'].")";			
		$usu = mysqli_query($mysqli,$usuaris);
			while ($fila1 = mysqli_fetch_assoc($usu)) {
				echo "<tr>";
				echo "<td align='center' >";
				echo $fila1['usuari_nom'];
				echo "</td>";
				
				echo "<td align='center' >";
				echo $fila1['usuari_cognom'];
				echo "</td>";
				
				echo "<td align='center' >";
				echo "<form action='gestionarNotes.php' method='POST'><input type='hidden' value='".$fila1['usuari_cognom']."' name='usuari_cognom'><input type='hidden' value='".$fila1['usuari_nom']."' name='usuari_nom'><input type='hidden' value='".$fila1['usuari_id']."' name='usuari'> <button class='btn' type='submit'>Consultar Notes</button></form>";
			    echo "</td>";
			    echo "</tr>";
				
				
				echo "</tr>";
				
		
			}
		echo "</table>";
		
		} ?>
	</div>

		
</div>

</body>
</html>