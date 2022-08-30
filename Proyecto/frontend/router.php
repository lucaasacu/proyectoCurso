<?php
		if(isset($_GET['r']) && $_GET['r'] != ""){

			$ruta = $_GET['r'];    

			if($ruta == "jugadores"){
				include("deportistas.php");
			}
		}

?>