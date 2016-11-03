<?php
include 'session.h';
include 'connect.h';
include 'recorre.h';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">

	<script type="text/javascript" src="js/jquery-latest.min.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/navmenu-push.css" rel="stylesheet">
	<title>Pujar imatge</title>
	<script>

	</script>
	</head>

 <body>
	
 	<div style="text-align:center"> 
 		<form id="parametres" action="upload.php" method="POST" enctype="multipart/form-data">

	<div class="container">

		<div class="row" >

			<div class="col-sm-6 col-md-6 col-lg-6">

				<img class="img-responsive" src="<?php echo $_SESSION['filetreb']; ?>" style="width: 480px; height: 320px; align:center">

			</div>
			<div class="col-sm-6 col-md-6 col-lg-6">

				<!-- Primera barra slider -->
				<div class="row">
					<div class="col-sm-11 col-md-11 col-lg-11">
						<input type="range" name="slider1" min="0" max="150" value="0" id="fader1" step="2" oninput="outputUpdate1(value)">
					</div>
					<div class="col-sm-1 col-md-1 col-lg-1">
						<label for="fader">kW</label><output for="fader" id="slider1">0</output> 
					</div>
				</div>

				<!-- Segona barra slider -->

				<div class="row">
					<div class="col-sm-11 col-md-11 col-lg-11">
						<input type="range" name="slider2" min="0" max="150" value="0" id="fader2" step="2" oninput="outputUpdate2(value)">
					</div>
					<div class="col-sm-1 col-md-1 col-lg-1">
						<label for="fader">mA</label><output for="fader" id="slider2">0</output> 
					</div>
				</div>

				<!-- Tercera barra slider 3 -->

				<div class="row">
					<div class="col-sm-11 col-md-11 col-lg-11">
						<input type="range" name="slider3" min="0" max="1" value="0" id="fader3" step="0.25" oninput="outputUpdate3(value)">
					</div>
					<div class="col-sm-1 col-md-1 col-lg-1">
						<label for="fader">Temps</label><output for="fader" id="slider3">0</output> 
					</div>
				</div>

				<!-- cuarta barra slider -->   

				<div class="row">
					<div class="col-sm-11 col-md-11 col-lg-11">
						<input type="range" disabled name="slider4" min="0" max="150" value="0" id="fader4" step="2" oninput="outputUpdate4(value)">
					</div>
					<div class="col-sm-1 col-md-1 col-lg-1">
						<label for="fader">mAs</label><output for="fader" id="slider4">0</output> 
					</div>
				</div>
			<!-- sliders Fi -->

		</div>
	</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">

				<div class="btn-group-1" role="group" aria-label="...">
					<label> Càmeres </label>
					<label class="class btn1 btn-success active">
						<img src="imatges/www/1.png" width="60" />
						<input type="checkbox" autocomplete="off" name="camleft" onClick="validar()" id="camleft" value="1">
					</label>
					<label class="class btn1 btn-success active">
						<img src="imatges/www/2.png" width="60" />
						<input type="checkbox" autocomplete="off" name="camcenter" onClick="validar()" id="camcenter" value="1">	
					</label>
					<label class="class btn1 btn-success active">
						<img src="imatges/www/3.png" width="60" />
						<input type="checkbox" autocomplete="off" name="camright" onClick="validar()" id="camright" value="1">	
					</label>
				</div>
				<div class="btn-group-2" role="group" aria-label="...">
					<label> Bucky </label>
					<label class="class btn1 btn-success active">
						<img src="imatges/www/taula.png" id="changer" width="60" />
						<input type="radio" name="bucky" value="taula" onClick="validar()" id="taula" >
					</label>
					<label class="class btn1 btn-success active">
						<img src="imatges/www/mural-1.png" id="changer" width="60" />
						<input type="radio" name="bucky" value="mural" onClick="validar()" id="mural" >	
					</label>
					<label class="class btn1 btn-success active">
						<img src="imatges/www/directe.png" id="changer" width="60" />
						<input type="radio" name="bucky" value="directe" onClick="validar()" id="directe" >	
					</label>
				</div>
				<div class="btn-group-3" role="group" aria-label="...">
					<label> Focus </label>
					<label class="class btn1 btn-success active">
						<img src="imatges/www/fi.png" width="60" />
						<input type="radio" name="focus" value="fi" onClick="validar()" id="fi">
					</label>
					<label class="class btn1 btn-success active">
						<img src="imatges/www/gruixut.png" width="60" />
						<input type="radio" name="focus" value="gruixut" onClick="validar()" id="gruixut">	
					</label>
				</div>

			</div>
			<div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">

				<div class="form-group has-feedback col-md-6 col-lg-6">
					<?php

					mysqli_query ($mysqli,"SET NAMES 'utf8'");
					$sql="SELECT zona_nom,zona_id FROM zona;";
					$result = mysqli_query($mysqli, $sql);

					if (!$result) {
						die('Invalid query: ' . mysql_error());
					}
					?>
					<label style="margin-top:30px">Zona</label>
					<select class="form-control" name="zona" onBlur="validar()" id="zona">>
						
						<?php
						$i=0;
						while ($row = mysqli_fetch_assoc($result)) {
							if ($i==0){
									echo "<option value='".$row['zona_id']."' selected >".$row['zona_nom']."</option>";
									$i=1;
								} else {
									echo "<option value='".$row['zona_id']."'>".$row['zona_nom']."</option>";
								}
						}
						?>
						</select>


						<?php
						$sql="SELECT * FROM os;";
						$result = mysqli_query($mysqli, $sql);

						if (!$result) {
							die('Invalid query: ' . mysql_error());
						}
						?>
						<label>Os</label>
						<select class="form-control" name="os" onBlur="validar()" id="os">
							<?php
						$i=0;
						while ($row = mysqli_fetch_assoc($result)) {
							if ($i==0){
									echo "<option value='".$row['os_id']."' selected >".$row['os_nom']."</option>";
									$i=1;
								} else {
									echo "<option value='".$row['os_id']."'>".$row['os_nom']."</option>";
								}
						}
						?>
						</select>

						<?php
						$sql="SELECT DISTINCT posicio_nom,posicio_id FROM posicio;";
						$result = mysqli_query($mysqli, $sql);

						if (!$result) {
							die('Invalid query: ' . mysql_error());
						}
						?>
						<label>Posició</label>
						<select class="form-control" name="posicio" onBlur="validar()" id="posicio">
							<?php
						$i=0;
						while ($row = mysqli_fetch_assoc($result)) {
							if ($i==0){
									echo "<option value='".$row['posicio_id']."' selected >".$row['posicio_nom']."</option>";
									$i=1;
								} else {
									echo "<option value='".$row['posicio_id']."'>".$row['posicio_nom']."</option>";
								}
						}
						?>
						</select>

						<?php
						$sql="SELECT DISTINCT centratge_nom, centratge_id FROM centratge;";
						$result = mysqli_query($mysqli, $sql);

						if (!$result) {
							die('Invalid query: ' . mysql_error());
						}
						?>
						<label>Centratge</label>
						<select class="form-control" name="centratge" onBlur="validar()" id="centratge">
							<?php
						$i=0;
						while ($row = mysqli_fetch_assoc($result)) {
							if ($i==0){
									echo "<option value='".$row['centratge_id']."' selected >".$row['centratge_nom']."</option>";
									$i=1;
								} else {
									echo "<option value='".$row['centratge_id']."'>".$row['centratge_nom']."</option>";
								}
						}
						?>
						</select>
						
					</div>
					<div class="col-md-4 col-lg-4">
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 col-md-6 col-lg-6"></div>
			<div class="col-xs-6 col-md-6 col-lg-6" >
				<input type="btn" class="btn btn-primary btn-small" onClick="validar()" value="validar">
				<input type="submit" class="btn btn-success" value="Pujar imatge" id="sub" disabled>
			</div>
		</div>
	</form>
<?php
if ($_SESSION['rol']==3){
	include 'sideAlumne.h';
}else if ($_SESSION['rol']==2){
	include 'sideProfessor.h';
}
?>
</body>
</html>