<?php
session_start();
	if ($_SESSION['validat'] != true){
		header ('location:index.php');
	} 
?>
