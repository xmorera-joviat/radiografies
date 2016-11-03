<?php
$base ="../../../../";
include $base.'includes/session.h';
include $base.'includes/connect.h';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">

	
<!-- 	<link rel="stylesheet" href="../../assets/css/slider.css"> -->
	<link href="<?php echo $base; ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $base; ?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo $base; ?>assets/css/navmenu-push.css" rel="stylesheet">
	<title>Artefactes</title>

</head>

<body>

	<form action="anominsert.php" method="POST" enctype="multipart/form-data">
		<div class="container">
			<div class="jumbotron jumbo-color">

				<div class="row">

					<div class="col-sm-8 col-md-8 col-lg-8" id="container">
						<a href="#"><img class="" src="../<?php echo $_SESSION['uploadedfile']?>"></a>

					</div>
					<div class="col-sm-4 col-md-4 col-lg-4" >
						<h3 align= 'center' >Llistat d'artefactes assignats</h3>
						<?php

						//$mysqli = mysqli_connect("localhost", "test", "test", "projectx");
						mysqli_query ($mysqli,"SET NAMES 'utf8'");

						$sql="SELECT a.codixa, b.noman, b.descan FROM xrayanom a, anomalia b WHERE a.codianom = b.codian AND a.codixray = ".$_SESSION['codi'].";";
 						//'".$_SESSION['codi']."'
						$result = mysqli_query($mysqli, $sql);

						echo "<table class='table-responsive' align='center' border='1.5' width='250'>";
						echo "<tr><td align='center' style='background-color:#32b4ee;font-size: 16px;'>&nbspArtefactes&nbsp</td><td align='center' style='background-color:#32b4ee;font-size: 16px;'>&nbspEliminar&nbsp</td></tr>";

						while ($row2 = mysqli_fetch_assoc ($result) ) {

							echo "<tr>";
							echo "<td align='center' style='background-color:#fff'>";
							echo $row2['noman'];
							echo "</td>";

							echo "<td style='background-color:#fff'></form>";
							echo "<form action='anodelete.php' method='POST'>";
							echo "<input type='hidden' value='".$row2 ['codixa']."' name='codixa'>";
							echo "<input type='image' class='img-btn' src=".$base."assets/imatges/www/red-cross-25.png>";
							//echo "<input type='submit' class='btn btn-danger btn-xs' value='Eliminar'>";
							echo "</form>";
							echo "</td>";

							echo "</tr>";

						}

						echo "</table>";
						?>
					</div>
					
				</div>
			</div>
		</div>
		<div class="container">
			<div class="col-md-2 col-lg-2"></div>
			<div class="col-md-6 col-lg-6" name="taula">
				<?php
				//$mysqli = mysqli_connect("localhost", "test", "test", "projectx");
				mysqli_query ($mysqli,"SET NAMES 'utf8'");
				$sql="SELECT codian, noman FROM anomalia WHERE noman NOT IN (SELECT b.noman FROM xrayanom a, anomalia b WHERE a.codianom = b.codian AND a.codixray = ".$_SESSION['codi'].");";
				$result = mysqli_query($mysqli, $sql);

				if (!$result) {
					die('Invalid query: ' . mysql_error());
				}
				?>
				<label>Artefactes</label>
				<select class="form-control" name="anomalia">
					<option value=""> Escull una opció</option>
					<?php
					while ($row = mysqli_fetch_assoc($result)) {
						echo "<option value='".$row['codian']."'>".$row['noman']."</option>";
					}
					?>
				</select>
			</div>
			<div class="col-md-1 col-lg-1">
				<input type="submit" class="btn btn-success" value="Assignar" id="aplicar" name="submit">
			</div>
			</form>
			<div class="col-md-2 col-lg-2">
				<a class="btn btn-danger" href="../pujaAjax.php" id="aplicar" role="button">Finalitzar</a>

			</div>
		</div>
	
<?php
if ($_SESSION['rol']==3){
	include $base.'includes/sideAlumne.h';
}elseif ($_SESSION['rol']==2){
	include $base.'includes/sideProfessor.h';
}elseif ($_SESSION['rol']==4){
	include $base.'includes/sideBeta.h';
}
?>
</body>
</html>