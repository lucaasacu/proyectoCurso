<?php
	//echo("Estoy iniciando mi proyecto");
	//phpinfo();


	@session_start();

	if(isset($_SESSION['usuario']) && $_SESSION['usuario'] != ""){
		
	}else{
		header("Location:login.php");
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
			<title>Panel de administracion</title>
			<link rel="icon" href="imagenes/logo.png">
		<style>
			body {
				display: flex;
					min-height: 100vh;
				flex-direction: column;
			}
			main {
				flex: 1 0 auto;
			}
			table.striped > tbody > tr:nth-child(odd) {
				background-color: #bbdefb;
			}
			.pagination li.active {
				background-color: #bbdefb;
			}
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
		</style>
	</head>
	<body>
		<!--NAV-->
		<nav>
			<div class="nav-wrapper blue darken-5">
				<a href="index.php" class="brand-logo center"><img src="imagenes/logo.png"></a>
					<ul class="right hide-on-med-and-down">
						<li><a href="index.php" class="tooltipped" data-position="bottom" data-tooltip="Inicio"><i class="material-icons">home</i></a></li>
						<li><a href="index.php?r=noticias" class="tooltipped" data-position="bottom" data-tooltip="Noticias"><i class="material-icons">language</i></a></li>
						<li><a href="index.php?r=deportistas" class="tooltipped" data-position="bottom" data-tooltip="Deportistas"><i class="material-icons">people</i></a></li>
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
							
		</nav>
		<h2 class="center">Panel de administracion</h2>
		<main>
			<div class="container">
				<?php include("router.php"); ?>
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
		