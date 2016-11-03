<?php
$base ="../../../";
include $base.'includes/session.h';
include $base.'includes/connect.h';

$dir1 = $base."assets/imatges/temp/";
$dir2 = $base."assets/imatges/definitives/";

if ($_POST['bucky'] == "mural") {
	if (isset($_POST['camleft'])){
		$camleft = $_POST['camleft'];
	} else {
		$camleft = 0;
	}

	if (isset($_POST['camcenter'])){
		$camcenter = $_POST['camcenter'];
	} else {
		$camcenter = 0;
	}

	if (isset($_POST['camright'])){
		$camright = $_POST['camright'];
	} else {
		$camright = 0;
	}
}else{
	$camleft = 0;
	$camcenter = 0;
	$camright = 0;
}

	$sql="INSERT INTO xray(p1,p2,p3,camleft,camcenter,camright,bucky,focus,zona,os,centratge_centratge_id,posicio_posicio_id,userid,ext,data) VALUES ('";
		$sql= $sql . $_POST['slider1'];
		$sql= $sql . "','";
		
		$sql= $sql . $_POST['slider2'];
		$sql= $sql . "','";
		
		$sql= $sql . $_POST['slider3'];
		$sql= $sql . "','";

		$sql= $sql . $camleft;
		$sql= $sql . "','";

		$sql= $sql . $camcenter;
		$sql= $sql . "','";

		$sql= $sql . $camright;
		$sql= $sql . "','";

		$sql= $sql . $_POST['bucky'];
		$sql= $sql . "','";

		$sql= $sql . $_POST['focus'];
		$sql= $sql . "','";

		$sql= $sql . $_POST['zona'];
		$sql= $sql . "','";

		$sql= $sql . $_POST['os'];
		$sql= $sql . "','";

		$sql= $sql . $_POST['centratge'];
		$sql= $sql . "','";

		$sql= $sql . $_POST['posicio'];
		$sql= $sql . "','";

		$sql= $sql . $_SESSION['userid'];
		$sql= $sql . "','";

		$sql= $sql . $_SESSION['exten']."',now()";
		$sql= $sql . ")";

	//echo $sql;

$result = mysqli_real_query($mysqli,$sql);
if (!$result){
	die ('Consulta invalida:' . mysql_error());
}


$sql2 = "SELECT codi,ext FROM xray WHERE p1='".$_POST['slider1']."' AND p2='".$_POST['slider2']."' AND p3='".$_POST['slider3']."' AND bucky='".$_POST['bucky']."' AND focus='".$_POST['focus']."' AND zona='".$_POST['zona']."' AND os='".$_POST['os']."' AND centratge_centratge_id='".$_POST['centratge']."' AND posicio_posicio_id='".$_POST['posicio']."';";
//echo $sql2;

$result2 = mysqli_query($mysqli,$sql2);
$row = mysqli_fetch_array($result2);



$_SESSION['uploadedfile']=$dir2.$row['codi'].".".$_SESSION['exten'];
$_SESSION['codi']=$row['codi'];


mysqli_close($mysqli);
rename ($_SESSION['filetreb'], $_SESSION['uploadedfile']);

if (file_exists($_SESSION['uploadedfile'])) {
	//echo "WWWWW";
	header('Location:anomalies/anomalia.php');
		//echo "Ben fet! Imatge pujada al servidor";
		//echo "La foto ". basename( $_FILES["uploadImage"]["name"]). " s'ha pujat correctament.";
} else {
	echo "Ho sento, hi ha hagut un error al pujar la imatge.".'<br />';
}

?>

<html>
<head>
	<link rel="stylesheet" href="<?echo $base;?>assets/css/bootstrap.min.css">
</head>
<body>

	<div style="text-align:center">  
		<form action='anomalies/anomalia.php' method='POST'>
			<input type="submit" class="btn btn-success" value="Enrere" name="submit">
		</form>
	</div> 

</body>
</html>
