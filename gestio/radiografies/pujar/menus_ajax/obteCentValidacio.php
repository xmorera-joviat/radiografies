<?php
$base="../../../../";
include $base.'includes/connect.h';

$osId=intval($_GET['os']);
$id=intval($_GET['id']);
mysqli_query ($mysqli,"SET NAMES 'utf8'");

$sql="SELECT centratge_id, centratge_nom FROM centratge WHERE os_id ='$osId'";
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

$sql5 ="SELECT centratge_nom FROM centratge WHERE centratge_id = '".$row2['centratge_centratge_id']."';";
$result5 = mysqli_query($mysqli, $sql5);
	if (!$result5) {
		die('Invalid query: cent' . mysqli_errno($mysqli));
	}
$row5 = mysqli_fetch_array($result5);

?>
<select name="centratge" class="form-control" id="cent">
	<?php
	$i=0;
		while ($row = mysqli_fetch_assoc($result)) {
			if ($i==0){
                echo "<option value='".$row2['centratge_centratge_id']."' selected >".$row5['centratge_nom']."</option>";
				$i=1;
			} else {
				echo "<option value='".$row['centratge_id']."'>".$row['centratge_nom']."</option>";
			}
		}
	?>
</select>