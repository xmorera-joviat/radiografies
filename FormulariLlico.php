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
    <form action="pujaLlico.php" method='POST'>
    <input name="nomLlico" placeholder="Nom de la Lliço" class="name" required />
    <input name="percentatge" placeholder="Perecentatge " class="name" required />

<br>
<p> Id del tema </p>
   

   
      <select name="idTema">
        
        <?php
          $query = "SELECT tema_id FROM tema ";
              $result = mysqli_query($mysqli, $query);
              
            
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<option value=".$row['tema_id'].">".$row['tema_id']."</option>";
                
            }
        ?>

      </select>


    <!--textarea rows="4" cols="50" name="subject" placeholder="Please enter your message" class="message" required></textarea-->
    <input name="submit" class="btn" type="submit" value="Send" />
  
</div> 


</body>
</html>