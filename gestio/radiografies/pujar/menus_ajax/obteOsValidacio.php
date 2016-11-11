<?php
$base="../../../../";
include $base.'includes/connect.h';

$zona=intval($_GET['zona']);
$id=intval($_GET['id']);
mysqli_query ($mysqli,"SET NAMES 'utf8'");

$sql="SELECT os_id, os_nom FROM os WHERE zona_id='$zona'";
$result = mysqli_query($mysqli, $sql);
if (!$result) {
	die('Invalid query: ' . mysql_error());
}

$sql2="SELECT p1,p2,p3,camleft,camcenter,camright,bucky,focus,zona,os,centratge_centratge_id,posicio_posicio_id FROM xray WHERE codi|'.'|ext = '$id'";
$result2 = mysqli_query($mysqli, $sql2);

	if (!$result2) {
		printf("Errormessage: %s\n", mysqli_error($mysqli));
	}
$row2 = mysqli_fetch_array($result2);

$sql4 ="SELECT os_nom FROM os WHERE os_id = '".$row2['os']."';";
$result4 = mysqli_query($mysqli, $sql4);
	if (!$result4) {
		die('Invalid query: os' . mysqli_errno($mysqli));
	}
$row4 = mysqli_fetch_array($result4);
?>
<select name="os" class="form-control" id="os" onmouseover="getPosicio2(this.value,<?echo $id;?>)">
<?php

$i=0;
    while ($row = mysqli_fetch_assoc($result)) {
	     if ($i==0){
	          echo "<option value='".$row2['os']."' selected >".$row4['os_nom']."</option>";
	          $i=1;
	     } else if($row2['os']!==$row['os_id']){
	          echo "<option value='".$row['os_id']."'>".$row['os_nom']."</option>";
	     }
	}
?>
</select>

        