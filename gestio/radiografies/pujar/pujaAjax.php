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

<!-- 	<script type="text/javascript" src="../../assets/js/jquery-latest.min.js"></script> -->

	<link href="<?php echo $base; ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $base; ?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo $base; ?>assets/css/navmenu-push.css" rel="stylesheet">
	<title>Pujar imatge</title>

	</head>

 <body>

 	<!-- <div style="text-align:center">  -->
 		

	<div class="container">
		<form id="parametres" action="upload.php" method="POST" enctype="multipart/form-data">
		<div class="row" > <!-- Part superior -->
			<!-- Part esquerra superior - Div amb la foto -->
			<div class="col-sm-6 col-md-6 col-lg-6" id="container">

				<img class="img-responsive" src="<?php echo $_SESSION['filetreb']; ?>">

			</div>

			<!-- Part dreta superior - div amb els 4 sliders -->
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

			</div> <!-- part dreta superior -->
		</div> <!-- Part superior -->


		<div class="row"> <!-- Part inferior -->
			<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">

				<div class="btn-group-1" role="group" aria-label="...">
					<label> Càmeres </label>
					<label class="class btn1 btn-success active">
						<img src="<?php echo $base; ?>assets/imatges/www/1.png" width="60" />
						<input type="checkbox" autocomplete="off" name="camleft" id="camleft" value="1">
					</label>
					<label class="class btn1 btn-success active">
						<img src="<?php echo $base; ?>assets/imatges/www/2.png" width="60" />
						<input type="checkbox" autocomplete="off" name="camcenter" id="camcenter" value="1">	
					</label>
					<label class="class btn1 btn-success active">
						<img src="<?php echo $base; ?>assets/imatges/www/3.png" width="60" />
						<input type="checkbox" autocomplete="off" name="camright" id="camright" value="1">	
					</label>
				</div>
				<div class="btn-group-2" role="group" aria-label="...">
					<label> Bucky </label>
					<label class="class btn1 btn-success active">
						<img src="<?php echo $base; ?>assets/imatges/www/taula.png" id="changer" width="60" />
						<input type="radio" name="bucky" value="taula" onClick="validar()" id="taula" >
					</label>
					<label class="class btn1 btn-success active">
						<img src="<?php echo $base; ?>assets/imatges/www/mural-1.png" id="changer" width="60" />
						<input type="radio" name="bucky" value="directe" onClick="validar()" id="directe" >	
					</label>
					<label class="class btn1 btn-success active">
						<img src="<?php echo $base; ?>assets/imatges/www/directe.png" id="changer" width="60" />
						<input type="radio" name="bucky" value="mural" onClick="validar()" id="mural" >	
					</label>
				</div>
				<div class="btn-group-3" role="group" aria-label="...">
					<label> Focus </label>
					<label class="class btn1 btn-success active">
						<img src="<?php echo $base; ?>assets/imatges/www/fi.png" width="60" />
						<input type="radio" name="focus" value="fi" onClick="validar()" id="fi">
					</label>
					<label class="class btn1 btn-success active">
						<img src="<?php echo $base; ?>assets/imatges/www/gruixut.png" width="60" />
						<input type="radio" name="focus" value="gruixut" onClick="validar()" id="gruixut">	
					</label>
				</div>

			</div>
			<div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
				<!-- <form method="post" action="" name="form1"> -->
				<div class="form-group has-feedback col-md-6 col-lg-6">
					<label style="margin-top:30px">Zona</label>
				    <select class="form-control" name="zona" onChange="getOs(this.value)" id="zona">
					<?php
						mysqli_query ($mysqli,"SET NAMES 'utf8'");
						$sql="SELECT * FROM zona";
						$result = mysqli_query($mysqli, $sql);
						while ($row = mysqli_fetch_assoc($result)) {
							echo "<option value='".$row['zona_id']."'>".$row['zona_nom']."</option>";
						}
					?>
					</select>

	
					<label>Os</label>
					<div id="osdiv">
						<select class="form-control" name="os" id="os">
						<option>Selecciona un os</option>
						</select>
					</div>
					

					<label>Posició</label>
					<div id="posdiv">
						<select class="form-control" name="posicio" id="posicio">
						<option>Selecciona una posició</option>
						</select>
					</div>
					

					<label>Centratge</label>
					<div id="centdiv">
						<select class="form-control" name="centratge" id="centratge" onBlur="validar()">
						<option>Selecciona un centratge</option>
						</select>
					</div>
						
				</div>
				<!-- </form> -->
					<div class="col-md-4 col-lg-4">
					</div>
				</div>
		</div>
		<div class="row">
			<div class="col-xs-6 col-md-6 col-lg-6"></div>
			<div class="col-xs-6 col-md-6 col-lg-6" >
				<input type="submit" class="btn btn-success" value="Pujar imatge" id="sub" disabled>
			</div>
		</div>
	</form>
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
<!-- </div> -->
<script src="<?php echo $base; ?>assets/offcanvas/jquery-1.10.2.min.js"></script>
<script src="<?php echo $base; ?>assets/offcanvas/bootstrap.min.js"></script>
<script src="<?php echo $base; ?>assets/offcanvas/jasny-bootstrap.min.js"></script>
<script src="<?php echo $base; ?>assets/js/custom.js"></script>
</body>
</html>