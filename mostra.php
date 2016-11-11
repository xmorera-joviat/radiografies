<?php
include 'session.h';
include 'connect.h';
$target_dir = "imatges/definitives/";

$sql2 = "SELECT codi,ext FROM xray WHERE p1='".$_POST['slider1']."' 
	AND p2='".$_POST['slider2']."' 
	AND p3='".$_POST['slider3']."' 
	AND camleft= '".$_POST['camleft']."'
	AND camcenter= '".$_POST['camcenter']."'
	AND camright= '".$_POST['camright']."'
	AND bucky= '".$_POST['bucky']."'
	AND focus= '".$_POST['focus']."'
	AND loc= '".$_POST['loc']."'
	AND os= '".$_POST['os']."'
	AND centratge= '".$_POST['centratge']."'
	AND posicio= '".$_POST['posicio']."';";

	$result2 = mysqli_query($mysqli,$sql2);
   	//echo $sql2;

   	$row = mysqli_fetch_assoc ($result2);
	$target_file=$target_dir.$row['codi'].".".$row['ext'];
   	echo $target_file;
   	
	mysqli_close($mysqli);
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
	  	<title>Pujar imatge</title>
	  	<script type="text/javascript">
    		function updateTextInput(val) {
     		document.getElementById('points').value=val;

    		}
  </script>
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
		<img class="img-responsive" src="<?php echo $$target_file; ?>" style="width: 480px; height: 320px; align:center">
		
       
       <div style="text-align:center; margin-top: 30px;">  
      		<form action='practica.php' method='POST'>
				<input type="submit" class="btn btn-success" value="Enrere" name="submit">
			</form>
		</div>

		</div>
	</body>
</html>