<?php
$level = 2;
include 'session.h';
$pic = $_GET['img'];

?>
<html>
<head>
</head>
<body>
       
<?php 
	
	echo "<img src=imatges/definitives/".$pic." style='height:360px; width:360px; object-fit:contain; position:relative'>";
	echo $pic;

?>
</body>
</html>