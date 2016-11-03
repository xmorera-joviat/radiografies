<?php
$base="../../../../";
include $base.'includes/connect.h';

$osId=intval($_GET['os']);
$id=intval($_GET['id']);
mysqli_query ($mysqli,"SET NAMES 'utf8'");

$sql="SELECT posicio_id, posicio_nom FROM posicio WHERE os_id='$osId'";
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

$sql6 ="SELECT posicio_nom FROM posicio WHERE posicio_id = '".$row2['posicio_posicio_id']."'";
$result6 = mysqli_query($mysqli, $sql6);
	if (!$result6) {
		die('Invalid query: pos' . mysqli_errno($mysqli));
	}
$row6 = mysqli_fetch_array($result6);

?>
<select name="posicio" class="form-control" onmouseover="getCentratge2(document.getElementById('os').value,'<? echo $id;?>')" id="posicio">
	<?php
	$i=0;
		while ($row = mysqli_fetch_assoc($result)) {
			if ($i==0){
				echo "<option value='".$row2['posicio_posicio_id']."' selected >".$row6['posicio_nom']."</option>";
				$i=1;
			} else {
				echo "<option value='".$row['posicio_id']."'>".$row['posicio_nom']."</option>";
			}
		}
	?>
</select>
