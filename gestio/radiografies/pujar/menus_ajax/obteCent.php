<?php
$base="../../../../";
include $base.'includes/connect.h';

$osId=intval($_GET['os']);
mysqli_query ($mysqli,"SET NAMES 'utf8'");
$sql="SELECT centratge_id, centratge_nom FROM centratge WHERE os_id='$osId'";
$result = mysqli_query($mysqli, $sql);
if (!$result) {
	die('Invalid query: ' . mysql_error());
}

?>
<select name="centratge" class="form-control" id="cent" onmouseout="validar()">
	<option>Selecciona un centratge</option>
	<?php

		while ($row = mysqli_fetch_assoc($result)) {

			echo "<option value='".$row['centratge_id']."'>".$row['centratge_nom']."</option>";

		}
	?>
</select>