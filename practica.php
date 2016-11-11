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
	<link rel="stylesheet" href="css/slider.css">
	<script type="text/javascript" src="js/jquery-latest.min.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Julius+Sans+One' rel='stylesheet' type='text/css'>
	  	<title>Pujar imatge</title>
	  	<script type="text/javascript">
    		function updateTextInput(val) {
     		document.getElementById('points').value=val;

    		}
  </script>
	</head>

	<body>

		<nav class="navbar navbar-default">
            <a class="navbar-brand" href="#">Projecte Xray</a>
            <ul class="nav navbar-nav">
              <li><a href="main.php">Home</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="logout.php">Desconectar</a></li>
            </ul>
      	</nav>

		<div style="text-align:center"> 
		<form action="mostra.php" method="POST" enctype="multipart/form-data">

	<div class="container">

		<div class="row" style="margin-top:50px;">

			<div class="col-sm-6 col-md-3 col-lg-3">

				<div class="btn-group-1" role="group" aria-label="...">
					<label> Càmeres </label>
					<label class="class btn1 btn-success active">
						<img src="imatges/www/1.png" width="60" />
						<input type="hidden" name="camleft" value="0">
						<input type="checkbox" autocomplete="off" name="camleft" value="1">
					</label>
					<label class="class btn1 btn-success active">
						<img src="imatges/www/2.png" width="60" />
						<input type="hidden" name="camcenter" value="0">	
						<input type="checkbox" autocomplete="off" name="camcenter" value="1">	
					</label>
					<label class="class btn1 btn-success active">
						<img src="imatges/www/3.png" width="60" />
						<input type="hidden" name="camright" value="0">
						<input type="checkbox" autocomplete="off" name="camright" value="1">	
					</label>
				</div>
				<div class="btn-group-2" role="group" aria-label="...">
					<label> Bucky </label>
					<label class="class btn1 btn-success active">
						<img src="imatges/www/taula.png" id="changer" onclick="changeImage(this)" width="60" />
						<input type="radio" name="bucky" value="taula">
					</label>
					<label class="class btn1 btn-success active">
						<img src="imatges/www/mural-1.png" id="changer" onclick="changeImage2(this)" width="60" />
						<input type="radio" name="bucky" value="mural">	
					</label>
					<label class="class btn1 btn-success active">
						<img src="imatges/www/directe.png" id="changer" onclick="changeImage3(this)" width="60" />
						<input type="radio" name="bucky" value="directe">	
					</label>
				</div>
				<div class="btn-group-3" role="group" aria-label="...">
					<label> Focus </label>
					<label class="class btn1 btn-success active">
						<img src="imatges/www/fi.png" width="60" />
						<input type="radio" name="focus" value="fi">
					</label>
					<label class="class btn1 btn-success active">
						<img src="imatges/www/gruixut.png" width="60" />
						<input type="radio" name="focus" value="gruixut">	
					</label>
				</div>

			</div>
			<div class="col-sm-6 col-md-3 div col-lg-3">
				<div class="form-group has-feedback">
					<?php

					//$mysqli = mysqli_connect("localhost", "test", "test", "projectx");
					mysqli_query ($mysqli,"SET NAMES 'utf8'");
					$sql="SELECT * FROM loc;";
					$result = mysqli_query($mysqli, $sql);

					if (!$result) {
						die('Invalid query: ' . mysql_error());
					}
					?>
					<label style="margin-top:30px">Localització anatòmica</label>
					<select class="form-control" name="loc">>
						
						<?php
						$i=0;
						while ($row = mysqli_fetch_assoc($result)) {
							if ($i==0){
									echo "<option value='".$row['codiloc']."' selected >".$row['nomloc']."</option>";
									$i=1;
								} else {
									echo "<option value='".$row['codiloc']."'>".$row['nomloc']."</option>";
								}
						}
						?>
						</select




						<?php
						$sql="SELECT * FROM os;";
						$result = mysqli_query($mysqli, $sql);

						if (!$result) {
							die('Invalid query: ' . mysql_error());
						}
						?>
						<label>Os</label>
						<select class="form-control" name="os">
							<?php
						$i=0;
						while ($row = mysqli_fetch_assoc($result)) {
							if ($i==0){
									echo "<option value='".$row['codios']."' selected >".$row['nomos']."</option>";
									$i=1;
								} else {
									echo "<option value='".$row['codios']."'>".$row['nomos']."</option>";
								}
						}
						?>
						</select
						<?php
						$sql="SELECT * FROM centratge;";
						$result = mysqli_query($mysqli, $sql);

						if (!$result) {
							die('Invalid query: ' . mysql_error());
						}
						?>
						<label>Centratge</label>
						<select class="form-control" name="centratge">
							<?php
						$i=0;
						while ($row = mysqli_fetch_assoc($result)) {
							if ($i==0){
									echo "<option value='".$row['codicent']."' selected >".$row['nomcent']."</option>";
									$i=1;
								} else {
									echo "<option value='".$row['codicent']."'>".$row['nomcent']."</option>";
								}
						}
						?>
						</select
						<?php
						$sql="SELECT * FROM posicio;";
						$result = mysqli_query($mysqli, $sql);

						if (!$result) {
							die('Invalid query: ' . mysql_error());
						}
						?>
						<label>Posició</label>
						<select class="form-control" name="posicio">
							<?php
						$i=0;
						while ($row = mysqli_fetch_assoc($result)) {
							if ($i==0){
									echo "<option value='".$row['codipos']."' selected >".$row['nompos']."</option>";
									$i=1;
								} else {
									echo "<option value='".$row['codipos']."'>".$row['nompos']."</option>";
								}
						}
						?>
						</select>
						</div>
					</div>
								<div class="col-sm-6 col-sm-6 col-md-6 col-lg-6">

				<!-- Primera barra slider -->
				<div class="row" style="margin-left:10px">
					<div class="col-sm-11 col-md-11 col-lg-11">
						<input type="range" name="slider1" min="0" max="150" value="0" id="fader1" step="2" oninput="outputUpdate1(value)">
					</div>
					<div class="col-sm-1 col-md-1 col-lg-1">
						<label for="fader">kW</label><output for="fader" id="slider1">0</output> 
					</div>
				</div>

				<!-- Segona barra slider -->

				<div class="row" style="margin-left:10px">
					<div class="col-sm-11 col-md-11 col-lg-11">
						<input type="range" name="slider2" min="0" max="150" value="0" id="fader2" step="2" oninput="outputUpdate2(value)">
					</div>
					<div class="col-sm-1 col-md-1 col-lg-1">
						<label for="fader">mA</label><output for="fader" id="slider2">0</output> 
					</div>
				</div>

				<!-- Tercera barra slider 3 -->

				<div class="row" style="margin-left:10px">
					<div class="col-sm-11 col-md-11 col-lg-11">
						<input type="range" name="slider3" min="0" max="1" value="0" id="fader3" step="0.25" oninput="outputUpdate3(value)">
					</div>
					<div class="col-sm-1 col-md-1 col-lg-1">
						<label for="fader">Temps</label><output for="fader" id="slider3">0</output> 
					</div>
				</div>

				<!-- cuarta barra slider -->   

				<div class="row" style="margin-left:10px">
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
			</div>
		
		<div class="row" style="margin-top:80px">
			<div class="col-sm-4 col-md-4 div col-lg-4"></div>
			<div class="col-sm-4 col-md-4 div col-lg-4">
				<input type="submit" class="btn btn-primary" value="Mostra" name="submit">
			</div>
			<div class="col-sm-4 col-md-4 div col-lg-4"></div>
				
			
		</div>
	</form>
	</div>
	</body>
</html>