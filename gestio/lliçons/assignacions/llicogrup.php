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

	<script type="text/javascript" src="<?php echo $base; ?>assets/js/jquery-latest.min.js"></script>
	<script type="text/javascript" src="<?php echo $base; ?>assets/js/custom.js"></script>
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
		<form action='llicogrup.php' class="form" method="POST">
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
					if ($_POST['grup'] == '-1'){
						unset($_SESSION['grup']);
					}
				}
				if (empty($_POST['grup'])){
					if (empty($_SESSION['grup'])){
						echo "<h2>tria un grup</h2>";
					}
					else {
						$sql = "SELECT grup_nom FROM grups WHERE grup_id = ".$_SESSION['grup'].";";
						$result = mysqli_query($mysqli, $sql);
						$row = mysqli_fetch_assoc($result);
						echo "<h2>Temes <small>".$row['grup_nom']."</small></h2>";
					}
				}
				else {
					$_SESSION['grup'] = $_POST['grup'];
					$sql = "SELECT grup_nom FROM grups WHERE grup_id = ".$_SESSION['grup'].";";
					$result = mysqli_query($mysqli, $sql);
					$row = mysqli_fetch_assoc($result);
					echo "<h2>Temes <small>".$row['grup_nom']."</small></h2>";
				}
				?>
				<div class="row">
					<div class="col-sm-3">
						<a href="#" class="nav-tabs-dropdown btn btn-block btn-primary">Tabs</a>
						<ul id="nav-tabs-wrapper" class="nav nav-tabs nav-pills nav-stacked well">
							<?php
							if (isset($_SESSION['grup'])){
								$sql="SELECT * FROM tema WHERE tema_id IN (SELECT tema_tema_id FROM temagrup WHERE grups_grup_id=".$_SESSION['grup'].");";
								$result = mysqli_query($mysqli, $sql);
								$recompteFiles = mysqli_num_rows($result);	
								if ($recompteFiles != 0){
									while ($fila = mysqli_fetch_assoc ($result) ) {
										echo "<li><a href='#".$fila['tema_id']."' data-toggle='tab'>".$fila['tema_nom']."</a></li>";

									}

									echo "</ul>";
									echo "</div>";
									echo "<div class='col-sm-9'>";
									echo "<div class='tab-content'>";
									echo "</div>";
								}
							}
							else {
								echo "no hi ha cap classe sel·leccionada";	
							}
							?>
						</div>
						<div class="col-sm-9">
							<div class='tab-content'>
								<?php
								if (isset($_SESSION['grup'])){
									if ($_SESSION['grup']!= '-1'){
										$sql="SELECT * FROM tema WHERE tema_id IN (SELECT tema_tema_id FROM temagrup WHERE grups_grup_id=".$_SESSION['grup'].");";
										$result = mysqli_query($mysqli, $sql);
										$recompteFiles = mysqli_num_rows($result);	
										if ($recompteFiles != 0){
											while ($fila = mysqli_fetch_assoc ($result) ) {
												$temaID=$fila['tema_id'];
												echo "<div role='tabpanel' class='tab-pane fade' id='".$temaID."'>";
												echo "<div class='col-lg-3'>";
												echo "<table border='0' class='table'>";
												$sql="SELECT * FROM llico WHERE llico_id IN(SELECT llico_llico_id FROM llicogrup WHERE temagrup_temagrup_id = (SELECT temagrup_id FROM temagrup WHERE tema_tema_id=".$temaID." AND grups_grup_id=".$_SESSION['grup']."));";
												$result3 = mysqli_query($mysqli, $sql);
												while ($fila3 = mysqli_fetch_assoc ($result3) ) {
													echo "<tr>";
													echo "<td class='cela'>".$fila3['llico_nom']."</td>";
													$sql="SELECT temagrup_id FROM temagrup WHERE tema_tema_id=".$temaID." AND grups_grup_id=".$_SESSION['grup'].";";
													$result4 = mysqli_query($mysqli, $sql);
													$fila4 = mysqli_fetch_assoc ($result4);
													echo "<td><form action='llicogrupdelete.php' class='form' method='POST'><input type='hidden' id='temagrup' name='temagrup' value='".$fila4['temagrup_id']."'><input type='hidden' id='llico' name='llico' value='".$fila3['llico_id']."'><input type='image' class='btn-eliminar' id='eliminar' src='../imatges/www/red-cross-25.png'></form></td>";
													echo "</tr>";
												}

												echo "</table>";
												echo "<br>";
												$sql="SELECT temagrup_id FROM temagrup WHERE tema_tema_id=".$temaID." AND grups_grup_id=".$_SESSION['grup'].";";
												$result4 = mysqli_query($mysqli, $sql);
												$fila4 = mysqli_fetch_assoc ($result4);
												echo "<form action='llicogrupinsert.php' class='form' method='POST'>";
												echo "<input type='hidden' id='temagrup' name='temagrup' value='".$fila4['temagrup_id']."'>";
												echo "<label for='grup'>lliço</label>";
												echo "<select class='form-control' id='llico' name='llico'>";
												echo "<option value=''>sel·lecciona una lliço:</option>";
												$sql="SELECT * FROM llico WHERE llico_id NOT IN (SELECT llico_llico_id FROM llicogrup WHERE temagrup_temagrup_id IN(SELECT temagrup_id FROM temagrup WHERE grups_grup_id='".$_SESSION['grup']."')) AND tema_tema_id = '".$temaID."';";
												$result2 = mysqli_query($mysqli, $sql);
												$recompteFiles = mysqli_num_rows($result2);	
												while ($fila2 = mysqli_fetch_assoc ($result2) ) {
													echo "<option value='".$fila2['llico_id']."'>".$fila2['llico_nom']."</option>";								
												}
												echo "</select>";
												echo "<br>";
												echo "<button class='btn btn-md btn-primary' type='submit' name='sel·leccionar'>Entrar</button>";
												echo "</form>";
												echo "</div>";
												echo "</div>";
											}

										}           
									}

								}
								?>
							</div>
						</div>
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
				</body>
				</html>
