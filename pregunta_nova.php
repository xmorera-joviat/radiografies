<?php
$level = 2;
include 'session.h';
include 'connect.h';


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <script type="text/javascript" src="js/jquery-latest.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <title>Panell de control</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/navmenu-push.css" rel="stylesheet">
    
    <script language="JavaScript">
        // function changeUrl() {
        //     var site = "";
        //     document.getElementsByName('centerifrm')[0].src = site;
        // }
        function setVisibility(div, visibility) {
        document.getElementById(div).style.display = visibility;
        }
        function getIframeContent(){
            var myIFrame = document.getElementById('ifrm');
            var myIFDoc  = myIFrame.contentWindow.document;
            var myRadios = myIFDoc.getElementsByName("imgrad");

            var checkedItemValue = "";
            for(var i=0; i<myRadios.length; i++) {
                if (myRadios[i].checked) {
                    checkedItemValue = myRadios[i].value;
                }
            }
            if (checkedItemValue) {
                //alert(checkedItemValue);
            } else {
                alert('Selecciona una radiografia');
            }
            document.getElementById('radiografia').value=checkedItemValue;
        }

    </script>
</head>

<body >

<div class="container" id="galeria_preguntes">
    <div class="row">

                <!--            Iframe central         -->
        <!-- <div class="col-sm-7 col-md-7 col-lg-7">
            <div class="iframe-div-center" name="centeriframe">
                <iframe src="" name="centifrm" id="centifrm" frameborder="0"></iframe>
            </div>
        </div> -->
                <!--           FI Iframe central         -->


                <!--            Iframe esquerra         -->
        <div class="col-sm-9 col-md-9 col-lg-9">
            <div class="iframe-div-side" name="sideiframe">
                <iframe src="" name="sideifrm" id="ifrm" frameborder="0" onload="setVisibility('iframe', 'none');";></iframe>
            </div>
        </div>
                <!--           FI Iframe esquerra         -->


                <!--             Combo zona           -->
        <div class="col-sm-3 col-md-3 col-lg-3">
            <div class="row">
                <form class="form-inline" id="pregunta_params" action="gallery4.php" target="sideifrm" method="GET">
                    <div class="btn-group" style="margin-top:5px">
                        <label for="">1. Tria una radiografia</label>
                            <select class="form-control" name="zona" onChange="getOs2(this.value);validar3()" id="zona" style="margin-top:10px">
                                <?php
                                mysqli_query ($mysqli,"SET NAMES 'utf8'");
                                $sql="SELECT * FROM zona";
                                $result = mysqli_query($mysqli, $sql);
                                $i=0;
                                while ($row = mysqli_fetch_assoc($result)) {
                    
                                        echo "<option value='".$row['zona_id']."'>".$row['zona_nom']."</option>";

                                    }?>
                            </select>
                    </div>
                    <!--           FI  Combo zona           -->

                    <!--             Combo de l'os           -->
                        <div id="osdiv" style="margin-top:10px">
                            <select class="form-control" name="os" id="os" >
                                <option>Tria un os</option>
                            </select>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Mostra Imatges" id="sub3" style="margin-top:10px" disabled>

                </form>
            </div>
                <!--           FI Combo de l'os           -->
            <div class="row">
                <form action="newquestion.php" method="POST">
                    <label for="" style="margin-top:10px">2. Redacta l'anunciat</label>
                    <textarea class="form-control input-lg" id="anunciat" name="anunciat" type="text" rows="15" onclick="getIframeContent()" ></textarea>
                    <input class="form-control input-sm hidden" id="radiografia" name="radiografia" type="text">
                    
                    <?php

                    mysqli_query ($mysqli,"SET NAMES 'utf8'");
                    $sql="SELECT llico_nom,llico_id FROM llico;";
                    $result = mysqli_query($mysqli, $sql);

                    if (!$result) {
                        die('Invalid query: ' . mysql_error());
                    }
                    ?>
                    <label style="margin-top:10px">Lliçó</label>
                    <select class="form-control" name="llico" id="llico">>
                        
                        <?php
                        $i=0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($i==0){
                                    echo "<option value='".$row['llico_id']."' selected >".$row['llico_nom']."</option>";
                                    $i=1;
                                } else {
                                    echo "<option value='".$row['llico_id']."'>".$row['llico_nom']."</option>";
                                }
                        }
                        ?>
                        </select>



                    <label for="sub2" style="float: left; margin-top:27px;margin-right:5px">3.</label>
                    <input type="submit" class="btn btn-success" value="Crear pregunta" style="margin-top:20px" id="sub2">
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'sideProfessor.h'; ?>
    
        
</body>
</html>