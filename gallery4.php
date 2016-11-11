<?php
$level = 2;
include 'connect.h';
include 'session.h';


?>
<html>
<head>

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <script src="js/custom.js" type="text/javascript"></script>
    <script language="JavaScript">
        

    </script>

</head>
<body>
            <!--/Galeria-->
<?php 
    if (isset($_GET['zona']) && isset($_GET['os'])){
        $zona= $_GET['zona'];
        $os=$_GET['os'];
        
        if ($_GET['zona']==999){
            $sql="SELECT codi,ext FROM xray;";
        } elseif ($_GET['zona']!=999 && $_GET['os']== 999){
            $sql="SELECT codi,ext FROM xray WHERE zona = $zona;";
        } else {
            $sql="SELECT codi,ext FROM xray WHERE zona = $zona AND os = $os;";
        }
    }
    $result = mysqli_query($mysqli, $sql);
    
    if (!$result) {
        die('Invalid query: ' . mysql_error());
    }
    $i=0;
    while($row = mysqli_fetch_array($result)) {
        if ($i%5==0) {
            echo "<div class='row'>";

        }
        echo "<label class='imatge'>";
        echo "<input id='imgrad' type='radio' name='imgrad' value='".$row['codi']."'/>";
        echo "<img src=imatges/definitives/".$row['codi'].".".$row['ext']." title='".$row['codi']."' onclick='validar2()' style='height:220px; width:220px; object-fit:contain; position:relative'>";
        echo "</label>";
        $i++;
        // if ($i%3==0){
        //     echo "<div class='row' style='margin-top:10px'>";
        // }
        // echo "<div class='image'>";
        // echo "<img src=imatges/definitives/".$row['codi'].".".$row['ext']." style='height:220px; width:220px; object-fit:contain; position:relative'>";
        // echo "</div>";
        // $i++;
        // if ($i%3==0){
        //     echo "</div>";
        // }
        
    }

?>
</body>
</html>