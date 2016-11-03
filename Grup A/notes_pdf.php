<?php
	require_once 'dompdf/dompdf_config.inc.php';
	
//include 'session.h';
include 'connect.h';	

	$codihtml='
		
		<html>
		
		

			<head>
				<title>Resum Notes</title>
				
			</head>
			<body>
				<h1 align="center">Resum Notes</h1>
				
				
				<table align="center" border=1 width=80% CELLSPACING=0 CELLPADDING=1 class="llista">
					<tr>
					<td align="center"><b>Nom Alumne</b></td>
					<td align="center"><b>Cognom</b></td>
					<td align="center"><b>Pregunta</b></td>
					<td align="center"><b>Nota</b></td>
					<td align="center"><b>Llico</b></td>
					<td align="center"><b>Tema</b></td>
					</tr>
	';

		$sql = "SELECT u.usuari_nom, u.usuari_cognom, p.preguntes_id, r.nota, l.llico_nom , t.tema_nom FROM respostes r, usuaris u, preguntes p, llico l, tema t WHERE r.usuaris_usuari_id = u.usuari_id AND r.preguntes_preguntes_id = p.preguntes_id AND p.llico_llico_id = l.llico_id AND l.tema_tema_id = t.tema_id";
		$resultat = mysqli_query($mysqli,$sql);
	
		
		if (!$resultat) {
			echo "Error de BD, no s'ha pogut consultar a la base de dades\n";
			echo "Error MySQL: " . mysql_error();
			exit;
		}
		
		while ($fila = mysqli_fetch_array($resultat)) {
	
	$codihtml.='
			
				<tr>
				<td align="center">'.$fila['usuari_nom'].'</td>
				<td align="center">'.$fila['usuari_cognom'].' </td>
				<td align="center">'.$fila['preguntes_id'].' </td>
				<td align="center">'.$fila['nota'].' </td>				
				<td align="center">'.$fila['llico_nom'].' </td>
				<td align="center">'.$fila['tema_nom'].' </td>
				</tr>
				
	';
		 }
		
	$codihtml.='
			
			</table>
			
			
		</body>
	</html> 
	
	';

	


//$codihtml=utf8_decode($codihtml);
$dompdf = new Dompdf();
$dompdf->load_html($codihtml, 'UTF-8');
$dompdf ->set_paper("A4", "portrait");
$dompdf->render(); 
$dompdf->stream("ResumNotes.pdf"); 

?>