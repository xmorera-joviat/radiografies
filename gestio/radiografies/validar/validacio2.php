<?php
include 'session.h';
include 'connect.h';
include 'recorrevalida.h';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <script type="text/javascript" src="js/jquery-latest.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <title>Panell de control</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/navmenu-push.css" rel="stylesheet">

  </head>

  <body>
    <div style="text-align:center"> 
    <form action="update_radios.php" method="POST" enctype="multipart/form-data">

  <div class="container">

    <div class="row" style="margin-top:25px" >

      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

        <img class="img-responsive" src="<?php echo $_SESSION['filetreb']; ?>" style="width: 480px; height: 320px; align:center">

      </div>
      <div class="col-xs-6 col-sm-5 col-md-5 col-lg-5">

        <!-- Primera barra slider -->
        <div class="row">
          <div class="col-xs-10 col-sm-10 col-md-11 col-lg-11">
            <input type="range" name="slider1" min="0" max="150" value="<?php echo $row2['p1'] ?>" id="fader1" step="2" oninput="outputUpdate1(value)">
          </div>
          <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1">
            <label for="fader">kW</label><output for="fader" id="slider1"><?php echo $row2['p1'] ?></output> 
          </div>
        </div>

        <!-- Segona barra slider -->

        <div class="row">
          <div class="col-xs-10 col-sm-10 col-md-11 col-lg-11">
            <input type="range" name="slider2" min="0" max="150" value="<?php echo $row2['p2'] ?>" id="fader2" step="2" oninput="outputUpdate2(value)">
          </div>
          <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1">
            <label for="fader">mA</label><output for="fader" id="slider2"><?php echo $row2['p2'] ?></output> 
          </div>
        </div>

        <!-- Tercera barra slider 3 -->

        <div class="row">
          <div class="col-xs-10 col-sm-10 col-md-11 col-lg-11">
            <input type="range" name="slider3" min="0" max="1" value="<?php echo $row2['p3'] ?>" id="fader3" step="0.25" oninput="outputUpdate3(value)">
          </div>
          <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1">
            <label for="fader">Temps</label><output for="fader" id="slider3"><?php echo $row2['p3'] ?></output> 
          </div>
        </div>

        <!-- cuarta barra slider -->   

        <div class="row">
          <div class="col-xs-10 col-sm-10 col-md-11 col-lg-11">
            <input type="range" disabled name="slider4" min="0" max="150" value="<?php echo $row2['p4'] ?>" id="fader4" step="2" oninput="outputUpdate4(value)">
          </div>
          <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1">
            <label for="fader">mAs</label><output for="fader" id="slider4"></output> 
          </div>
        </div>
      <!-- sliders Fi -->

    </div>
  </div>
    <div class="row">
      <div class="col-xs-5 col-sm-5 col-md-4 col-lg-4">

        <div class="btn-group-1" role="group" aria-label="...">
          <label> Càmeres </label>
          <label class="class btn1 btn-success active">
            <img src="imatges/www/1.png" width="60" />
            <input type="hidden" name="camleft" value="0">
            <input type="checkbox" autocomplete="off" name="camleft" id="camleft" value="1">
          </label>
          <label class="class btn1 btn-success active">
            <img src="imatges/www/2.png" width="60" />
            <input type="hidden" name="camcenter" value="0">
            <input type="checkbox" autocomplete="off" name="camcenter" id="camcenter" value="1">  
          </label>
          <label class="class btn1 btn-success active">
            <img src="imatges/www/3.png" width="60" />
            <input type="hidden" name="camright" value="0">
            <input type="checkbox" autocomplete="off" name="camright" id="camright" value="1">  
          </label>
          <script>
          if (<?php echo $row2['camleft'] ?> == 1){
          document.getElementById('camleft').checked = true;
          }
          if (<?php echo $row2['camcenter'] ?> == 1){
          document.getElementById('camcenter').checked = true;
          }
          if (<?php echo $row2['camright'] ?> == 1){
          document.getElementById('camright').checked = true;
          }
          </script>
        </div>
        <div class="btn-group-2" role="group" aria-label="...">
          <label> Bucky </label>
          <label class="class btn1 btn-success active">
            <!--<img src="imatges/www/taula.png" id="change" onclick="changeImage(this)" width="60" /> -->
            <img src="imatges/www/taula.png" width="60" />
            <input type="radio" name="bucky" value="taula" id="taula">
          </label>
          <label class="class btn1 btn-success active">
            <!-- <img src="imatges/www/mural-1.png" id="change" onclick="changeImage2(this)" width="60" /> -->
            <img src="imatges/www/mural-1.png" width="60" />
            <input type="radio" name="bucky" value="mural" id="mural">  
          </label>
          <label class="class btn1 btn-success active">
            <!-- <img src="imatges/www/directe.png" id="change" onclick="changeImage3(this)" width="60" /> -->
            <img src="imatges/www/directe.png" width="60" />
            <input type="radio" name="bucky" value="directe" id="directe">
          </label>
            <script>
            if ("<?php echo $row2['bucky'] ?>"=="taula"){
            document.getElementById('taula').checked = true;
            }else if ("<?php echo $row2['bucky'] ?>"=="mural"){
            document.getElementById('mural').checked = true;
            }else{
            document.getElementById('directe').checked = true;
            }
            </script>
        </div>
        <div class="btn-group-3" role="group" aria-label="...">
          <label> Focus </label>
          <label class="class btn1 btn-success active">
            <img src="imatges/www/fi.png" width="60" />
            <input type="radio" name="focus" id="focusfi" value="fi">
          </label>
          <label class="class btn1 btn-success active">
            <img src="imatges/www/gruixut.png" width="60" />
            <input type="radio" name="focus" id="focusgruixut" value="gruixut"> 
          </label>
          <script>
          if ("<?php echo $row2['focus'] ?>"=="gruixut"){
          document.getElementById('focusgruixut').checked = true;
          }else {
          document.getElementById('focusfi').checked = true;  
          }
          </script>
        </div>

      </div>
      <div class="col-xs-4 col-sm-4 col-md-5 col-lg-5">

        <div class="form-group has-feedback col-md-6 col-lg-6">
          <?php

          mysqli_query ($mysqli,"SET NAMES 'utf8'");
          $sql="SELECT * FROM zona;";
          $result = mysqli_query($mysqli, $sql);

          if (!$result) {
            die('Invalid query: ' . mysql_error());
          }
          ?>
          <label style="margin-top:30px">Zona</label>
          <select class="form-control" name="zona">>
            
            <?php
            $i=0;
            while ($row = mysqli_fetch_assoc($result)) {
              if ($i==0){
                  echo "<option value='".$row2['zona_id']."' selected >".$row3['zona_nom']."</option>";
                  $i=1;
                } else {
                  echo "<option value='".$row['zona_id']."'>".$row['zona_nom']."</option>";
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
                  echo "<option value='".$row2['os']."' selected >".$row4['os_nom']."</option>";
                  $i=1;
                } else if($row2['os']!==$row['os_id']){
                  echo "<option value='".$row['os_id']."'>".$row['os_nom']."</option>";
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
                  echo "<option value='".$row2['centratge_centratge_id']."' selected >".$row5['centratge_nom']."</option>";
                  $i=1;
                } else if($row2['centratge_centratge_id']!==$row['centratge_id']){
                  echo "<option value='".$row['centratge_id']."'>".$row['centratge_nom']."</option>";
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
                  echo "<option value='".$row2['posicio_posicio_id']."' selected >".$row6['posicio_nom']."</option>";
                  $i=1;
                } else if($row2['posicio_posicio_id']!==$row['posicio_id']){
                  echo "<option value='".$row['posicio_id']."'>".$row['posicio_nom']."</option>";
                }
            }
            ?>
            </select>
          </div>
          <div class="col-xs-1 col-sm-1 col-md-4 col-lg-4">
          </div>
        </div>
      </div>
    </div>
    <div class="row" style="margin-top:5px">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"></div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <input type="submit" class="btn btn-success" value="Validar" name="submit">
        <a class="btn btn-danger" href="delete.php" id="" role="button">Eliminar</a>

      </div>
    </div>
    <?php include 'sideProfessor.h'; ?>
  </body>
</html>
