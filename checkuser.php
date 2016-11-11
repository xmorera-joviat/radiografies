?php
session_start();
$_SESSION['user'] = $_POST['username'];
$_SESSION['pass'] = $_POST['pass'];


$enllac =  mysql_connect('localhost', 'marti', 'Marti000$$4');
if (!$enllac) {
    die('NO ES POT CONECTAR: ' . mysql_error());
}

$bd_seleccionada = mysql_select_db('marti', $enllac);

if (!$bd_seleccionada) {
    die ('No es pot usar radio : ' . mysql_error());
        }       


        $query = "SELECT Rol, Validat FROM user WHERE User='".$_SESSION['user']."' AND Contrasenya='".$_SESSION['pass']."';";
        $result = mysql_query($query);
        $fila = mysql_fetch_array($result);
        $_SESSION['rol']= $fila['Rol'];
        if (isset($_SESSION['rol'])){
                if ($fila['Validat'] == 1) {

                                if ($_SESSION['rol'] == 1){
                                        header ('location:iniciA.php');
                                
                                }
                                else if ($_SESSION['rol'] == 0){
                                        header ('location:index.php');
                                }
                                else {
                                        header ('location:iniciP.php');
                                }
                }
                else {
                        include 'menuInici.h';
                        echo "<div class='container'>";
                        echo "<h3 class='text-danger'>ERROR, USUARI NO VALIDAT</h3>";
                        echo "<form action='pujarFitxer.php' method='POST'>";
                        echo "<input type='submit' class='btn btn-success' value='TORNAR ENRERA' name='submit'>";
                        echo "</from>";
                        echo "</div>";
                }
                }
        else {
                header ('location:index.php');
}
mysql_close($enllac);
?>