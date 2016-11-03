<?php include 'connect.h'; 
session_start();
$idUsuari = $_SESSION['userid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="scripts/jquery.js"></script>

<style>
#WindowLoad
{
    position:fixed;
    top:0px;
    left:0px;
    z-index:3200;
    filter:alpha(opacity=65);   
   -moz-opacity:65;   
    opacity:0.65;
    background:#1E90FF;
}

#loading {
	 width: 60px;
    height: 60px;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ventana Cargando</title>
</head>
<script>
function recarga(){
location.href=location.href
}
setInterval('recarga()',20000)
</script>
<body>

<?php

    $bloc = 0;
    $desbloc =0;

        $query = "SELECT avis FROM avis WHERE usuari_id =";/*sesion k nos pasa el profesor*/
        $query = $query.$idUsuari;
        $result = mysqli_query($mysqli, $query);
        //echo $result;

        $row = mysqli_fetch_assoc($result);  
        if ($row['avis'] == 1) {

            $bloc = 1;
        }
        else {
            $bloc = 0;
            header ('location:alumnemain.php');
        }
        
        //echo $row['avis'];
    
    
    

?>
     
       
    <script type="text/javascript">
         
    </script>

<!-- <input value="Abrir Div que Bloquea Pantalla" type="button" onclick="jsShowWindowLoad('Examen')" />
Write your comments here -->

</body>

<script>
  
  var bloc = <?php echo $bloc; ?>;

    if (bloc == 1) {
        jsShowWindowLoad('examen');
    }
    else if (bloc == 0) {
        jsRemoveWindowLoad();
    }


function jsRemoveWindowLoad() {
	// eliminamos el div que bloquea pantalla
    $("#WindowLoad").remove();

}

function jsShowWindowLoad(mensaje) {
	//eliminamos si existe un div ya bloqueando
    //jsRemoveWindowLoad();
   
    //si no enviamos mensaje se pondra este por defecto
    if (mensaje === undefined) mensaje = "Procesando la información<br>Espere por favor";
   
    //centrar imagen gif
    height = 20;//El div del titulo, para que se vea mas arriba (H)
    var ancho = 0;
    var alto = 0;
	
	//obtenemos el ancho y alto de la ventana de nuestro navegador, compatible con todos los navegadores
    if (window.innerWidth == undefined) ancho = window.screen.width;
    else ancho = window.innerWidth;
    if (window.innerHeight == undefined) alto = window.screen.height;
    else alto = window.innerHeight;
    
	//operación necesaria para centrar el div que muestra el mensaje
    var heightdivsito = alto/2 - parseInt(height)/2;//Se utiliza en el margen superior, para centrar
	
   //imagen que aparece mientras nuestro div es mostrado y da apariencia de cargando
    imgCentro = "<div style='text-align:center;height:" + alto + "px;'><div  style='color:#000;margin-top:" + heightdivsito + "px; font-size:20px;font-weight:bold'>" + mensaje + "</div><img id='loading' src='loader.gif'></div>";

        //creamos el div que bloquea grande------------------------------------------
        div = document.createElement("div");
        div.id = "WindowLoad"
        div.style.width = ancho + "px";
        div.style.height = alto + "px";
        $("body").append(div);

        //creamos un input text para que el foco se plasme en este y el usuario no pueda escribir en nada de atras
        input = document.createElement("input");
        input.id = "focusInput";
        input.type = "text"

		//asignamos el div que bloquea
        $("#WindowLoad").append(input);
        
		//asignamos el foco y ocultamos el input text 
        $("#focusInput").focus();
        $("#focusInput").hide();
		
		//centramos el div del texto
        $("#WindowLoad").html(imgCentro);
       
}
</script>
</html>