<?php
$base="../../../../";
include $base.'includes/connect.h';
$osId=intval($_GET['os']);
mysqli_query ($mysqli,"SET NAMES 'utf8'");
$sql="SELECT posicio_id, posicio_nom FROM posicio WHERE os_id='$osId'";
$result = mysqli_query($mysqli, $sql);
if (!$result) {
	die('Invalid query: ' . mysql_error());
}

?>
<select name="posicio" class="form-control" onChange="getCentratge(<?php echo $osId?>)" id="posicio">
	<option>Selecciona una posició</option>
	<?php

		while ($row = mysqli_fetch_assoc($result)) {
			echo "<option value='".$row['posicio_id']."'>".$row['posicio_nom']."</option>";
		}
	?>
</select>
