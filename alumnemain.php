<?php
include 'session.h';


?>
<!DOCTYPE html>
<html>
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
	<?php 
        if ($_SESSION['rol']==3){
            include 'sideAlumne.h';
        }elseif ($_SESSION['rol']==4){
            include 'sideBeta.h';
        }

    ?>
	


	
	

</body>
</html>