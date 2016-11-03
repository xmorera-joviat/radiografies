<?php 
include 'connect.h';
?>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	<body>
		<form action='comentarisFi.php' class="form-signin" method="POST">
			<div>
				<div>
					<p>Comentaris:</p>
					<textarea name="Comentari" rows="10" cols="100" required></textarea>
				</div>	
				<div>
					<p>Nota:</p>
					<input type="number" name="Nota" min="0" max="10" required>
				</div>
				<button class="btn btn-md btn-primary btn-block" type="submit" name="NotaAlumne">Finalitzar</button>
			</div>
		</form>
	</body>
</html>