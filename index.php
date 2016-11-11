<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Autenticació</title>

    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link href="./assets/css/signin.css" rel="stylesheet">
    <style>
      body {
        background-image: url("./assets/imatges/www/background1.jpg");
        background-position: 50% 42%;
      }
</style>
  </head>

  <body>

    <div class="container">

      <form action='login.php' class="form-signin" method="POST">
        <h2 class="form-signin-heading">Autenticació</h2>
        <input name="user" type="text" class="form-control" placeholder="Nom d'usuari" required autofocus>
        <input name="pass" type="password" class="form-control" placeholder="Contrasenya" required>
        <button class="btn btn-md btn-primary btn-block" type="submit" name="login">Entrar</button>
      </form>

    </div> <!-- /container -->
  </body>
</html>