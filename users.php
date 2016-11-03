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
  <script type="text/javascript" src="js/jquery-latest.min.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
  <link href='http://fonts.googleapis.com/css?family=Julius+Sans+One' rel='stylesheet' type='text/css'>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/navmenu-push.css" rel="stylesheet">
  <title>Gestió grups</title>

</head>

<body>

  <div class="container">
    <div class="jumbotron jumbo-color">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
                  <h3 align= 'center' >Gestió de classes</h3>
        </div>
      </div>
    <div class="row">
      <div class="col-lg-4">
        <label style="margin-top:10px"for="">Creació de noves classes  </label>
        <form action="classinsert.php" method="POST">
          <div class="input-group">
            <span class="input-group-btn">
              <button class="btn btn-default" type="submit">Crea</button>
            </span>
            <input type="text" class="form-control" name="class" placeholder="Nom de la classe ...">
          </div>
        </form>
      </div>
      <div class="col-lg-3"></div>
      <div class="col-sm-5 col-md-5 col-lg-5">
        <h3 align= 'center' >Llistat de classes </h3>
        <?php

       // $mysqli = mysqli_connect("localhost", "test", "test", "projectx");
        mysqli_query ($mysqli,"SET NAMES 'utf8'");

        $sql="SELECT classid,classname,creationdate FROM classes;";
            //'".$_SESSION['codi']."'
        $result = mysqli_query($mysqli, $sql);

        echo "<table class='table-responsive' align='center'>";
        echo "<tr><th align='center'>&nbspClasse&nbsp</th><th align='center'>&nbspData creació&nbsp</th></tr>";

        while ($row2 = mysqli_fetch_assoc ($result) ) {

          echo "<tr>";
          echo "<td align='center' >";
          echo $row2['classname'];
          echo "</td>";

          echo "<td align='center' ></form>";
          echo $row2['creationdate'];
          echo "</td>";

          echo "</tr>";

        }

        echo "</table>";
        ?>
      </div>
      </div>
    </div>
    <div class="jumbotron jumbo-color">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
                  <h3 align= 'center' style="margin-top:1px" >Assignació/edició classes a alumnes</h3>
        </div>
      </div>
    <div class="row">
      <form action="aluclassupdate.php" method="POST">
        <div class="col-lg-3">
          <label style="margin-top:30px">Classe</label>
          <?php
          
          
            mysqli_query ($mysqli,"SET NAMES 'utf8'");
            $sql="SELECT classid, classname FROM classes;";
            $result = mysqli_query($mysqli, $sql);

            if (!$result) {
              die('Invalid query: ' . mysql_error());
            }
            ?>
            <select class="form-control" name="classe">
              <option value=""> Escull una classe </option>
              <?php
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='".$row['classid']."'>".$row['classname']."</option>";
              }
              ?>
            </select>

      </div>
      <div class="col-lg-3">
        <label style="margin-top:30px">Alumnes</label>
        <?php

        mysqli_query ($mysqli,"SET NAMES 'utf8'");
        $sql="SELECT userid, nom, cognom, classe FROM users ;";
        $result = mysqli_query($mysqli, $sql);

        if (!$result) {
          die('Invalid query: ' . mysql_error());
        }
        ?>
        <select class="form-control" name="alumne">
          <option value=""> Escull un/a alumne</option>
          <?php
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='".$row['userid']."'>".$row['nom']."&nbsp".$row['cognom']."</option>";
          }
          ?>
        </select>

      </div>
      <div class="col-md-1 col-lg-1">
        <input style="margin-top:50px" type="submit" class="btn btn-success" value="Assignar" id="" name="submit">
      </div>
    </form>
    <div class="col-lg-5">
      <h3 align= 'center' >Llistat d'alumnes assignats </h3>
      <?php

  
      mysqli_query ($mysqli,"SET NAMES 'utf8'");

      $sql="SELECT u.nom, u.cognom, c.classname FROM users u, classes c WHERE c.classid = u.classe AND u.classe <> 0";
      $result = mysqli_query($mysqli, $sql);

      echo "<table class='table-responsive' align='center' border='1.5' width='250'>";
      echo "<tr><td align='center' style='background-color:#32b4ee;font-size: 16px;'>&nbspNom&nbsp</td><td align='center' style='background-color:#32b4ee;font-size: 16px;'>&nbspCognom&nbsp</td><td align='center' style='background-color:#32b4ee;font-size: 16px;'>&nbspClasse&nbsp</td></tr>";

      while ($row2 = mysqli_fetch_assoc ($result) ) {

        echo "<tr>";
        echo "<td align='center' style='background-color:#fff'>";
        echo $row2['nom'];
        echo "</td>";

        echo "<td align='center' style='background-color:#fff'>";
        echo $row2['cognom'];
        echo "</td>";

        echo "<td align='center' style='background-color:#fff'>";
        echo $row2['classname'];
        echo "</td>";

        
        echo "</form>";
        echo "</td>";

        echo "</tr>";

      }

      echo "</table>";
      ?>
    </div>
  </div>
</div>
<?php
if ($_SESSION['rol']=='alumne'){
  include 'sideAlumne.h';
}elseif ($_SESSION['rol']=='professor'){
  include 'sideProfessor.h';
}
?>
</body>
</html>