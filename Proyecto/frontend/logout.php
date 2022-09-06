<?php


		if(isset($_POST['accion']) && $_POST['accion'] == "salir"){

			@session_start();
			unset($_SESSION['emailUsuario']);
			unset($_SESSION['nomUsuario']);
			session_destroy();

		}

		header("Location:index.php");



?>