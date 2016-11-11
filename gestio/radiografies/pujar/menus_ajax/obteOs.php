<?php
$base="../../../../";
include $base.'includes/connect.h';
$zona=intval($_GET['zona']);
mysqli_query ($mysqli,"SET NAMES 'utf8'");
$sql="SELECT os_id, os_nom FROM os WHERE zona_id='$zona'";
$result = mysqli_query($mysqli, $sql);
if (!$result) {
	die('Invalid query: ' . mysql_error());
}
?>
<select name="os" class="form-control" onChange="getPosicio(this.value)" id="os">
	<option>Selecciona un os</option>
	<?php
		
		while ($row = mysqli_fetch_assoc($result)) {			
			echo "<option value='".$row['os_id']."'>".$row['os_nom']."</option>";
			
		}	
	?>
</select>
