<?php 
include 'session.h';
include 'connect.h';
?>
<head>
  <title>Activitat Avaluable</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="srylesheet" src="css/form.css">
</head>

<?php
  echo "<form action='fantasma_resposta.php' method='POST'>";
  //$pregunta = $_POST['id_pregunta'];
  //echo $_POST['id_pregunta'];
  //echo $pregunta;
  //echo "hola";
//echo $_POST['id_resposta'];


  echo "<input type='hidden' name='id_resposta' value=".$_POST['id_resposta'].">";

  echo "<input type='hidden' name='id_pregunta' value=".$_POST['id_pregunta'].">";
?>

  <div class="container">
    <legend>PARAMETRES RADIOGRAFIA</legend>



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
       
        </div>

    </div>

   
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
                    <input type="submit" class="btn btn-primary" value="Finalitzar Examen" name="submit">
            </div>
            <br>
          
     </div>
</form>


<link rel="stylesheet" href="CronoDoc/prova.css">

  <div class="container">
    <link rel="stylesheet" href="CronoDoc/prova.css">
      <div class="timer-group">
        <div class="timer hour">
          <div class="hand"><span></span></div>
          <div class="hand"><span></span></div>
        </div>
        <div class="timer minute">
          <div class="hand"><span></span></div>
          <div class="hand"><span></span></div>
        </div>
        <div class="timer second">
          <div class="hand"><span></span></div>
          <div class="hand"><span></span></div>
        </div>
        <div class="face">
          <h2>A CSS Chronograph</h2>
          <p id="lazy">00:00:00</p>  
        </div>
        <script src="CronoDoc/prova.js"></script>
      </div>
    </link>
  </div>
</link>