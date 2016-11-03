<?php
$level = 2;
include 'connect.h';
include 'session.h';

if (isset($_GET['zona'])){
    $zona = $_GET['zona'];
    $os = $_GET['os'];
}
else {
    $zona = 11;
    $os = 26;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="css/b3/ninja-slider.css" rel="stylesheet" />
    <script src="js/b3/ninja-slider.js"></script>
    <link href="css/b3/thumbnail-slider.css" rel="stylesheet" type="text/css" />
    <script src="js/b3/thumbnail-slider.js" type="text/javascript"></script>
    <style>
        body {font: normal 0.9em Arial;color:#222;}
        header {display:block; font-size:1.2em;margin-bottom:100px;}
        header a, header span {
            display: inline-block;
            padding: 4px 8px;
            margin-right: 10px;
            border: 2px solid #000;
            background: #DDD;
            color: #000;
            text-decoration: none;
            text-align: center;
            height: 20px;
        }
        header span {background:white;}
        a {color: #1155CC;}
    </style>
</head>
<body>
<div style="width:1000px;margin:80px;">
    <div id="ninja-slider" style="float:left;">
    <!--             slider-inner es el carrousel amb la foto gran
    --> <div class="slider-inner" id="slider-inner">
            <ul>

                <?php 
                
                    $sql="SELECT codi,ext FROM xray WHERE zona = $zona AND os = $os;";
                    $result = mysqli_query($mysqli, $sql);
                    
                    if (!$result) {
                        die('Invalid query: ' . mysql_error());
                    }
                    echo $sql;
                    while($row = mysqli_fetch_array($result)) {

                        echo "<li><a class='ns-img' href='imatges/definitives/"
                        .$row['codi'].".".$row['ext']."'></a></li>";
                    }
                ?>
            </ul>   

          <!--     slider-inner s'omple amb l'ajax   -->  


                
            <!-- <div class="fs-icon" title="Expand/Close"></div> -->
        </div>
    </div>
<!--         slider vertical amb les miniatures
--> <div id="thumbnail-slider" style="float:left;">
        <div class="inner" id="inner">
            <ul>
                <?php
                    $sql="SELECT codi,ext FROM xray WHERE zona = $zona AND os = $os;";
                    $result = mysqli_query($mysqli, $sql);
                    echo $sql;

                    if (!$result) {
                        die('Invalid query: ' . mysql_error());
                    }
                    while($row = mysqli_fetch_array($result)) {
                        
                        echo "<li><a class='thumb' href='imatges/definitives/"
                        .$row['codi'].".".$row['ext']."'></a></li>";
                    }
                ?>
            </ul>    

    <!--     slider inner s'omple amb l'ajax   -->  

        </div>
    </div>
<!-- <div style="clear:both;"></div> -->
</div>
</body>