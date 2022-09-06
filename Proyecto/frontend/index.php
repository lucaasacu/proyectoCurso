
<?php
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
      <title>NACIONAL</title>
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
      .crema{
        background-color:#f2f2f2;
      }
        
          </style>
</head>
<body>
 <!--++++++ Nav bar ++++++-->
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
          <main>
      <div class="container blue darken-5"></div>

<!--++++++ Parallax ++++++-->
  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="imagenes/nacional2.png" alt="Unsplashed background img 1"></div>
    <div class="container white" style="width: 50%">
    <table class="stripped">
        <tbody>
          <tr>
            <td><img src="imagenes/logo.png" style="width: 13%">Nacional</td>
            <td>2</td>
            <td>:</td>
            <td>0</td>
            <td><img src="imagenes/cuadros/wanderers.png" style="width: 12%">Wanderers</td>
          </tr>
          <tr>
            <td><img src="imagenes/logo.png" style="width: 13%">Nacional</td>
            <td>1</td>
            <td>:</td>
            <td>0</td>
            <td><img src="imagenes/cuadros/liverpool.png" style="width: 12%">Liverpool</td>
          </tr>
          <tr>
            <td><img src="imagenes/logo.png" style="width: 13%">Nacional</td>
            <td>0</td>
            <td>:</td>
            <td>3</td>
            <td><img src="imagenes/cuadros/goian.png" style="width: 12%">Atl. Goianiense</td>
          </tr>
          <tr>
            <td><img src="imagenes/logo.png" style="width: 13%">Nacional</td>
            <td>3</td>
            <td>:</td>
            <td>0</td>
            <td><img src="imagenes/cuadros/rentistas.png" style="width: 12%">Rentistas</td>
          </tr>
        </tbody>
      </table> 
      </div>    
  </div>    
  <div class="container">
    
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
            <img src="imagenes/LIBERTADORES.png" style="width:270px;">
        </div>

        <div class="col s12 m4">
            <img src="imagenes/C_URUGUAYOS.png" style="width:270px;">
        </div>

        <div class="col s12 m4">
            <img src="imagenes/INTERCONTINENTALES.png" style="width:270px;">
        </div>
      </div>

    </div>
  </div>
  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        
      </div>
    </div>
    <div class="parallax"><img src="imagenes/equipo2.png" alt="Unsplashed background img 2"></div>
    <div class="row">
    <div class="col s12 m11">
      <div class="card-panel white z-depth-1">
      <h4><b>Un poco de historia</h4>
      <p class="left-align light">El Club Nacional de Football es una institución deportiva de Uruguay. Fue fundado el 14 de mayo de 1899 en Montevideo, por iniciativa de jóvenes estudiantes de la época, con la intención de consolidar una institución de fútbol para uruguayos criollos frente al predominio de clubes y practicantes extranjeros europeos de este deporte, particularmente ingleses y alemanes, siendo considerado así el "primer equipo criollo" del país y uno de los primeros clubes fundados por nacionales en América. </p>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col s11 m11">
      <div class="card-panel white z-depth-1">
      <h4><b>Hablando de titulos</h4>
      <p class="left-align light">Desde sus orígenes, Nacional ha sido el padre de la gloria del fútbol uruguayo. Con un linaje y una mística ganadora inigualable, Nacional ha conquistado a través de su historia 163 títulos oficiales, que lo definirán en el club más laureado de toda América. Es uno de los equipos mas fuertes del continente con una cantidad de 141 títulos ganados solamente a nivel local y 22 títulos conseguidos a nivel internacional contra grandes equipos de todo el mundo.</p>
      </div>
    </div>
  </div>
  </div>
  </main>
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
