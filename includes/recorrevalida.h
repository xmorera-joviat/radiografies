<?php
	$dir = "imatges/definitives/";
	//$mysqli = mysqli_connect("localhost", "raul", "Raul101$&", "projectx");

	//pregunto quines radiografies NO estan validades
	$sql="SELECT codi,ext FROM xray WHERE validada = 'no';";
		$result = mysqli_query($mysqli, $sql);
		if (!$result) {
			die('Invalid query: ' . mysql_error());
		}
	$radiografies = array();
	while($row = mysqli_fetch_array($result)) {
	    //deso dins l'array radiografies els resultats
	    $radiografies[] = $row['codi'].".".$row['ext'];   
	}

	//$pic = array_shift($radiografies);
	if (count($radiografies) > 0) {
		//em quedo amb la primera "array[0]"
		$_SESSION['filetreb'] = $dir.$radiografies[0];
		
		$_SESSION['codirad'] = pathinfo($_SESSION['filetreb'], PATHINFO_FILENAME);

		// $_SESSION['radid']=substr($radiografies[0],0,1);
		$_SESSION['radid']=$radiografies[0];

		$sql2="SELECT p1,p2,p3,camleft,camcenter,camright,bucky,focus,zona,os,centratge_centratge_id,posicio_posicio_id FROM xray WHERE codi|'.'|ext = '".$radiografies[0]."'";
		$result2 = mysqli_query($mysqli, $sql2);
		
			if (!$result2) {
				printf("Errormessage: %s\n", mysqli_error($mysqli));
			}
		$row2 = mysqli_fetch_array($result2);


		$sql3 ="SELECT zona_nom FROM zona WHERE zona_id = '".$row2['zona']."';";
		$result3 = mysqli_query($mysqli, $sql3);
			if (!$result3) {
				die('Invalid query: loc' . mysqli_errno($mysqli));
			}
		$row3 = mysqli_fetch_array($result3);


		$sql4 ="SELECT os_nom FROM os WHERE os_id = '".$row2['os']."';";
		$result4 = mysqli_query($mysqli, $sql4);
			if (!$result4) {
				die('Invalid query: os' . mysqli_errno($mysqli));
			}
		$row4 = mysqli_fetch_array($result4);

		$sql5 ="SELECT centratge_nom FROM centratge WHERE centratge_id = '".$row2['centratge_centratge_id']."';";
		$result5 = mysqli_query($mysqli, $sql5);
			if (!$result5) {
				die('Invalid query: cent' . mysqli_errno($mysqli));
			}
		$row5 = mysqli_fetch_array($result5);


		$sql6 ="SELECT posicio_nom FROM posicio WHERE posicio_id = '".$row2['posicio_posicio_id']."';";
		$result6 = mysqli_query($mysqli, $sql6);
			if (!$result6) {
				die('Invalid query: pos' . mysqli_errno($mysqli));
			}
		$row6 = mysqli_fetch_array($result6);

 	}else {
		header('Location:respervalidar.php');
	}