<?php 
//include 'session.h';
include 'connect.h';

$query_comp = "SELECT x.kw, x.ma, x.mas, x.camleft, x.camcenter, x.camright, x.bucky, x.focus, x.zona, x.os, x.posicio_posicio_id, x.centratge_centratge_id FROM xray x, preguntes p WHERE  x.codi = p.xray_codi AND p.preguntes_id =".$_POST['preguntes_id'];

$result_comp = mysqli_query($mysqli, $query_comp);
$row_comp = mysqli_fetch_array($result_comp, MYSQLI_NUM);

$nota = 0;
echo $_POST['preguntes_id'];

if (row_comp[0] == $_POST['kw']){

  $nota++;
}

if (row_comp[1] == $_POST['ma']){

  $nota++;
}

if (row_comp[2] == $_POST['mas']){

  $nota++;
}

if (row_comp[3] == $_POST['camleft']){

  $nota++;
}

if (row_comp[4] == $_POST['camcenter']){

  $nota++;
}

if (row_comp[5] == $_POST['camright']){

  $nota++;
}

if (row_comp[6] == $_POST['bucky']){

  $nota++;
}

if (row_comp[7] == $_POST['focus']){

  $nota++;
}

if (row_comp[8] == $_POST['Zona']){

  $nota++;
}

if (row_comp[9] == $_POST['Os']){

  $nota++;
}

if (row_comp[10] == $_POST['Posicio']){

  $nota++;
}

if (row_comp[11] == $_POST['Centratge']){

  $nota++;
}
  echo $nota;
?>