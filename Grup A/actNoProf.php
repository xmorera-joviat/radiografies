<?php 
//include 'session.h';
include 'connect.h';

	//$query_avis = "SELECT r.preguntes_preguntes_id, p.llico_llico_id  FROM avis a, respostes r, preguntes p  WHERE a.user_id = r.usuaris_usuari_id AND p.preguntes_id = r.preguntes_preguntes_id  AND a.avis = 1";

	//$result_avis = mysqli_query($mysqli, $query_avis);

	//$row_avis = mysqli_fetch_array($result_avis, MYSQLI_NUM);
  $prova = $_POST['preguntes_id'];
 // echo $prova;
	 
 // echo $_POST['preguntes_id'];
 // echo $_POST['llico_id'];

  //CHAPUZA PER PROVAR QUE FUNCIONI LA RESTA DE COSES <-------------------------------------------------------------
	// Select per trobar l'enunciat de la pregunta
	$query_enunciat = "SELECT anunciat FROM preguntes WHERE  preguntes_id = 1";
	//$query_enunciat = $query_enunciat.$_POST['preguntes_id'];
 // echo $query_enunciat;
	// Select per trobar el nom de la lliçó.
	$query_llico = "SELECT llico_nom FROM llico WHERE llico_id = 1";
	//$query_llico = $query_llico.$_POST['llico_id'];
 // echo $query_llico;


	
	$result_enunciat = mysqli_query($mysqli, $query_enunciat);
	$result_llico = mysqli_query($mysqli, $query_llico);

	$row_enunciat = mysqli_fetch_array($result_enunciat, MYSQLI_NUM);
	$row_llico = mysqli_fetch_array($result_llico, MYSQLI_NUM);
	

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Activitat Amb Professor</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
	<body>
		<div class="container">
		<h2>Activitat Avaluable</h2>
			  <p>Llegeix l'anunciat i clica a començar per fer l'activitat.</p>

			<div class="col-sm-8 col-md-8">
			  <!-- Cuadre del enunciat de la pregutna -->
			  
			    <div class="panel panel-primary">
				  <div class="panel-heading">Lliçó: <?php echo $row_llico[0]; ?></div>
				  <div class="panel-body"><?php echo $row_enunciat[0]; ?></div>
				  <input type="hidden" name="pregunta" id="id_pregunta" value="$row_avis[0]">
				  <input type="hidden" name="resposta_id" value="$_POST['resposta_id']">
				</div>
			    
			  
			</div>
		</div>

<form role="form" action="compare.php" method="GET">

	<?php
    //CHAPUZA 2 <--------------------------------------------------------------------------------------------------------------------
		$query_xray = "SELECT xray_codi FROM preguntes WHERE preguntes_id=1";
		$result_xray = mysqli_query($mysqli, $query_xray);
		$row_xray = mysqli_fetch_array($result_xray, MYSQLI_NUM);
	

  echo "<input type='hidden' name='id_xray' value=".$row_xray[0].">";

  echo "<input type='hidden' name='id_pregunta' id='id_pregunta' value=".$_POST['preguntes_id'].">";
?>
  <div class="container">
    <legend>PARAMETRES RADOGIRAFIA</legend>



    <script type="text/javascript">
    $(document).ready(function()
    {
      $('#KW').change(function() {
        $('#valorKW').val($(this).val());
      });
    });
    </script>

    <label for="Kw">Kilovoltatge:</label><br>
    <input type="range" name="KW" id="KW" min="0" max="150" step="2" value="74" >
    <br>
    <input type="text" name="valorKW" id="valorKW" disabled value="74">
    <br>
    <br>



    <script type="text/javascript">
    $(document).ready(function()
    {
      $('#mA').change(function() {
        $('#valormA').val($(this).val());
      });
    });
    </script>
    <label for="mA">Miliamperatge:</label><br>
    <input type="range" name="mA" id="mA" min="0" max="150" step="2" value="74">
    <br>
    <input type="text" name="valormA" id="valormA" disabled value="74">
    <br>
    <br>


    <script type="text/javascript">
    $(document).ready(function()
    {
      $('#mAs').change(function() {
        $('#valormAs').val($(this).val());
      });
    });
    </script>
    <label for="mAs">Temps</label><br>
    <input type="range" name="mAs" id="mAs" min="0.25" max="1" step="0.05" value="0.50">
    <br>
    <input type="text" name="valormAs" id="valormAs" disabled value="0,50">
    <br><br><br><br>



    <div class="well well-sm text-center">


      <h3>CAMARA</h3>

      <div class="btn-group">

        <label class="btn btn-success">
          <input type="checkbox" name="camaraEsquerra" id="camaraEsquerra" autocomplete="off">
          <span class="glyphicon glyphicon-ok"></span><img src="css/img/camaraEsquerra.png" alt="">
        </label>

        <label class="btn btn-success">
          <input type="checkbox" name="camaraMig" id="camaraMig" autocomplete="off">
          <span class="glyphicon glyphicon-ok"></span><img src="css/img/camaraMig.png" alt="">
        </label>

        <label class="btn btn-success">
          <input type="checkbox" name="camaraDreta" id="camaraDreta" autocomplete="off">
          <span class="glyphicon glyphicon-ok"></span><img src="css/img/camaraDreta.png" alt="">
        </label>
      </div>

      <h3>BUKY</h3>

      <div class="btn-group" role="group" data-toggle="buttons">
        <label class="btn btn-success active btn-radio" >
          <input type="radio" name="buky" id="taula" value="taula">
          <span class="glyphicon glyphicon-ok"></span><img src="css/img/taula.png" alt="">
        </label>

        <label class="btn btn-success active btn-radio">
          <input type="radio" name="buky" id="moral" value="moral">
          <span class="glyphicon glyphicon-ok"></span><img src="css/img/moral.png" alt="">
        </label>

        <label class="btn btn-success active btn-radio">
          <input type="radio" name="buky" id="directe" value="directe">
          <span class="glyphicon glyphicon-ok"></span><img src="css/img/directe.png" alt="">
        </label>    
      </div>

      <h3>FOCUS</h3>

      <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-success btn-radio2">
          <input type="radio" name="focus" id="fi" value="fi">
          <span class="glyphicon glyphicon-ok"></span><img src="css/img/fi.png" alt="">
        </label>

        <label class="btn btn-success btn-radio2">
          <input type="radio" name="focus" id="gruixut" value="gruixut">
          <span class="glyphicon glyphicon-ok"></span><img src="css/img/gruixut.png" alt="">
        </label>    
      </div>

      <br><br><br><br>  
    </div>



    <div class='row'>
        <div class="col-sm-4">
              <?php
              //Fem el connect a la base de dades
                
              ?>
        </div>
    </div>

    <div class='row'>

      <div class="col-sm-3">

          <?php
                  //realizem el select per el combo d'os
              $sql = "SELECT * FROM zona ORDER BY zona_nom;";
              $resultat  = mysqli_query($mysqli, $sql);
              if (!$resultat) {
                echo "Error de BD, no s'ha pogut consultar a la base de dades\n";
                echo "Error MySQL: " . mysql_error();
                exit;
              }
                  //fem el combo de os amb els valors de la base de dades
              echo "<div class='form-group'>";  
              echo "<label for='Zona'>Zona:</label>";
              echo "<select class='form-control ' id='Zona' name='Zona'>";
              while ($combo = mysqli_fetch_array($resultat, MYSQLI_ASSOC)) {
                echo "<option value='".$combo['zona_id']."'>". $combo['zona_nom'] ."</option>";
              }
              echo "</select>";
              echo "</div>";
          ?>
        </div>


        <div class="col-sm-3">

          <?php
                  //realizem el select per el combo d'os
              $sql = "SELECT * FROM os ORDER BY os_nom;";
              $resultat  = mysqli_query($mysqli, $sql);
              if (!$resultat) {
                echo "Error de BD, no s'ha pogut consultar a la base de dades\n";
                echo "Error MySQL: " . mysql_error();
                exit;
              }
                  //fem el combo de os amb els valors de la base de dades
              echo "<div class='form-group'>";  
              echo "<label for='Os'>Ossos:</label>";
              echo "<select class='form-control ' id='Os' name='Os'>";
              while ($combo = mysqli_fetch_array($resultat, MYSQLI_ASSOC)) {
                echo "<option value='".$combo['os_id']."'>". $combo['os_nom'] ."</option>";
              }
              echo "</select>";
              echo "</div>";
          ?>
        </div>
    




    
      <div class="col-sm-3">
            <?php
                        //realizem el select per el combo d'centratge
                    $sql = "SELECT * FROM centratge ORDER BY centratge_nom;";
                    $resultat  = mysqli_query($mysqli, $sql);

                    if (!$resultat) {
                      echo "Error de BD, no s'ha pogut consultar a la base de dades\n";
                      echo "Error MySQL: " . mysql_error();
                      exit;
                    }
                         //fem el combo de centratge amb els valors de la base de dades
                    echo "<div class='form-group'>";
                    echo "<label for='Centratge'>Centratge:</label>";
                    echo "<select class='form-control ' id='Centratge' name='Centratge'>";
                    while ($combo = mysqli_fetch_array($resultat,  MYSQLI_ASSOC)) {
                      echo "<option value='".$combo['centratge_id']."'>".$combo['centratge_nom']."</option>";
                    }
                    echo "</select>";
                    echo "</div>";
            ?>
      </div>



      <div class="col-sm-3">
                <?php
                            //realizem el select per el combo d'posicio
                        $sql = "SELECT * FROM posicio ORDER BY posicio_nom;";
                        $resultat  =mysqli_query($mysqli, $sql);

                        if (!$resultat) {
                          echo "Error de BD, no s'ha pogut consultar a la base de dades\n";
                          echo "Error MySQL: " . mysql_error();
                          exit;
                        }
                             //fem el combo de posicio amb els valors de la base de dades  
                        echo "<div class='form-group'>";
                        echo "<label for='Posicio'>Posició:</label>";
                        echo "<select class='form-control ' id='Posicio' name='Posicio'>";
                        while ($combo = mysqli_fetch_array($resultat,  MYSQLI_ASSOC)) {
                          echo "<option value='".$combo['posicio_id']."'>".$combo['posicio_nom']."</option>";
                        }
                        echo "</select>";
                        echo "</div>";
                ?>
      </div>
    </div>


            <div class="form-group">
                    <br>
                    <input type="submit" class="btn btn-primary" value="Finalitzar Activitat" name="submit">
            </div>
            <br>
          
     </div>



	</body>
</html>