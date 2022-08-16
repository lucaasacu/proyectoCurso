<?php


		if(isset($_GET['r']) && $_GET['r'] != ""){

			$ruta = $_GET['r'];    

			if($ruta == "deportistas"){
				include("vistas/deportistas_vista.php");
			}elseif($ruta == "prueba"){
				include("modelos/prueba.php");
			}else{
				echo("sadasdsd");
			

			}
		}


?>