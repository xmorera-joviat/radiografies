<html>

	<head>
		<title>Resum Notes</title>
		
	</head>
	<body>
		<h1 align='center'>Resum Notes</h1>
		
		
		
		<br>
<?php

//include 'session.h';
include 'connect.h';
	

	
	$sql = "SELECT u.usuari_nom, u.usuari_cognom, p.preguntes_id, r.nota, l.llico_nom , t.tema_nom FROM respostes r, usuaris u, preguntes p, llico l, tema t WHERE r.usuaris_usuari_id = u.usuari_id AND r.preguntes_preguntes_id = p.preguntes_id AND p.llico_llico_id = l.llico_id AND l.tema_tema_id = t.tema_id";
	$resultat = mysqli_query($mysqli,$sql);
	
	
	if (!$resultat) {
		echo "Error de BD, no s'ha pogut consultar a la base de dades\n";
		echo "Error MySQL: " . mysql_error();
		exit;
	}

	echo "<table border=1 width=50% CELLSPACING=0 CELLPADDING=1 class='llista' align='center'>";
	echo "<tr>";
	echo "<td class='titol' align='center'><b>"."Nom Alumne"."</b></td>";
	echo "<td class='titol' align='center'><b>"."Cognom"."</b></td>";
	echo "<td class='titol' align='center'><b>"."Pregunta"."</b></td>";
	echo "<td class='titol' align='center'><b>"."Nota"."</b></td>";
	echo "<td class='titol' align='center'><b>"."Lliço"."</b></td>";
	echo "<td class='titol' align='center'><b>"."Tema"."</b></td>";
	echo "<tr>";
	$a = 0;
	while ($fila = mysqli_fetch_array($resultat)) {
		$a++;
		
			echo "<tr>";
			echo "<td class='cela' align='center'>".$fila['usuari_nom']."</td>";
			echo "<td class='cela' align='center'>".$fila['usuari_cognom']."</td>";
			echo "<td class='cela' align='center'>".$fila['preguntes_id']."</td>";
			echo "<td class='cela' align='center'>".$fila['nota']."</td>";
			echo "<td class='cela' align='center'>".$fila['llico_nom']."</td>";
			echo "<td class='cela' align='center'>".$fila['tema_nom']."</td>";
			echo "</tr>";
	}
	
	
?>
		</table>
		<br>
		<form action="notes_pdf.php" method="POST" align="center">
		 
		  <input type="submit" value="Descarregar PDF">
		  
		</form>
		
	</body>
</html>