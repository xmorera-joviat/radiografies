<?php
include 'session.h';
include 'connect.h';
?>
<!DOCTYPE html>
<html>
<head>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/navmenu-push.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

  	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="">
    <script type="text/javascript" src="js/jquery-latest.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <title>Panell de control</title>




    <title>Alta Lliço | Alta Tema</title>
</head>
<body>
<?php include 'sideProfessor.h'; ?>

<style type="text/css">
	.form-inline .form-group { margin-right:10px; }
	.well-primary {
	color: rgb(255, 255, 255);
	background-color: rgb(66, 139, 202);
	border-color: rgb(53, 126, 189);
	}
	.glyphicon { margin-right:5px; }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><i class="fa fa-plus" aria-hidden="true"></i>
                            </span>Editar Anomalia</a>
                        </h4>
                    </div>
                     <form action="ModificaAnomalia.php" method="POST">
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">







                                    <div class="form-group">
                                        <p>Selecciona una Anomalia</p>
                                     <select class='form-control' name="codian"> >
        <?php
          $query = "SELECT codian,noman FROM `anomalia`";
              $result = mysqli_query($mysqli, $query);
              
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<option value=".$row['codian'].">".$row['noman']."</option>";
                
            }
        ?>

      </select>




       <input name="nomAn" type="text" class="form-control" placeholder="Nou Nom de la Anomalia" required />
                                        <br>

                                         <input name="descripcio" type="text" class="form-control" placeholder="Nova Descripció" />
                                    </div>
        
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div>
                                        <form class="form form-inline " role="form" >
                                        <div class="form-group">
                                              <input name="submit" class="btn btn-md btn-primary" type="submit" value="Send" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</form>


                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><i class="fa fa-plus" aria-hidden="true"></i>
                            </span>Editar Tipus de Lliço</a>
                        </h4>
                    </div>
                    
                     <form action="ModificarTipusde.php" method="POST">
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
    
                                    <div class="form-group">
                                    <p>Selecciona el nom de la Lliço</p>





                                <select class='form-control' name="idLlico"> >
        <?php
          $query = "SELECT llico_id,llico_nom FROM `llico`";
              $result = mysqli_query($mysqli, $query);
              
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<option value=".$row['llico_id'].">".$row['llico_nom']."</option>";
                
            }
        ?>

      </select>
               <br>



          <p>Selecciona el nom de tipus de Lliço</p>

                                       <select class='form-control' name="tipusLlico"> 
        <?php
          $query = "SELECT tipusllico_id,tipusllico_nom FROM `tipusllico`";
              $result = mysqli_query($mysqli, $query);
              
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<option value=".$row['tipusllico_id'].">".$row['tipusllico_nom']."</option>";
                
            }
        ?>

      </select>

        <input name="nomLesson" type="text" class="form-control" placeholder="Nou Nom de Tipus de Lliço" required />

                     
   
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div>
                                                    
                                        <div class="form-group">
  
                                              <input name="submit" class="btn btn-md btn-primary" type="submit" value="Send" />
                                        </div>
                                        </form>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

 <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"> <i class="fa fa-plus" aria-hidden="true"></i>
                            </span>Editar Rols</a>
                        </h4>
                    </div>
                    
                     <form action="ModificaRol.php" method="POST">
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
    
                                    <div class="form-group">
                                        <input name="nomRol" type="text" class="form-control" placeholder="Quin Nom tindrá el Rol?"  />
                                    

                                 
                                    </div>
                            
   
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div>
                                         <select class='form-control' name="idRol"> 
                                             <?php
          $query = "SELECT rol_id,rol_nom FROM tipususuari";
              $result = mysqli_query($mysqli, $query);
              
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<option value=".$row['rol_id'].">".$row['rol_nom']."</option>";

                
            }
        ?>
                     </select>                
                                        <div class="form-group">
  <br>
                                              <input name="submit" class="btn btn-md btn-primary" type="submit" value="Send" />
                                        </div>
                                        </form>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>
</div>











    











</body>
</html>
