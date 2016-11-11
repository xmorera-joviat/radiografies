<?php
session_start();
include './includes/connect.h';

  if(isset($_POST['login'])){
    
    $user = strip_tags($_POST['user']);
    $pass = strip_tags($_POST['pass']);
    
    $sql="SELECT * FROM usuaris WHERE username='".$user."' AND userpass='".$pass."';";
    $result = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_assoc($result);
    $rowcount=mysqli_num_rows($result);

    //echo $sql;
    $project="/projectx";
    $_SESSION['basepath']=$_SERVER['HTTP_HOST'].$project;
    if ($rowcount==0){
      header("location:index.php");
    } else {
      $_SESSION['userid']= $row['usuari_id'];
      $_SESSION['rol']= $row['tipususuari_rol_id'];
      $_SESSION['validat']= true;
        if ($_SESSION['rol']==1){
          header("location:main.php");
        }elseif ($_SESSION['rol']==2){
          header("location:professormain.php");
        }elseif ($_SESSION['rol']==3){
          header("location:alumnemain.php");
        }elseif ($_SESSION['rol']==4){
          header("location:alumnemain.php");
        }

      }

  }
  else {
    header("location:index.php");
  }
?>