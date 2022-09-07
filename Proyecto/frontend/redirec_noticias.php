<?php


		if(isset($_POST['accion']) && $_POST['accion'] == "salir"){

			@session_start();
			unset($_SESSION['emailUsuario']);
			unset($_SESSION['nomUsuario']);
			session_destroy();
		}else{
         echo("Para ver las noticias tienes que loguearte!");

		header("Location:index.php");
        }

?>