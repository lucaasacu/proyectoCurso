<?php
	require_once("php/modelos/deportistas_modelo.php");

  $objDeportistas = new deportistas_modelo();
	$listaDeportistas = $objDeportistas->listarPosicion();

  require_once("php/modelos/usuarios_modelo.php");




	@session_start();

  $objUsuario = new usuarios_modelo();
	if( (isset($_POST['txtEmail']) && $_POST['txtEmail'] != "") && (isset($_POST['txtClave']) && $_POST['txtClave'] != "") ){


		$email 	  = $_POST['txtEmail'];
		$clave 		= $_POST['txtClave'];

		$respuesta = $objUsuario->login($email, $clave);

		if($respuesta){	
	
			$_SESSION['emailUsuario'] = $objUsuario->obtenerEmail();
			$_SESSION['nomUsuario']   = $objUsuario->obtenerNombre()." ".$objUsuario->obtenerApellido();
		}else{
			unset($_SESSION['emailUsuario'] );
			session_destroy();
			echo '<script type="text/javascript">
       window.onload = function () { alert("Error en el login, porfavor intentalo nuevamente"); } 
        </script>';
  	
		}
  }

  $nombreLogin = "";
	if(isset($_SESSION['nomUsuario']) && $_SESSION['nomUsuario'] != ""){
		$nombreLogin = $_SESSION['nomUsuario'];


		}
	



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
    border-radius: 30px;
}
.card-content{
    text-align: center;
    font-weight: bold;
    }

    .card .card-content {
    padding: 20px;
}

.row .col.m3 {
    width: auto;
    margin-left: auto;
    left: auto;
    right: auto;
}

.fondito{

  background-image: url("imagenes/fondo6.png");
}



.card .card-image {
    position: relative;
    border-radius: 35px;
}

.puntero{
  cursor: pointer;
}

        
</style>
</head>
<body class="fondito">
  <!--++++++ Nav ++++++-->
  <nav>
              <div class="nav-wrapper blue darken-5">
                  <a href="index.php" class="brand-logo center"><b>Club Nacional de Football</b></a>
                  <a href="index.php"><img src="imagenes/logo.png"></a>
                      <ul class="right hide-on-med-and-down">
                          <li><?= $nombreLogin ?></li>
                          <li><a href="index.php" class="tooltipped" data-position="bottom" data-tooltip="Inicio"><i class="material-icons">home</i></a></li>
                          <li><a href="noticias.php" class="tooltipped" data-position="bottom" data-tooltip="Noticias"><i class="material-icons">language</i></a></li>
                          <li><a href="deportistas.php" class="tooltipped" data-position="bottom" data-tooltip="Deportistas"><i class="material-icons">people</i></a></li>
                          <li><a href="contacto.php" class="tooltipped" data-position="bottom" data-tooltip="Contacto" ><i class="material-icons">call</i></a></li>

                          <?php
			if($nombreLogin == ""){
?>
				<li>
					<a class="waves-effect waves-light btn modal-trigger red tooltipped" data-position="bottom" data-tooltip="Ingresar" href="#modallogin">Login</a>
				</li>
<?php
			}else{
?>
				<li>
					<a class="waves-effect waves-light btn modal-trigger red tooltipped" data-position="bottom" data-tooltip="Salir" href="#modallogout">Logout</a>
				</li>
<?php
			}
?>
                      </ul>
              </div>
    </nav>

<!--Menu para Iniciar sesion (LOGIN) -->
					<div id="modallogin" class="modal">
		<div class="modal-content">
			<h3>Login</h3>
			<div class="container">
				<form action="index.php?" method="POST" class="col s12">
					<div class="row">
						<div class="input-field col s12">
							<input placeholder="Email" id="email" type="email" class="validate" name="txtEmail">
							<label for="email">Email</label>
						</div>
					</div>				
					<div class="row">
						<div class="input-field col s12">
							<input placeholder="Clave" id="clave" type="text" class="validate" name="txtClave">
							<label for="clave">Clave</label>
						</div>
					</div>	
					<button class="btn waves-effect waves-light red" type="submit" >Entrar
						<i class="material-icons right">send</i>
					</button>
          <div class="container center">
          <h4>No tienes cuenta?</h4>
          <a class="waves-effect waves-light btn modal-trigger red tooltipped" data-position="bottom" data-tooltip="Salir" href="#modalregister">Registrate</a>
            </div>
				</form>
			</div>
		</div>
	</div>
  <!--Menu para Cerrar Sesion (LOGOUT) -->
  <div id="modallogout" class="modal">
		<div class="modal-content">
			<h4>Desea cerrar sesion?</h4>
			<div class="container">
				<form action="logout.php?" method="POST" class="col s12">
					<button class="btn waves-effect waves-light red" type="submit" name="accion" value="salir">Salir
						<i class="material-icons right">send</i>
					</button>
					<button class="btn waves-effect waves-light blue darken-5" name="accion" value="nada">Cancelar
						<i class="material-icons right">cancel</i>
					</button>
				</form>
			</div>
		</div>
	</div>
  <!--Menu para Registrarse -->
					<div id="modalregister" class="modal">
		<div class="modal-content">
			<h3 class="center">Registrarse</h3>
			<div class="container">
				<form action="index.php?" method="POST" class="col s12">
					<div class="row">
						<div class="input-field col s12">
							<input placeholder="Nombre" id="nombre" type="text" class="validate" name="txtNombre">
							<label for="nombre">Nombre</label>
						</div>
            <div class="input-field col s12">
							<input placeholder="Apellido" id="apellido" type="text" class="validate" name="txtApellido">
							<label for="apellido">Apellido</label>
						</div>
					</div>				
					<div class="row">
          <div class="input-field col s12">
							<input placeholder="Email" id="email" type="email" class="validate" name="txtEmail">
							<label for="email">Email</label>
						</div>
						<div class="input-field col s12">
							<input placeholder="Clave" id="clave" type="text" class="validate" name="txtClave">
							<label for="clave">Clave</label>
						</div>
					</div>	
          <button class="btn waves-effect waves-light red" type="submit" name="accion" value="ingresar">Enviar
					<i class="material-icons right">send</i>
				</button>
    
				</form>
			</div>
		</div>
	</div>

  <?php 
	if(isset($respuesta['codigo']) && $respuesta['codigo'] == "Error"  ){
?>
	<div class="red center-align">	
		<h3><?=$respuesta['mensaje']?></h3>
	</div>
<?php
	}
?>
<?php
	if(isset($respuesta['codigo']) && $respuesta['codigo'] == "OK"  ){
?>
	<div class="green center-align">	
		<h3><?=$respuesta['mensaje']?></h3>
	</div>
<?php
	}
?>

<!--Menu para Iniciar sesion (LOGIN) -->
					<div id="modallogin" class="modal">
		<div class="modal-content">
			<h3>Login</h3>
			<div class="container">
				<form action="index.php?" method="POST" class="col s12">
					<div class="row">
						<div class="input-field col s12">
							<input placeholder="Email" id="email" type="email" class="validate" name="txtEmail">
							<label for="email">Email</label>
						</div>
					</div>				
					<div class="row">
						<div class="input-field col s12">
							<input placeholder="Clave" id="clave" type="text" class="validate" name="txtClave">
							<label for="clave">Clave</label>
						</div>
					</div>	
					<button class="btn waves-effect waves-light" type="submit" >Entrar
						<i class="material-icons right">send</i>
					</button>
				</form>
			</div>
		</div>
	</div>
  <!--Menu para Cerrar Sesion (LOGOUT) -->
  <div id="modallogout" class="modal">
		<div class="modal-content">
			<h4>Desea cerrar sesion?</h4>
			<div class="container">
				<form action="logout.php?" method="POST" class="col s12">
					<button class="btn waves-effect waves-light red" type="submit" name="accion" value="salir">Salir
						<i class="material-icons right">send</i>
					</button>
					<button class="btn waves-effect waves-light blue darken-5" name="accion" value="nada">Cancelar
						<i class="material-icons right">cancel</i>
					</button>
				</form>
			</div>
		</div>
	</div>
          </nav>
      <div class="container blue darken-5"></div>
<br>

<!--GOLEROS-->
<div class="center">
<img src="imagenes/golero.png" style="width: 20%;">
</div>


  <div class="row">
  <br><br>

<?php

			foreach($listaDeportistas['golero'] as $deportistas){;
?>

    <div class="col s4 m3">
      <div class="card"> 
        <div class="card-image activator puntero" style="background-image: url('http://localhost/LucasAcuna/Proyecto/backend/archivos/imagenes/<?=$deportistas['imagen']?>');">
          <span class="card-title red"><?=$deportistas['numero']?></span>
        </div>
        <div class="card-content ">
          <p><b> <?=$deportistas['nombre']?> <?=$deportistas['apellido']?>  </b></p>
        </div>
        <div class="card-reveal">
      <span class="card-title grey-text text-darken-4 activator"><i class="material-icons right">close</i></span>
      <ul>
        <li><p>Fecha de nacimiento: <br> <?=$deportistas['fechaNacimiento']?></p></li>
        <li><p>Genero: <?=$deportistas['genero']?></p></li>
      </ul>

    </div>
      </div>
  </div>

<?php

      }
?>
</div>

<br><br>


<!--DEFENSA-->
<div class="center">
<img src="imagenes/def.png" style="width: 20%;">
</div>
  <div class="row">
  <br><br>
<?php

			foreach($listaDeportistas['defensa'] as $deportistas){;
?>

    <div class="col s4 m3">
      <div class="card"> 
        <div class="card-image activator puntero" style="background-image: url('http://localhost/LucasAcuna/Proyecto/backend/archivos/imagenes/<?=$deportistas['imagen']?>');">
          <span class="card-title red"><?=$deportistas['numero']?></span>
        </div>
        <div class="card-content">
          <p><b> <?=$deportistas['nombre']?> <?=$deportistas['apellido']?>  </b></p>
        </div>
        <div class="card-reveal">
      <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i></span>
      <ul>
        <li><p>Fecha de nacimiento: <br> <?=$deportistas['fechaNacimiento']?></p></li>
        <li><p>Genero: <?=$deportistas['genero']?></p></li>
      </ul>
      </div>
    </div>
  </div>

<?php

      }
?>
</div>
<br><br>



<!--MEDIOCAMPO-->
<div class="center">
<img src="imagenes/mediocampo.png" style="width: 27%;">
</div>
  <div class="row">
  <br><br><br>
<?php

			foreach($listaDeportistas['mediocampista'] as $deportistas){;
?>

    <div class="col s4 m3">
      <div class="card"> 
        <div class="card-image activator puntero" style="background-image: url('http://localhost/LucasAcuna/Proyecto/backend/archivos/imagenes/<?=$deportistas['imagen']?>');">
          <span class="card-title red"><?=$deportistas['numero']?></span>
        </div>
        <div class="card-content">
          <p><b> <?=$deportistas['nombre']?> <?=$deportistas['apellido']?>  </b></p>
        </div>
        <div class="card-reveal">
      <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i></span>
      <ul>
        <li><p>Fecha de nacimiento: <br> <?=$deportistas['fechaNacimiento']?></p></li>
        <li><p>Genero: <?=$deportistas['genero']?></p></li>
      </ul>
      </div>
    </div>
  </div>

<?php

      }
?>
</div>
<br><br>



<!--DELANTEROS-->
<div class="center">
<img src="imagenes/delanteros.png" style="width: 27%;">
</div>
  <div class="row">
  <br><br>
<?php

			foreach($listaDeportistas['delantero'] as $deportistas){;
?>

    <div class="col s4 m3">
      <div class="card"> 
        <div class="card-image activator puntero" style="background-image: url('http://localhost/LucasAcuna/Proyecto/backend/archivos/imagenes/<?=$deportistas['imagen']?>');">
          <span class="card-title red"><?=$deportistas['numero']?></span>
        </div>
        <div class="card-content">
          <p><b> <?=$deportistas['nombre']?> <?=$deportistas['apellido']?>  </b></p>
        </div>
        <div class="card-reveal">
      <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i></span>
      <ul>
        <li><p>Fecha de nacimiento: <br> <?=$deportistas['fechaNacimiento']?></p></li>
        <li><p>Genero: <?=$deportistas['genero']?></p></li>
      </ul>

    </div>
      </div>
  </div>


<?php

      }
?>
</div>
<br><br>
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
                    <li><a class="ex1 text-lighten-3" href="https://nacional.uy" target="_blank">Oficial <i class="material-icons tiny">launch</i></a> </li>
                    <li><p class="grey-text text-lighten-3">Lucas Acuña</p></li>
                    <li><p class="grey-text text-lighten-3">© 2022</p></li>
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
