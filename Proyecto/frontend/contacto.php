<?php

?>
<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../backend/web/css/materialize.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="../backend/web/estilo.css"  media="screen,projection"/>
      <!--Iconos w3-->
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <!-- Add icon library -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>NOTICIAS</title>
      <link rel="icon" href="imagenes/logo.png">
          <style>
    .row .col.m11 {
    width: 91.6666666667%;
    margin-left: auto;
    left: auto;
    margin: 30px;
    right: auto;
}

          .fa {
        display: inline-table;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: 24px;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        }
        /*Texto rojo cuando pasas el mouse*/
                a.ex1:hover, a.ex1:active {color: red;}
                
        /*Tabla de perfil/cerrar sesion*/
        .dropdown-content li {
            color: white;
            text-align: center;
        }
        .dropdown-content li>a, .dropdown-content li>span {
            color: white;
        }
        .dropdown-content li>a>i {
          height: inherit;
            line-height: inherit;
            float: left;
            margin: 0 0px 0px 20px;
        }
        .card-panel {
    border-radius: 14px;
    border-bottom: 7px solid red;
      }
      td{
        padding: 15px 0px;
        padding-left: 35px;
      }
      .fon{
        background-color:red;
      }
      .card-image {
  background-repeat: no-repeat;
  background-position: 50% 50%;
  background-size: cover;
  width:auto;
}
.card .card-image img {
margin: 0 0;
}
.rojo{
  background-image: url('imagenes/suarez.png');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: contain;
}
.row {
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 0px;
    padding-top: 60px;
    padding-left: 120px;
}
button, [type=button], [type=reset], [type=submit] {
    -webkit-appearance: button;
    /* right: 10px; */
    left: 83px;
}


        
</style>
</head>
<body class="rojo">
  <!--++++++ Nav bar ++++++-->
  <nav>
      <div class="nav-wrapper blue darken-5">
          <a href="index.php" class="brand-logo center"><b>Club Nacional de Football</b></a>
          <a href="index.php"><img src="imagenes/logo.png"></a>
              <ul class="right hide-on-med-and-down">
                  <li><a href="index.php" class="tooltipped" data-position="bottom" data-tooltip="Inicio"><i class="material-icons">home</i></a></li>
                  <li><a href="noticias.php" class="tooltipped" data-position="bottom" data-tooltip="Noticias"><i class="material-icons">language</i></a></li>
                  <li><a href="deportistas.php" class="tooltipped" data-position="bottom" data-tooltip="Deportistas"><i class="material-icons">people</i></a></li>
                  <li><a href="contacto.php" class="tooltipped" data-position="bottom" data-tooltip="Contacto" ><i class="material-icons">call</i></a></li>
                  <!--Menu para cerrar sesion -->
                    <li>
                      <a class='dropdown-trigger' href='#' data-target='dropdown1'>
                        <i class="material-icons">menu</i>
                      </a>						
                      <ul id='dropdown1' class='dropdown-content blue darken-6'>
                        <li>
                        <?=$_SESSION['usuario']?>	
                      </li>
                      <li class="divider" tabindex="-1"></li>
                      <li>
                        <a href="#!">
                          <i class="material-icons">person</i>Perfil
                      </a>
                    </li>
                      <li>
                        <a href="login.php">
                          <i class="material-icons">exit_to_app</i>Salir
                      </a>
                    </li>
              </ul>
      </div>
  </nav>
<div class="container blue darken-5"></div>
<!--Formulario de contacto-->
  <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s6">
         <i class="material-icons prefix grey-text text-darken-2">face</i>
          <input id="icon_face" type="text" class="validate" required="required">
          <label for="icon_face">Nombre</label>
        </div>
        <div class="input-field col s6">
         <i class="material-icons prefix grey-text text-darken-2">email</i>
          <input id="icon_email" type="email" class="validate" required="required">
          <label for="icon_email" data-error="Write your email again please!" data-success="OK, you're good!">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
         <i class="material-icons prefix grey-text text-darken-2">assignment</i>
          <input id="icon_subject" type="text" class="validate" required="required">
          <label for="icon_subject">Asunto</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
         <i class="material-icons prefix grey-text text-darken-2">create</i>
          <textarea id="icon_message" class="materialize-textarea" required="required"></textarea>
          <label for="icon_message">Mensaje</label>
        </div>
      </div>
      <br>
      <div class="container center">
      <button class="btn waves-effect waves-light blue darken-5" type="submit" name="action">Enviar
     <i class="material-icons right">send</i>
     </button>
      </div>
    </form>
  </div>
  <main></main>
  <!--Footer-->
<footer class="page-footer blue darken-6">
          
</footer>
  <!--Scripts-->
  <script type="text/javascript" src="../backend/web/js/materialize.min.js"></script>
      <script>
          document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.tooltipped');
    var instances = M.Tooltip.init(elems, options);
    var elems = document.querySelectorAll('.parallax');
    var instances = M.Parallax.init(elems, options);
  });
        M.AutoInit();

      </script>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  </body>
</html>
