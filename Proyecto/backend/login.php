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
			body {
				display: flex;
				min-height: 100vh;
				flex-direction: column;
				background-image: url("../frontend/imagenes/blackff.png");
				background-repeat: no-repeat;
				background-size: cover;
			}
			main {
				flex: 1 0 auto;
			}
			table.striped > tbody > tr:nth-child(odd) {
				background-color: #c5cae9;
			}
			.pagination li.active {
			  background-color: #bbdefb;
			}
			.row .col.s6{
				margin-top: 10%;
				padding: 4%;
			}
			.e1 {
			padding: 10px;
			border-radius: 25px;
			}
			.e2{
				bottom: 15px;
			}
			.row{
				margin-bottom:10%;
			}


		</style>
	</head>
	<body>
		<main>
			<div class="container">
				<div class="row">
					<div class="col s3">
					</div>
					<div class="col s6 center-align white e1 z-depth-2"><img src="imagenes/logo.png">
						<div>
							<h2>Login</h2>
						</div>
						<form action="login.php?" method="POST" class="col s12">
							<div class="row">
								<div class="input-field col s12">
									<input placeholder="Nombre" id="nombre" type="text" class="validate" name="txtNombre">
									<label for="nombre">Nombre</label>
								</div>
							</div>				
							<div class="row">
								<div class="input-field col s12">
									<input placeholder="Clave" id="clave" type="password" class="validate" name="txtClave">
									<label for="clave">Clave</label>
								</div>
							</div>	
							<button class="btn waves-effect waves-light e2 blue darken-5" type="submit" >Entrar
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
	