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
      <title>JUGADORES</title>
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
  width:200px;
  height: 280px;
}
.card .card-image .card-title{
  padding: 10px;
}
.card .card-content p {
    margin: 0;
    text-align: center;
}
.card {
    float: left;
}
.card-content{
    text-align: center;
    font-weight: bold;
    }

        
</style>
</head>
<body>
 <!--++++++ Nav bar ++++++-->
 <main>
          <nav>
              <div class="nav-wrapper blue darken-5">
                  <a href="index.php" class="brand-logo center"><b>Club Nacional de Football</b></a>
                  <a href="index.php"><img src="imagenes/logo.png"></a>
                      <ul class="right hide-on-med-and-down">
                          <li><a href="" class="tooltipped" data-position="bottom" data-tooltip="Inicioaaaa"><i class="material-icons">home</i></a></li>
                          <li><a href="" class="tooltipped" data-position="bottom" data-tooltip="Noticias"><i class="material-icons">language</i></a></li>
                          <li><a href="" class="tooltipped" data-position="bottom" data-tooltip="Deportistas"><i class="material-icons">people</i></a></li>
                          <li><a href=""class="tooltipped" data-position="bottom" data-tooltip="Contacto" ><i class="material-icons">call</i></a></li>
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
  </main>
  <h1 class="center">Plantel 2022</h1>
<!--GOLEROS-->
  <h2 class="red center">GOLEROS</h2>
  <div class="row">
    <div class="col s4 m3">
      <div class="card">
        <div class="card-image" style="background-image: url('../backend/imagenes/jugadores/rochet.png');">
          <span class="card-title red">1</span>
        </div>
        <div class="card-content">
          <p><b> Sergio Rochet </b></p>
        </div>
      </div>
  </div>
  <div class="col s4 m3">
      <div class="card">
        <div class="card-image" style="background-image: url('../backend/imagenes/jugadores/rochet.png');">
          <span class="card-title red">1</span>
        </div>
        <div class="card-content">
          <p><b> Sergio Rochet </b></p>
        </div>
      </div>
  </div>
  <div class="col s4 m3">
      <div class="card">
        <div class="card-image" style="background-image: url('../backend/imagenes/jugadores/rochet.png');">
          <span class="card-title red">1</span>
        </div>
        <div class="card-content">
          <p><b> Sergio Rochet </b></p>
        </div>
      </div>
  </div>
  <div class="col s4 m3">
      <div class="card">
        <div class="card-image" style="background-image: url('../backend/imagenes/jugadores/rochet.png');">
          <span class="card-title red">1</span>
        </div>
        <div class="card-content">
          <p><b> Sergio Rochet </b></p>
        </div>
      </div>
  </div>
  </div>
  <!--DEFENSAS-->
  <h2 class="red center">DEFENSAS</h2>
  <div class="row">
    <div class="col s4 m3">
      <div class="card">
        <div class="card-image" style="background-image: url('../backend/imagenes/jugadores/rochet.png');">
          <span class="card-title red">1</span>
        </div>
        <div class="card-content">
          <p><b> Sergio Rochet </b></p>
        </div>
      </div>
  </div>
  <div class="col s4 m3">
      <div class="card">
        <div class="card-image" style="background-image: url('../backend/imagenes/jugadores/rochet.png');">
          <span class="card-title red">1</span>
        </div>
        <div class="card-content">
          <p><b> Sergio Rochet </b></p>
        </div>
      </div>
  </div>
  <div class="col s4 m3">
      <div class="card">
        <div class="card-image" style="background-image: url('../backend/imagenes/jugadores/rochet.png');">
          <span class="card-title red">1</span>
        </div>
        <div class="card-content">
          <p><b> Sergio Rochet </b></p>
        </div>
      </div>
  </div>
  <div class="col s4 m3">
      <div class="card">
        <div class="card-image" style="background-image: url('../backend/imagenes/jugadores/rochet.png');">
          <span class="card-title red">1</span>
        </div>
        <div class="card-content">
          <p><b> Sergio Rochet </b></p>
        </div>
      </div>
  </div>
  
  </div>
  <div class="row">
    <div class="col s4 m3">
      <div class="card">
        <div class="card-image" style="background-image: url('../backend/imagenes/jugadores/rochet.png');">
          <span class="card-title red">1</span>
        </div>
        <div class="card-content">
          <p><b> Sergio Rochet </b></p>
        </div>
      </div>
  </div>
  <div class="col s4 m3">
      <div class="card">
        <div class="card-image" style="background-image: url('../backend/imagenes/jugadores/rochet.png');">
          <span class="card-title red">1</span>
        </div>
        <div class="card-content">
          <p><b> Sergio Rochet </b></p>
        </div>
      </div>
  </div>
  <div class="col s4 m3">
      <div class="card">
        <div class="card-image" style="background-image: url('../backend/imagenes/jugadores/rochet.png');">
          <span class="card-title red">1</span>
        </div>
        <div class="card-content">
          <p><b> Sergio Rochet </b></p>
        </div>
      </div>
  </div>
  <div class="col s4 m3">
      <div class="card">
        <div class="card-image" style="background-image: url('../backend/imagenes/jugadores/rochet.png');">
          <span class="card-title red">1</span>
        </div>
        <div class="card-content">
          <p><b> Sergio Rochet </b></p>
        </div>
      </div>
  </div>
  </div>
  <!--MEDIOCAMPISTAS-->
  <h2 class="red center">MEDIOCAMPO</h2>
  <div class="row">
    <div class="col s4 m3">
      <div class="card">
        <div class="card-image" style="background-image: url('../backend/imagenes/jugadores/rochet.png');">
          <span class="card-title red">1</span>
        </div>
        <div class="card-content">
          <p><b> Sergio Rochet </b></p>
        </div>
      </div>
  </div>
  <div class="col s4 m3">
      <div class="card">
        <div class="card-image" style="background-image: url('../backend/imagenes/jugadores/rochet.png');">
          <span class="card-title red">1</span>
        </div>
        <div class="card-content">
          <p><b> Sergio Rochet </b></p>
        </div>
      </div>
  </div>
  <div class="col s4 m3">
      <div class="card">
        <div class="card-image" style="background-image: url('../backend/imagenes/jugadores/rochet.png');">
          <span class="card-title red">1</span>
        </div>
        <div class="card-content">
          <p><b> Sergio Rochet </b></p>
        </div>
      </div>
  </div>
  <div class="col s4 m3">
      <div class="card">
        <div class="card-image" style="background-image: url('../backend/imagenes/jugadores/rochet.png');">
          <span class="card-title red">1</span>
        </div>
        <div class="card-content">
          <p><b> Sergio Rochet </b></p>
        </div>
      </div>
  </div>
  
  </div>
  <div class="row">
    <div class="col s4 m3">
      <div class="card">
        <div class="card-image" style="background-image: url('../backend/imagenes/jugadores/rochet.png');">
          <span class="card-title red">1</span>
        </div>
        <div class="card-content">
          <p><b> Sergio Rochet </b></p>
        </div>
      </div>
  </div>
  <div class="col s4 m3">
      <div class="card">
        <div class="card-image" style="background-image: url('../backend/imagenes/jugadores/rochet.png');">
          <span class="card-title red">1</span>
        </div>
        <div class="card-content">
          <p><b> Sergio Rochet </b></p>
        </div>
      </div>
  </div>
  <div class="col s4 m3">
      <div class="card">
        <div class="card-image" style="background-image: url('../backend/imagenes/jugadores/rochet.png');">
          <span class="card-title red">1</span>
        </div>
        <div class="card-content">
          <p><b> Sergio Rochet </b></p>
        </div>
      </div>
  </div>
  <div class="col s4 m3">
      <div class="card">
        <div class="card-image" style="background-image: url('../backend/imagenes/jugadores/rochet.png');">
          <span class="card-title red">1</span>
        </div>
        <div class="card-content">
          <p><b> Sergio Rochet </b></p>
        </div>
      </div>
  </div>
  </div>
  <!--DELANTEROS-->
  <h2 class="red center">DELANTEROS</h2>
  <div class="row">
    <div class="col s4 m3">
      <div class="card">
        <div class="card-image" style="background-image: url('../backend/imagenes/jugadores/rochet.png');">
          <span class="card-title red">1</span>
        </div>
        <div class="card-content">
          <p><b> Sergio Rochet </b></p>
        </div>
      </div>
  </div>
  <div class="col s4 m3">
      <div class="card">
        <div class="card-image" style="background-image: url('../backend/imagenes/jugadores/rochet.png');">
          <span class="card-title red">1</span>
        </div>
        <div class="card-content">
          <p><b> Sergio Rochet </b></p>
        </div>
      </div>
  </div>
  <div class="col s4 m3">
      <div class="card">
        <div class="card-image" style="background-image: url('../backend/imagenes/jugadores/rochet.png');">
          <span class="card-title red">1</span>
        </div>
        <div class="card-content">
          <p><b> Sergio Rochet </b></p>
        </div>
      </div>
  </div>
  <div class="col s4 m3">
      <div class="card">
        <div class="card-image" style="background-image: url('../backend/imagenes/jugadores/rochet.png');">
          <span class="card-title red">1</span>
        </div>
        <div class="card-content">
          <p><b> Sergio Rochet </b></p>
        </div>
      </div>
  </div>
  
  </div>
  <div class="row">
    <div class="col s4 m3">
      <div class="card">
        <div class="card-image" style="background-image: url('../backend/imagenes/jugadores/rochet.png');">
          <span class="card-title red">1</span>
        </div>
        <div class="card-content">
          <p><b> Sergio Rochet </b></p>
        </div>
      </div>
  </div>
  <div class="col s4 m3">
      <div class="card">
        <div class="card-image" style="background-image: url('../backend/imagenes/jugadores/rochet.png');">
          <span class="card-title red">1</span>
        </div>
        <div class="card-content">
          <p><b> Sergio Rochet </b></p>
        </div>
      </div>
  </div>
  <div class="col s4 m3">
      <div class="card">
        <div class="card-image" style="background-image: url('../backend/imagenes/jugadores/rochet.png');">
          <span class="card-title red">1</span>
        </div>
        <div class="card-content">
          <p><b> Sergio Rochet </b></p>
        </div>
      </div>
  </div>
  <div class="col s4 m3">
      <div class="card">
        <div class="card-image" style="background-image: url('../backend/imagenes/jugadores/rochet.png');">
          <span class="card-title red">1</span>
        </div>
        <div class="card-content">
          <p><b> Sergio Rochet </b></p>
        </div>
      </div>
  </div>
  </div>

  
<!--++++++ Footer ++++++-->
<footer class="page-footer blue darken-6">
          <div class="container">
            <div class="row">
              <div class="col l5 s12">
                <h5 class="white-text">Redes sociales del club</h5>
                  <ul>
                      <a href="https://www.facebook.com/nacional/" class="fa fa-facebook"></a>
                      <a href="https://twitter.com/Nacional" class="fa fa-twitter"></a>
                      <a href="https://www.instagram.com/nacional/?hl=es" class="fa fa-instagram"></a>
                  </ul>
              </div>
              <div class="col s6"><img src="imagenes/gif1.gif" class="logoabajo"></div>
                <ul class="right">
                  <h5 class="white-text ">Links</h5>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container center">
              <a class="text-lighten-4 ex1" href="#!">¡QUE LO LLEVAN ADENTRO COMO LO LLEVO YO!</a>
            </div>
          </div>
</footer>


  <!--  Scripts-->
  <!--JavaScript at end of body for optimized loading-->
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
