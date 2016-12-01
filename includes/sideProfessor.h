      <div class="navmenu navmenu-default navmenu-fixed-left offcanvas">
  
      <a class="navmenu-brand" href="#">Control Panel Professor</a>

      <ul class="nav navmenu-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gestió radiografies<b class="caret"></b></a>
          <ul class="dropdown-menu navmenu-nav">
            <li><a href="http://<?php echo $_SESSION['basepath'];?>/gestio/radiografies/pujar/pujaAjax.php">Pujar nova radiografia</a></li>
            <li><a href="http://<?php echo $_SESSION['basepath'];?>/gestio/radiografies/validar/validacio.php">Validar radiografia</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="http://<?php echo $_SESSION['basepath'];?>/gestio/usuaris/gestioUsuaris.php">Gestió Alumnes</a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gestió Lliçons (en construcció)<b class="caret"></b></a>
          <ul class="dropdown-menu navmenu-nav">
            <li><a href="tema/pujarTema.html">Nou Tema</a></li>
            <li><a href="tema/pujaLlico.php">Nova Lliçó</a></li>
            <li><a href="pregunta_nova.php">Nova Pregunta</a></li>
            <li><a href="http://<?php echo $_SESSION['basepath'];?>/gestio/lliçons/assignacions/temagrup.php">Assignació tema-grup</a></li>
            <li><a href="http://<?php echo $_SESSION['basepath'];?>/gestio/lliçons/assignacions/llicogrup.php">Assignació lliçó-grup</a></li>
            <li class="divider"></li>
            <li><a href="#">Activar Lliçó</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navmenu-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Llistats (en construcció)<b class="caret"></b></a>
          <ul class="dropdown-menu navmenu-nav">
            <li><a href="#">Per alumne</a></li>
            <li><a href="#">Per curs</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navmenu-nav">
        <li><a href="">Vista Exàmen (en construcció)</a></li>
      </ul>
      <ul class="nav navmenu-nav">
        <li><a href="logout.php">Desconectar</a></li>
      </ul>
    </div>

    <div class="navbar navbar-default navbar-fixed-top">
      <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu" data-canvas="body">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div> 

