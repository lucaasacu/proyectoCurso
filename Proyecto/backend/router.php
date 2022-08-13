<?php


		if(isset($_GET['r']) && $_GET['r'] != ""){

			$ruta = $_GET['r'];    

			if($ruta == "deportistas"){
				include("vistas/deportistas_vista.php");
			}else{
				echo("<h1>AAA</h1>");

			}

		}else{

			echo("<h1>AAAA</h1>");
		}


?>