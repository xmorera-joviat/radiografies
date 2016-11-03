<?php
$level = 2;
include 'connect.h';
include 'session.h';
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="css/b3/bootstrap.min.css" rel="stylesheet" />
</head>

<script>
            //funció que retorna l'objecte xml http
        function getXMLHTTP() {
            var xmlhttp=false;  
            try{
                xmlhttp=new XMLHttpRequest();
            }
            catch(e){       
                try{            
                    xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
                }
                catch(e){
                    try{
                    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                    }
                    catch(e1){
                        xmlhttp=false;
                    }
                }
            }   
            return xmlhttp;
        }
        
        function getOs(zonaId) {        
            
            var strURL="obteOs.php?zona="+zonaId;
            var req = getXMLHTTP();
            
            if (req) {
                
                req.onreadystatechange = function() {
                    if (req.readyState == 4) {
                        // only if "OK"
                        if (req.status == 200) {                        
                            document.getElementById('osdiv').innerHTML=req.responseText;                        
                        } else {
                            alert("Problem while using XMLHTTP:\n" + req.statusText);
                        }
                    }               
                }          
                req.open("GET", strURL, true);
                req.send(null);
            }       
        }
</script>
<body>
    <form id="pregunta_params" action="lowerframe_pregunta.php" method="POST" enctype="multipart/form-data">
        <div class="btn-group" style="margin-top:10px">
    	    <div class="col-sm-3 col-md-3 col-3">
    	        <select class="form-control" name="zona" onChange="getOs(this.value)" id="zona" style="margin-bottom:10px">
    	            <?php
    	            mysqli_query ($mysqli,"SET NAMES 'utf8'");
    	            $sql="SELECT * FROM zona";
    	            $result = mysqli_query($mysqli, $sql);
    	            while ($row = mysqli_fetch_assoc($result)) {
    	                echo "<option value='".$row['zona_id']."'>".$row['zona_nom']."</option>";
    	            }
    	            ?>
    	        </select>
    	    </div>

    	    <!--             Combo de l'os           -->

    	    <div class="col-sm-3 col-md-3 col-3" >
    	        <div id="osdiv">
    	            <select class="form-control" name="os" onChange="getImatges(this.value,document.getElementById('zona').value);" id="os" style="margin-bottom:10px">
    	                <option>Selecciona un os</option>
    	            </select>
    	        </div>
    	    </div>
    	    <input type="submit" class="btn btn-success" value="Mostra Imatges" id="preg_img">
    	
    <!--            Combo de l'os           -->
        </div>
    </form>
</body>
</html>

<!--   topframe_pregunta.php  -->