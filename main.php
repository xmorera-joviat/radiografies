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
    <div class="col-xs-6">
      <a href="alumnemain.php" class="btn btn-primary btn-lg active btn-block"><span class="glyphicon glyphicon-plus"></span> Vista Alumne</a>
    </div>
    <div class="col-xs-6"> 
      <a href="professormain.php" class="btn btn-success btn-lg active btn-block"><span class="glyphicon glyphicon-pencil"></span>Vista Professor</a>
    </div>
  </div>
  
</div> 


</body>
</html>