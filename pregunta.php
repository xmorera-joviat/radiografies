<?php
include 'session.h';
include 'connect.h';

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="tema/css/style.css">

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

<p>&nbsp</p>
<div class="container">
  <div class="row" style="margin-top:100px">
  
  </div>
    <form action="pujaPregunta.php" method='POST'>
     <textarea rows="4" cols="50" name="anunciat" placeholder="Escriu l'enunciat de la pregunta" class="message" required></textarea>

    <input name="percentatge" placeholder="Percentatge " class="name" required />

    

<br>
<p> Id de la llico </p>
   

   
      <select name="idLlico">
        
        <?php
          $query = "SELECT llico_id FROM llico ";
              $result = mysqli_query($mysqli, $query);
              
            
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<option value=".$row['llico_id'].">".$row['llico_id']."</option>";
                
            }
        ?>

      </select>
      <br>
      <br>
<input name="ordre" placeholder="Ordre de la pregunta " class="name" required />
<br>
<br>

<p> Codi de Radiografia </p>
   

   
      <select name="codiXray">
        
        <?php
          $query = "SELECT codi FROM xray ";
              $result = mysqli_query($mysqli, $query);
              
            
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<option value=".$row['codi'].">".$row['codi']."</option>";
                
            }
        ?>

      </select>
    <!--textarea rows="4" cols="50" name="subject" placeholder="Please enter your message" class="message" required></textarea-->
    <input name="submit" class="btn" type="submit" value="Enviar" />
  
</div> 


</body>
</html>