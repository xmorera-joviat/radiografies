<?php
$base ="../../";
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

  <link href='http://fonts.googleapis.com/css?family=Julius+Sans+One' rel='stylesheet' type='text/css'>
  <link href="<? echo $base; ?>assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<? echo $base; ?>assets/css/bootstrap.css" rel="stylesheet">
  <link href="<? echo $base; ?>assets/css/navmenu-push.css" rel="stylesheet">
  <title>Gestió grups, usuaris i cursos</title>

</head>

<body>

<div class="container">
	<h2>Gestio Usuaris, Cursos i Grups</h2>
	</br>
	<div class="row">
		<!-- Alta Alumnes ---------------------------------------------------------------------------------->
		<div class="col-md-5 col-md-offset-1 panel-group">
			<div class="panel panel-default" >
			<button type="button" class="btn btn-info form-control panel-title" data-toggle="collapse" data-target="#Quadrat1">Alta Alumnes</button>
				<div id="Quadrat1" class="collapse">
					<div class="panel-body">

						<form action="alta_alumnes/alumnaFi.php" method="POST">

							<table align='center' border='0' class="table-responsive">

							<tr>
							<td> <label >Nom</label></td> <td><input type="text" name="usuari"  class="form-control"> </td>
							</tr>

							<tr>
							<td> <label>Cognom</label></td> <td><input type="text" name="cognom"  class="form-control"> </td>
							</tr>

							<tr>
							<td> <label>NomUsuari</label></td> <td><input type="text" name="user"  class="form-control"> </td>
							</tr>

							<tr>
							<td><label>Contrasenya</label></td> <td><input type="password" name="pw"  class="form-control"> </td>
							</tr>

							<tr>
							<td><label>Correu</label></td> <td><input type="email" name="correu" > </td>
							</tr>

							<tr>
							<input type="hidden" name="tipus"  class="form-control" value='2'>
							</tr>

							<tr>
							<td colspan="2"> <input type="submit" name="enviar" value="Registrar" button class="btn btn-success" style="margin-left:70%"></td>
							</tr>
							</table>


						</form>

					</div>
				</div>
			</div>
		</div>

		<!-- Gestio Alumnes ---------------------------------------------------------------------------------->
		<div class="col-md-5 col-md-offset-1">
			<div class="panel panel-default" >
			<button type="button" class="btn btn-info form-control panel-title" data-toggle="collapse" data-target="#Quadrat2">Gestio Alumnes</button>
				<div id="Quadrat2" class="collapse">

					<div class="panel-body">
						<?php
						$taula="(SELECT usuari_id,username, usuari_nom, usuari_cognom FROM usuaris)";

						//echo $taula;
						//$taulaUsuaris = mysqli_real_query ($mysqli,$taula);
						$taulaUsuaris = mysqli_query($mysqli,$taula);
							echo "<table class='table-responsive' align='center' class='table-responsive'>";
							echo "<tr><th align='center'>&nbspAlumne&nbsp</th><th align='center'>&nbspEliminar&nbsp</th> <th align='center'>&nbspModificar&nbsp</th></tr>";

								while ($row = mysqli_fetch_assoc($taulaUsuaris)) {

								 echo "<tr>";
								 echo "<td align='center' >";
								 echo $row['usuari_nom']." ".$row['usuari_cognom'];
								 echo "</td>";

								   echo "<td align='center' >";
									  echo "<form action='gestio_alumnes/borrarAlumne.php' method='POST'> <input type='hidden' value='".$row['usuari_id']."' name='eliminar'> <button class='btn btn-danger' type='submit'>Borrar</button></form> ";
									  echo "</td>";

									  echo "<td align='center' >";
									  echo "<form action='gestio_alumnes/modificarAlumne.php' method='POST'> <input type='hidden' value='".$row['usuari_id']."' name='modificar'> <button class='btn btn-warning' type='submit'>Modificar</button></form>";
									  echo "</td>";
									  echo "</tr>";

							}
							echo "</table>";
						?>
					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<!-- Alta Curs ---------------------------------------------------------------------------------->
		<div class="col-md-5 col-md-offset-1 panel-group">
			<div class="panel panel-default" >
			<button type="button" class="btn btn-info form-control panel-title" data-toggle="collapse" data-target="#Quadrat3">Alta Curs</button>
				<div id="Quadrat3" class="collapse">
					<div class="panel-body">

							<label style="margin-top:10px"for="">Crear nou curs  </label>
							<form action="alta_curs/insertarCurs.php" method="POST">
							  <div class="input-group">
								<span class="input-group-btn">
								  <button class="btn btn-default" type="submit">Insertar nou curs</button>
								</span>
								<input type="text" class="form-control" name="cursIn" placeholder="Any Inicial (aaaa/aaaa)" required>
								<input type="text" class="form-control" name="cursFi" placeholder="Any Final (aaaa/aaaa)" required>
							  </div>
							</form>

					</div>
				</div>
			</div>
		</div>

		<!-- Gestio Curs ---------------------------------------------------------------------------------->
		<div class="col-md-5 col-md-offset-1">
			<div class="panel panel-default" >
			<button type="button" class="btn btn-info form-control panel-title" data-toggle="collapse" data-target="#Quadrat4">Gestio Curs</button>
				<?php
				if(isset($_POST['curs'])){
					echo "<div id='Quadrat4' class='panel-collapse collapse in' >";
				}
				else{
					echo "<div id='Quadrat4' class='panel-collapse collapse' >";
				}
				?>

					<div class="panel-body">

						<?php

						   // $mysqli = mysqli_connect("localhost", "test", "test", "projectx");
							mysqli_query ($mysqli,"SET NAMES 'utf8'");

							$sql="SELECT * FROM curs;";
								//'".$_SESSION['codi']."'
							$result = mysqli_query($mysqli, $sql);
							$rowcount=mysqli_num_rows($result);



							if($rowcount != 0){
							echo "<table class='table-responsive' align='center'>";
							echo "<tr><th align='center'>&nbspCurs&nbsp</th><th align='center'>&nbspModificar&nbsp</th><th align='center'>&nbspEliminar&nbsp</th></tr>";

							while ($row2 = mysqli_fetch_assoc ($result) ) {

								echo "<tr>";
								echo "<td align='center' >";
								echo $row2['anyInici']." / ".$row2['anyFI'];
								echo "</td>";

								echo "<td align='center' >";
								if(isset($_POST['curs'])){
									if ($row2['curs_id']== $_POST['curs']){
										echo "<form action='gestio_curs/editarCurs.php' method='POST'>
										<div class='input-group'>
										<span class='input-group-btn'>
										<button class='btn btn-warning' type='submit'>OK</button>
										</span>
										<input type='text' class='form-control' name='any' placeholder='".$row2['anyInici']."' required>
										<input type='hidden' value='".$row2 ['curs_id']."' name='curs'>

										</div>
										</form>";}
									else{
										echo "<form action='gestioUsuaris.php#Quadrat4' method='POST'><input type='hidden' value='".$row2 ['curs_id']."' name='curs'> <button class='btn btn-warning' type='submit'>Modificar</button></form>";
									}
								}
								else{
									echo "<form action='gestioUsuaris.php#Quadrat4' method='POST'><input type='hidden' value='".$row2 ['curs_id']."' name='curs'> <button class='btn btn-warning' type='submit'>Modificar</button></form>";
								}

								echo "</td>";

								echo "<td align='center' >";
								echo "<form action='gestio_curs/eliminarCurs.php' method='POST'><input type='hidden' value='".$row2 ['curs_id']."' name='curs'> <button class='btn btn-danger' type='submit'>Borrar</button></form>";
								echo "</td>";

								echo "</tr>";

							}

							echo "</table>";
							}

							else {
								echo "No hi han cursos creats";
							}
							?>


					</div>

				</div>
			</div>
		</div>
	</div>


	<div class="row">
		<!-- Alta Grup ---------------------------------------------------------------------------------->
		<div class="col-md-5 col-md-offset-1 panel-group">
			<div class="panel panel-default" >
			<button type="button" class="btn btn-info form-control panel-title" data-toggle="collapse" data-target="#Quadrat5">Alta Grup</button>
				<div id="Quadrat5" class="collapse">
					<div class="panel-body">

							<label style="margin-top:10px"for="">Crear nou grup  </label>

							<form action="alta_grup/insertarGrups.php" method="POST">
							  <div class="input-group">
								<div class="form-grup">
									<label for="Nom">Nom del grup: </label>
									<input type="text" class="form-control" name="grup" placeholder="Nom grup" required>
								</div>
								<div class="form-grup">
								<label for="Slecciona">Seleccionar curs: </label>
								<select name='CodiCurs' class="form-control">
								<?php
									$sql="SELECT * FROM curs;";
										//'".$_SESSION['codi']."'
									$result = mysqli_query($mysqli, $sql);
									while ($fila = mysqli_fetch_assoc($result)){
									echo "<option value='".$fila['curs_id']."'>".$fila['anyInici']."/".$fila['anyFI']."</option>";
									}
								?>
								</select>
								</div>
								<button class="btn btn-default" type="submit">Insertar nou grup</button>
							  </div>
							</form>

					</div>
				</div>
			</div>
		</div>

		<!-- Gestio Grup ---------------------------------------------------------------------------------->
		<div class="col-md-5 col-md-offset-1">
			<div class="panel panel-default" >
			<button type="button" class="btn btn-info form-control panel-title" data-toggle="collapse" data-target="#Quadrat6">Gestio Grups</button>
				<?php
				if(isset($_POST['grup'])){
					echo "<div id='Quadrat6' class='panel-collapse collapse in' >";
				}
				else{
					echo "<div id='Quadrat6' class='panel-collapse collapse' >";
				}
				?>

					<div class="panel-body">

						<?php

					   // $mysqli = mysqli_connect("localhost", "test", "test", "projectx");
						mysqli_query ($mysqli,"SET NAMES 'utf8'");

						$sql="SELECT g.grup_id, g.grup_nom, c.anyInici, c.anyFI FROM grups g, curs c WHERE g.curs_curs_id=c.curs_id;";
							//'".$_SESSION['codi']."'
						$result = mysqli_query($mysqli, $sql);
						$rowcount=mysqli_num_rows($result);



						if($rowcount != 0){
						echo "<table class='table-responsive' align='center' id='taulaGrup'>";
						echo "<tr><th align='center'>&nbspGrup&nbsp</th><th align='center'>&nbspCurs&nbsp</th><th align='center'>&nbspModificar&nbsp</th><th align='center'>&nbspEliminar&nbsp</th></tr>";

						while ($row3 = mysqli_fetch_assoc ($result) ) {

						echo "<tr>";
						echo "<td align='center' >";
						echo $row3['grup_nom'];
						echo "</td>";

						echo "<td align='center' >";
						echo $row3['anyInici']."/".$row3['anyFI'];
						echo "</td>";

						echo "<td align='center' >";
							if(isset($_POST['grup'])){
								if ($row3['grup_id']== $_POST['grup']){
									echo "
									<span class='input-group-btn'>
									<button class='btn btn-warning' type='submit' disabled='disabled'>Modificar</button>
									</span>
									";
								}
								else{
									echo "<form action='gestioUsuaris.php#Quadrat6' method='POST'><input type='hidden' value='".$row3 ['grup_id']."' name='grup'> <button class='btn btn-warning' type='submit'>Modificar</button></form>";
								}
							}
							else{
									echo "<form action='gestioUsuaris.php#Quadrat6' method='POST'><input type='hidden' value='".$row3 ['grup_id']."' name='grup'> <button class='btn btn-warning' type='submit'>Modificar</button></form>";
							}

							echo "</td>";

						  echo "<td align='center' >";
						  echo "<form action='gestio_grup/eliminarGrup.php' method='POST'><input type='hidden' value='".$row3 ['grup_id']."' name='grup'> <button class='btn btn-danger' type='submit'>Borrar</button></form>";
						  echo "</td>";

						  echo "</tr>";
						 if (isset($_POST['grup'])){
						  if ($row3['grup_id']== $_POST['grup']){
							echo "<tr>";
							echo "<form action='gestio_grup/editarGrup.php' method='POST'>";
							echo "<td align='center' >";
							echo "<input type='text' class='form-control' name='nom' placeholder='".$row3['grup_nom']."' required>";
							echo "</td>";
							echo "<td align='center' >";
							echo "<select name='any' class='form-control'>";
								$grup="SELECT * FROM curs;";
									//'".$_SESSION['codi']."'
								$resultado = mysqli_query($mysqli, $grup);
								while ($fila1 = mysqli_fetch_assoc($resultado)){
								echo "<option value='".$fila1['curs_id']."'>".$fila1['anyInici']."/".$fila1['anyFI']."</option>";
								}
							echo "</select>";
							echo "</td>";
							echo "<td align='center' >";
							echo "<button class='btn btn-warning' type='submit'>Canvia</button>";
							echo "</td>";
							echo "<input type='hidden' value='".$row3 ['grup_id']."' name='grup'>";
							echo "</form>";
							echo "</tr>";
						  }

						  }
						}

						echo "</table>";
						}

						else {
							echo "No hi han grups creats";
						}
						?>


					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<!-- Assignacio Usuaris ---------------------------------------------------------------------------------->
		<div class="col-md-5 col-md-offset-1 panel-group">
			<div class="panel panel-default" >
			<button type="button" class="btn btn-info form-control panel-title" data-toggle="collapse" data-target="#Quadrat7">Assignació Usuaris a grups</button>
				<div id="Quadrat7" class="collapse">
					<div class="panel-body">

						<?php

						$taula="SELECT usuari_nom, usuari_cognom, usuari_id, username FROM usuaris WHERE usuari_id NOT IN (SELECT usuari_id FROM usuarigrup)";
						//echo $taula;
						//$taulaUsuaris = mysqli_real_query ($mysqli,$taula);
						$taulaUsuaris = mysqli_query($mysqli,$taula);
						$rowcount=mysqli_num_rows($taulaUsuaris);

							if($rowcount != 0){
							echo "<table class='table-responsive' align='center'>";
							echo "<tr><th align='center'>&nbspAlumne&nbsp</th><th align='center'>&nbspGrup&nbsp</th> <th align='center'>&nbspAssignar&nbsp</th></tr>";

								while ($row = mysqli_fetch_assoc($taulaUsuaris)) {


								//$_SESSION['nom']=$sql;
								echo "<tr>";
								echo "<td align='center' >";
								echo $row['username'];
								echo "</td>";

								echo "<form action='assignacio_alumnes/assignacioFinal.php' method='POST'>";

									echo "<td>";
									$result=('SELECT grup_nom, grup_id FROM grups');
									$result2 = mysqli_query($mysqli,$result);
									echo "<select name=grup>";
									while ($row2 = mysqli_fetch_assoc($result2)) {
											echo "<option value=".$row2['grup_id'].">".$row2['grup_nom']."</option>\n";
									}
									echo "</td>";

									//<form action='assignacioFinal.php' method='POST'>

									echo "<td align='center' >";
									echo "<input type='hidden' value='".$row['usuari_id']."' name='nom'> <button class='btn btn-warning' type='submit'>Assignar</button></form>";
									// echo "<form action='assignacioFinal.php' method='POST'> <input type='hidden' value='".$row['username']."' name='nom'> <button class='btn btn-warning' type='submit'>Assignar</button></form>";
									echo "</td>";
									echo "</tr>";

								}

							echo "</table>";
							}
							else{
								echo "<div class='alert alert-warning alert-dismissable'>
									<strong>Tots els alumnes estan asignats</strong>
								</div>";
							}
						?>

					</div>
				</div>
			</div>
		</div>

		<!-- Alumnes Assignats ---------------------------------------------------------------------------------->
		<div class="col-md-5 col-md-offset-1">
			<div class="panel panel-default" >
			<button type="button" class="btn btn-info form-control panel-title" data-toggle="collapse" data-target="#Quadrat8">Alumnes Assignats</button>
				<div id="Quadrat8" class="collapse">

					<div class="panel-body">

						<?php

						$taula="SELECT u.usuari_id, u.usuari_nom, u.usuari_cognom, u.username, g.grup_nom FROM grups g, usuaris u, usuarigrup ug WHERE u.usuari_id=ug.usuari_id AND g.grup_id=ug.grup_id";
						$taulaUsuaris = mysqli_query($mysqli,$taula);
						$rowcount=mysqli_num_rows($taulaUsuaris);

							if($rowcount != 0){
							echo "<table class='table-responsive' align='center'>";
							echo "<tr><th align='center'>&nbspAlumne&nbsp</th><th align='center'>&nbspGrup&nbsp</th><th align='center'>&nbspBorrar&nbsp</th></tr>";

								while ($row = mysqli_fetch_assoc($taulaUsuaris)) {
								echo "<tr>";
								echo "<td align='center' >";
								echo $row['usuari_nom']." ".$row['usuari_cognom'] ;
								echo "</td>";

								echo "<td align='center' >";
								echo $row['grup_nom'];
								echo "</td>";

								echo "<td align='center' >";
									  echo "<form action='assignacio_alumnes/borrarAlumneGrup.php' method='POST'> <input type='hidden' value='".$row['usuari_id']."' name='eliminar'> <button class='btn btn-danger' type='submit'>Borrar</button></form> ";
									  echo "</td>";




								}

							echo "</table>";
							}
							else {
								echo "<div class='alert alert-warning alert-dismissable'>
										<strong>No hi han alumnes asignats</strong>
								</div>";
							}
						?>

					</div>

				</div>
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

<script src="<?php echo $base; ?>assets/offcanvas/jquery-1.10.2.min.js"></script>
<script src="<?php echo $base; ?>assets/offcanvas/bootstrap.min.js"></script>
<script src="<?php echo $base; ?>assets/offcanvas/jasny-bootstrap.min.js"></script>
<script src="<?php echo $base; ?>assets/js/custom.js"></script>
</body>
</html>
