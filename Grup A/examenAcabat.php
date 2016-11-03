<?php include 'connect.h'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">

		div{
			background-color: #0bc44c;
			width: 50%;
		    padding: 25px;
		    border: 6px solid green;
		    color: white;
		    margin: 25px;
		    font-family: Arial;
		    border-radius: 10px;
		    vertical-align: middle;
		}

	</style>
</head>
<body>
<script>
function recarga(){
location.href=location.href
}
setInterval('recarga()',20000)
</script>
	<?php  

		$query = "SELECT * FROM avis WHERE avis=1";/*sesion k nos pasa el profesor*/
        $result = mysqli_query($mysqli, $query);
        //echo $query;
        //echo $result;

        $row = mysqli_fetch_assoc($result);  
       // echo $row['avis'];

        if (!$row){
        	header ("Location:actAlumne.php");
        }
        else {

        }

	?>

	<br><br><br><br><br>
	<center>
		<div>
			<h2 style="font-size:50px">Has acabat l'examen!</h2>
			<p>Ja pots tornar al teu lloc, deixa la tablet al professor.</p>
			
		</div>
	</center>

</body>
</html>