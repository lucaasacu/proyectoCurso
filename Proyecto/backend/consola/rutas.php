<?php


	require_once("consola/instalador.php"); 

	if(isset($_SERVER['argv'][1]) && $_SERVER['argv'][1] != ""){

		if($_SERVER['argv'][1] == "instalar"){

			$objInstalador = new instalador();
			$retorno = $objInstalador->arrancar();

		}

	}


	


?>