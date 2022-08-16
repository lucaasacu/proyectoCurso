<?php

	require_once("modelos/administradores_modelo.php");
	@session_start();

	$nombre = isset($_POST['txtNombre'])?$_POST['txtNombre']:"";
	$clave 	= isset($_POST['txtClave'])?$_POST['txtClave']:"";

	if($nombre != "" && $clave != ""){

		$objAdministradores = new administradores_modelo();
		$respuesta = $objAdministradores->login($nombre, $clave);

		echo("Estoy haciendo el login:");
		if($respuesta){

			$_SESSION['usuario'] = $nombre;
			header("Location:index.php");

		}else{
			unset($_SESSION['usuario'] );
			session_destroy();
			echo("Error en el login");	
		}
	
	}else{
		unset($_SESSION['usuario']);
		session_destroy();
	}


?>
<!DOCTYPE html>
<html>
<head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="web/css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="web/estilo.css"  media="screen,projection"/>
      <!--Iconos w3-->
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <!-- Add icon library -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>Login</title>
	  <link rel="icon" href="imagenes/logo.png">
          <style>
          .fa {
        display: inline-table;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: 24px;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        }
        a.ex1:hover, a.ex1:active {color: red;}
		nav .brand-logo.center {
    left: 50%;
    bottom: 5%;
    -webkit-transform: translateX(-50%);
    transform: translateX(-50%);
}
.fondo{
    background-image:url(imagenes/blackf.png);
    background-position: 100;
    background-size: cover;
    background-repeat: no-repeat;
}   
input#nombre.validate.valid{
	background-color: transparent;
	color: white;
}
input#clave.validate.valid{
	background-color: transparent;
	color: white;
}
button, input, select, textarea, optgroup {
    color: white;
}
     
          </style>
    </head>
	<body class="fondo">
		<main>
          <nav>
              <div class="nav-wrapper blue darken-5">
                  <a href="index.php" class="brand-logo center"><img src="imagenes/logo.png"></a>
              </div>
          </nav>
      <div class="container blue darken-5 "></div>
			<div class="container">
				<div class="row">
					<br><br><br>
					<div class="col s3">
					</div>
					<div class="col s6 center-align">
						<div>
						<h3 style="font-size:300%; color:white;">Inicia sesion</h3>
						</div>
						<form action="login.php?" method="POST" class="col s12">
							<div class="row">
								<div class="input-field col s12">
									<input placeholder="Nombre" id="nombre" type="text" class="validate" name="txtNombre">
									<label for="Nombre">Nombre</label>
								</div>
							</div>				
							<div class="row">
								<div class="input-field col s12">
									<input placeholder="Clave" id="clave" type="password" class="validate" name="txtClave">
									<label for="Clave">Clave</label>
								</div>
							</div>	
							<button class="btn waves-effect blue darken-6" type="submit" >Entrar
								<i class="material-icons right">send</i>
							</button>
						</form>
					</div>
					<div class="col s3">
					</div>	
				</div>
			</div>
</main>
		<script type="text/javascript" src="web/js/materialize.min.js"></script>
			<script>			
				document.addEventListener('DOMContentLoaded', function() {
					M.AutoInit();
					var elems = document.querySelectorAll('.datepicker');
					var instances = M.Datepicker.init(elems, options);
				});
			</script>
	</body>
</html>
	