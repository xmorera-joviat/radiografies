<?php
$base ="../../../";
include $base.'includes/session.h';
include $base.'includes/connect.h';
include $base.'includes/recorre.h';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">

<!-- 	<script type="text/javascript" src="<?php echo $base; ?>assets/js/jquery-latest.min.js"></script>
	<script type="text/javascript" src="<?php echo $base; ?>assets/js/custom.js"></script> -->
	<link href="<?php echo $base; ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo $base; ?>assets/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo $base; ?>assets/css/navmenu-push.css" rel="stylesheet">
	<link href="<?php echo $base; ?>assets/css/gestio.css" rel="stylesheet">
	<title>Pregunta Nova</title>
</head>

<body>
	<div class="container">
		<?php
	// veriable per controlar els errors, si es 0 no n'hi ha si és 1 n'hi ha
		$error = 0;
	//demanem el servidor quin es el curs actual i comprovem si existeix si no existeix posem la veriable error a 1
		mysqli_query ($mysqli,"SET NAMES 'utf8'"); 
		$sql = "SELECT grup_id, grup_nom FROM grups WHERE curs_curs_id = (SELECT curs_id FROM curs WHERE any_inici <= NOW() AND any_fi >= NOW())";
		$result = mysqli_query($mysqli, $sql);
		$recompteFiles = mysqli_num_rows($result);
		if ( $recompteFiles = mysqli_num_rows($result) == 0 ){
			$error = 1;
			echo "<p> no s ha trobat el curs actual</p>";
		}
		?>			
		<form action='temagrup.php' class="form" method="POST">
			<!-- creem un select amb una opcio per cada grup que hi ha en l'any actual-->
			<label for="grup">Grup</label>
			<select class="form-control" id="grup" name="grup">
				<option value="-1">sel·lecciona un grup:</option>
				<?php
				$recompteFiles = 0;
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<option value='".$row['grup_id']."'>".$row['grup_nom']."</option>";
				}
				
				echo "</select>";
				echo "<br>";
				echo "<button class='btn btn-md btn-primary' type='submit' name='sel·leccionar'>Entrar</button>";
				echo "</form>";
				if (isset($_POST['grup'])){
						if ($_POST['grup'] == '-1')
						unset($_SESSION['grup']);
					}
				if (empty($_POST['grup'])){
					if (empty($_SESSION['grup'])){
					echo "<h2>tria un grup</h2>";
					}
					else {
					$sql = "SELECT grup_nom FROM grups WHERE grup_id = ".$_SESSION['grup'].";";
					$result = mysqli_query($mysqli, $sql);
					$row = mysqli_fetch_assoc($result);
					echo "<h2>".$row['grup_nom']."</h2>";
					}
				}
				else {
					$_SESSION['grup'] = $_POST['grup'];
					$sql = "SELECT grup_nom FROM grups WHERE grup_id = ".$_SESSION['grup'].";";
					$result = mysqli_query($mysqli, $sql);
					$row = mysqli_fetch_assoc($result);
					echo "<h2>".$row['grup_nom']."</h2>";
				}
				?>
				<div class="row">
					<div class="col-sm-3">
						<?php
							echo "<table border=0 class='table'>";
							if (isset($_SESSION['grup'])){
								$sql="SELECT * FROM tema WHERE tema_id IN (SELECT tema_tema_id FROM temagrup WHERE grups_grup_id=".$_SESSION['grup'].");";
								$result = mysqli_query($mysqli, $sql);
								$recompteFiles = mysqli_num_rows($result);	
								if ($recompteFiles != 0){
									while ($fila = mysqli_fetch_assoc ($result) ) {
										echo "<tr>";
										echo "<td class='cela'>".$fila['tema_nom']."</td>";
										echo "<td><form action='temagrupdelete.php' class='form' method='POST'><input type='hidden' id='tema' name='tema' value='".$fila['tema_id']."'><input type='image'class='btn-elimina' src='../imatges/www/red-cross-25.png'></form></td>";
										echo "</tr>";
									}

									echo "</table>";
									echo "</div>";
									echo "<div class='col-sm-9'>";

								}
							}
							else {
								echo "<div>";
								echo "no hi ha cap classe sel·leccionada";	
								echo "</div>";
							}
							?>
						</div>
						<?php
						if (isset($_SESSION['grup'])){
							if ($_SESSION['grup']!= '-1'){
								echo "<div class='col-lg-3'>";
									echo "<form action='temagrupinsert.php' class='form' method='POST'>";
										echo "<label for='grup'>Temes</label>";
										echo "<select class='form-control' id='tema' name='tema'>";
											echo "<option value=''>sel·lecciona un tema:</option>";
											$sql="SELECT * FROM tema WHERE tema_id  NOT IN (SELECT tema_tema_id FROM temagrup WHERE grups_grup_id=".$_SESSION['grup'].");";
											$result = mysqli_query($mysqli, $sql);
											$recompteFiles = mysqli_num_rows($result);	
												while ($fila = mysqli_fetch_assoc ($result) ) {
													echo "<option value='".$fila['tema_id']."'>".$fila['tema_nom']."</option>";								
												}
											echo "</select>";
											echo "<br>";
											echo "<button class='btn btn-md btn-primary' type='submit' name='sel·leccionar'>Entrar</button>";
										echo "</form>";
							}
						}
						?>
							</div>
						</div>

					<?php
					if ($_SESSION['rol']==3){
						include $base.'includes/sideBeta.h';
					}elseif ($_SESSION['rol']==2){
						include $base.'includes/sideProfessor.h';
					}elseif ($_SESSION['rol']==4){
						include $base.'includes/sideBeta.h';
					}
					?>
					<script src="<?php echo $base; ?>assets/offcanvas/jquery-1.10.2.min.js"></script>
					<script src="<?php echo $base; ?>assets/offcanvas/bootstrap.min.js"></script>
					<script src="<?php echo $base; ?>assets/offcanvas/jasny-bootstrap.min.js"></script>
					<script src="<?php echo $base; ?>assets/js/custom.js"></script>
					</body>
					</html>
