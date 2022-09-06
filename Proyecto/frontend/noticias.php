<?php
	require_once("php/modelos/noticias_modelo.php");

  $objNoticias = new noticias_modelo();
  $listaNoticias = $objNoticias->listaCat();

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

      .card .card-image img {
    width: 100%;
    height: 500px;
}
.row .col {
    padding: 2.75rem;
}
.fondito{

background-image: url("imagenes/fondo6.png");
}



</style>
</head>
<body class="fondito">
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


<!--NOTICIAS JUGADORES-->

  <h1 class="center white"><b>Jugadores</b></h1>
  <br><br>

  <div class="row">
  <?php
      foreach($listaNoticias['jugadores'] as $noticias){;
  ?>
<div class="col s12 m5">
<div class="card">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" style="margin: 0 0;" src="http://localhost/proyectoCurso/Proyecto/backend/archivos/imagenes/<?=$noticias['imagen']?>">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4"><?=$noticias['titulo']?><i class="material-icons right">more_vert</i></span>
      <p><a class="red-text"><?=$noticias['fechapublicacion']?></a></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4"><?=$noticias['titulo']?><i class="material-icons right">close</i></span>
      <p><?=$noticias['noticia']?></p>
      <p><a class="red-text"><?=$noticias['fechapublicacion']?></a></p>
    </div>
  </div>
  </div>
            
    <?php
  }
  ?>
  </div>
  </div>


  <!--NOTICIAS RESULTADOS-->

  <h1 class="center white"><b>Resultados</b></h1>
  <br><br>

  <div class="row">
  <?php
      foreach($listaNoticias['resultados'] as $noticias){;
  ?>
<div class="col s12 m5">
<div class="card">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" style="margin: 0 0;" src="http://localhost/proyectoCurso/Proyecto/backend/archivos/imagenes/<?=$noticias['imagen']?>">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4"><?=$noticias['titulo']?><i class="material-icons right">more_vert</i></span>
      <p><a class="red-text"><?=$noticias['fechapublicacion']?></a></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4"><?=$noticias['titulo']?><i class="material-icons right">close</i></span>
      <p><?=$noticias['noticia']?></p>
    </div>
  </div>
  </div>
            
    <?php
  }
  ?>
  </div>

  <!--NOTICIAS MERCADO-->

  <h1 class="center white"><b>Mercado</b></h1>
  <br><br>

  <div class="row">
  <?php
      foreach($listaNoticias['mercado'] as $noticias){;
  ?>
<div class="col s12 m6">
<div class="card">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" style="margin: 0 0;" src="http://localhost/proyectoCurso/Proyecto/backend/archivos/imagenes/<?=$noticias['imagen']?>">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4"><?=$noticias['titulo']?><i class="material-icons right">more_vert</i></span>
      <p><a class="red-text"><?=$noticias['fechapublicacion']?></a></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4"><?=$noticias['titulo']?><i class="material-icons right">close</i></span>
      <p><?=$noticias['noticia']?></p>
    </div>
  </div>
  </div>
            
    <?php
  }
  ?>
  </div>

  <!--NOTICIAS INTERNACIONALES-->

  <h1 class="center white"><b>Internacionales</b></h1>
  <br><br>

  <div class="row">
  <?php
      foreach($listaNoticias['internacionales'] as $noticias){;
  ?>
<div class="col s12 m6">
<div class="card">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" style="margin: 0 0;" src="http://localhost/proyectoCurso/Proyecto/backend/archivos/imagenes/<?=$noticias['imagen']?>">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4"><?=$noticias['titulo']?><i class="material-icons right">more_vert</i></span>
      <p><a class="red-text"><?=$noticias['fechapublicacion']?></a></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4"><?=$noticias['titulo']?><i class="material-icons right">close</i></span>
      <p><?=$noticias['noticia']?></p>
    </div>
  </div>
  </div>
            
    <?php
  }
  ?>
  </div>

  <!--NOTICIAS SOCIALES-->

  <h1 class="center white"><b>Sociales</b></h1>
  <br><br>

  <div class="row">
  <?php
      foreach($listaNoticias['sociales'] as $noticias){;
  ?>
<div class="col s12 m6">
<div class="card">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" style="margin: 0 0;" src="http://localhost/proyectoCurso/Proyecto/backend/archivos/imagenes/<?=$noticias['imagen']?>">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4"><?=$noticias['titulo']?><i class="material-icons right">more_vert</i></span>
      <p><a class="red-text"><?=$noticias['fechapublicacion']?></a></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4"><?=$noticias['titulo']?><i class="material-icons right">close</i></span>
      <p><?=$noticias['noticia']?></p>
    </div>
  </div>
  </div>
            
    <?php
  }
  ?>
  </div>

  <main></main>
  <!--Footer-->
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
