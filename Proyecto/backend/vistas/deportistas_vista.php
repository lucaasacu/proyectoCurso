<?php
	require_once("modelos/deportistas_modelo.php");
	$rutaPagina = "deportistas";


	$objDeportistas = new deportistas_modelo();

	$respuesta = array();
	if(isset($_POST["accion"]) && $_POST['accion'] == "ingresar" ){

		$datos = array();
		$datos['nombre'] 						= isset($_POST['txtNombre'])?$_POST['txtNombre']:"";		
		$datos['apellido'] 						= isset($_POST['txtApellido'])?$_POST['txtApellido']:"";
		$datos['fechaNacimiento']				= isset($_POST['txtFechaNacimiento'])?$_POST['txtFechaNacimiento']:"";
		$datos['genero'] 						= isset($_POST['txtGenero'])?$_POST['txtGenero']:"";
		$datos['pais'] 							= isset($_POST['txtPais'])?$_POST['txtPais']:"";
		$datos['posicion'] 						= isset($_POST['txtPosicion'])?$_POST['txtPosicion']:"";
		$datos['numero'] 						= isset($_POST['txtNumero'])?$_POST['txtNumero']:"";

		$objDeportistas->constructor($datos);
		$respuesta = $objDeportistas->ingresar();


	}	

	if(isset($_POST["accion"]) && $_POST['accion'] == "editar" ){

		$datos = array();
		$datos['nombre'] 						= isset($_POST['txtNombre'])?$_POST['txtNombre']:"";		
		$datos['apellido'] 						= isset($_POST['txtApellido'])?$_POST['txtApellido']:"";
		$datos['fechaNacimiento']				= isset($_POST['txtFechaNacimiento'])?$_POST['txtFechaNacimiento']:"";
		$datos['genero'] 						= isset($_POST['txtGenero'])?$_POST['txtGenero']:"";
		$datos['pais'] 							= isset($_POST['txtPais'])?$_POST['txtPais']:"";
		$datos['posicion'] 						= isset($_POST['txtPosicion'])?$_POST['txtPosicion']:"";
		$datos['numero'] 						= isset($_POST['txtNumero'])?$_POST['txtNumero']:"";

		$objDeportistas->constructor($datos);
		$respuesta = $objDeportistas->editar();

	}	

	if(isset($_POST["accion"]) && $_POST['accion'] == "borrar" && isset($_POST["nombre"]) && $_POST['nombre'] != ""){

		$nombre = $_POST['nombre'];
		$objDeportistas->cargar($nombre);
		$respuesta = $objDeportistas->borrar();

	}

	
	$buscar = isset($_POST['buscador'])?$_POST['buscador']:"";
	if($buscar == "" && isset($_GET['buscador']) && $_GET['buscador'] != ""){
		$buscar = $_GET['buscador'];
	}

	$arrayFiltros = array("buscar"=>$buscar);

	$totalMaximo = $objDeportistas->totalPaginas($arrayFiltros);
	if(isset($_GET['pagina']) && $_GET['pagina'] != ""){
		// Validados que la pagina siempre sea un numero
		$pagina = (int)$_GET['pagina'];
		
		if($pagina < 1){
			$pagina = 1;
		}elseif($pagina > $totalMaximo){
			$pagina = $totalMaximo;
		}elseif(!is_int($pagina)){
			$pagina = 1;
		}
		$paginaAnterior = $pagina - 1;
		if($paginaAnterior < 1){
			$paginaAnterior = 1;
		}
		$paginaSiguente = $pagina + 1;
		if($paginaSiguente > $totalMaximo){
			$paginaSiguente = $totalMaximo;
		}

	}else{
		$pagina  		= 1;
		$paginaAnterior = 1;
		$paginaSiguente = 2;
	}

	$arrayFiltros['pagina'] = $pagina - 1;
	$listaDeportistas = $objDeportistas->listar($arrayFiltros);

?>
<h1>Deportistas</h1>

	  <!-- El modal de ingreso -->
<div id="modal1" class="modal modal-fixed-footer">
	<div class="modal-content">
		<h4>Ingresar deportista</h4>
		<div class="row">
			<form action="index.php?r=<?=$rutaPagina?>" method="POST" class="col s12">
				<div class="row">
					<div class="input-field col s12">
						<input placeholder="nombre" id="nombre" type="text" class="validate" name="txtnombre">
						<label for="nombre">nombre</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6">
						<input placeholder="Nombre" id="nombre" type="text" class="validate" name="txtNombre">
						<label for="nombre">Nombre</label>
					</div>
					<div class="input-field col s6">
						<input placeholder="Apellido" id="apellido" type="text" class="validate" name="txtApellido">
						<label for="apellido">Apellido</label>
					</div>
				</div>	
				<div class="row">
					<div class="input-field col s6">
						<input placeholder="Fecha Nacimiento" id="fechaNacimiento" type="date" class="validate" name="txtFechaNacimiento">
						<label for="fechaNacimiento">Fecha Nacimiento</label>
					</div>
				</div>
				<button class="btn waves-effect waves-light" type="submit" name="accion" value="ingresar">Enviar
					<i class="material-icons right">send</i>
				</button>
			</form>
		</div>
	</div>
	<div class="modal-footer">
   		<a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
	</div>
</div>


<!-- Page Content goes here -->		


<?PHP 
	if(isset($respuesta['codigo']) && $respuesta['codigo'] == "Error"  ){
?>
	<div class="red center-align">	
		<h3><?=$respuesta['mensaje']?></h3>
	</div>
<?PHP
	}
?>
<?PHP 
	if(isset($respuesta['codigo']) && $respuesta['codigo'] == "OK"  ){
?>
	<div class="green center-align">	
		<h3><?=$respuesta['mensaje']?></h3>
	</div>
<?PHP
	}
?>


<?PHP 
	if(isset($_GET['accion']) && $_GET['accion'] == "editar" && isset($_GET['deportista']) && $_GET['deportista'] != ""  ){
		$objDeportistas->cargar($_GET['deportista']);

?>
	<div class="grey lighten-3 center-align">	
		<h3>Editar deportista</h3>
		<form action="index.php?r=<?=$rutaPagina?>" method="POST" class="container col s10">
			<div class="row">
			</div>
			<div class="row">
				<div class="input-field col s6">
					<input placeholder="Nombre" id="nombre" type="text" class="validate" name="txtNombre" value="<?=$objDeportistas->obtenerNombre()?>">
					<label for="nombre">Nombre</label>
				</div>
				<div class="input-field col s6">
					<input placeholder="Apellido" id="apellido" type="text" class="validate" name="txtApellido" value="<?=$objDeportistas->obtenerApellido()?>">
					<label for="apellido">Apellido</label>
				</div>
			</div>
			<div class="row">
			<div class="input-field col s6">
					<input placeholder="Fecha Nacimiento" id="fechaNacimiento" type="date" class="validate" name="txtFechaNacimiento" value="<?=$objDeportistas->obtenerFechaNacimiento()?>">
					<label for="fechaNacimiento">Fecha Nacimiento</label>
				</div>
				<div class="input-field col s6">
					<input placeholder="Genero" id="genero" type="text" class="validate" name="txtGenero" value="<?=$objDeportistas->obtenerGenero()?>" disabled>
					<label for="genero">Genero</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s6">
					<input placeholder="Nombre" id="nombre" type="text" class="validate" name="txtNombre" value="<?=$objDeportistas->obtenerNombre()?>">
					<label for="nombre">Nombre</label>
				</div>
				<div class="input-field col s6">
					<input placeholder="Apellido" id="apellido" type="text" class="validate" name="txtApellido" value="<?=$objDeportistas->obtenerApellido()?>">
					<label for="apellido">Apellido</label>
				</div>
			</div>
			<div class="row">

			</div>

				<div class="input-field col s6">
					<input placeholder="Fecha Nacimiento" id="fechaNacimiento" type="date" class="validate" name="txtFechaNacimiento" value="<?=$objDeportistas->obtenerFechaNacimiento()?>">
					<label for="fechaNacimiento">Fecha Nacimiento</label>
				</div>
			</div>	
			<div class="row">
				<div class="input-field col s6">
					<input placeholder="Fecha Nacimiento" id="fechaNacimiento" type="date" class="validate" name="txtFechaNacimiento" value="<?=$objDeportistas->obtenerFechaNacimiento()?>">
					<label for="fechaNacimiento">Fecha Nacimiento</label>
				</div>
			</div>	
			<div class="row">
				<div class="input-field col s6">
					<input placeholder="Fecha Nacimiento" id="fechaNacimiento" type="date" class="validate" name="txtFechaNacimiento" value="<?=$objDeportistas->obtenerFechaNacimiento()?>">
					<label for="fechaNacimiento">Fecha Nacimiento</label>
				</div>
			</div>				
			<button class="btn waves-effect waves-light blue darken-5" type="submit" name="accion" value="editar">Enviar
				<i class="material-icons right">send</i>
			</button>
		</form>
	
	</div>
<?php
	}
?>

<?PHP 
	if(isset($_GET['accion']) && $_GET['accion'] == "borrar" && isset($_GET['deportista']) && $_GET['deportista'] != ""  ){
?>
	<div class="grey lighten-3 center-align">	
		<form action="index.php?r=<?=$rutaPagina?>" method="POST" class="col s12">
			<h3>Borrar deportista</h3>
			<h4>Desea borrar al deportista? <?=$_GET['deportista']?></h4>
			<input type="hidden" name="nombre" value="<?=$_GET['deportista']?>">
			<button class="btn waves-effect waves-light red" type="submit" name="accion" value="borrar">Eliminar
				<i class="material-icons right">deleted</i>
			</button>
			<button class="btn waves-effect waves-light blue" type="submit" name="accion" value="cancelar">Cancelar
				<i class="material-icons right">cancel</i>
			</button>		
		</form>
	</div>
<?php
	}
?>

<table class="striped">
	<thead>

		<tr>
			<th class="" colspan=7>
				<div class="left">
					<a class="waves-effect waves-light btn modal-trigger blue darken-4" href="#modal1">
						<i class="material-icons left">group_add</i>Ingresar
					</a>
				</div>
				<div class="right">
					<a class="waves-effect waves-light btn modal-trigger blue darken-4" href="index.php?r=<?=$rutaPagina?>">
						<i class="material-icons left">restore</i>Reset
					</a>
				</div>
			</th>
			<th class="center" colspan=4>
				<nav>
					<div class="nav-wrapper blue darken-4">
						<form action="index.php?r=<?=$rutaPagina?>" method="POST" >
							<div class="input-field">
								<input id="search" type="search" name="buscador" required>
								<label class="label-icon" for="search">
									<i class="material-icons">search</i>
								</label>
								<i class="material-icons">close</i>
							</div>
						</form>
				    </div>
				</nav>
			</th>
		</tr>
		<tr>
			<th class="center">Nombre</th>
			<th class="center">Apellido</th>
			<th class="center">Fecha Nacimiento</th>
			<th class="center">Genero</th>
			<th class="center">Pais</th>
			<th class="center">Posicion</th>
			<th class="center">Numero</th>
			<th class="center" style="width:200px">Botones</th>
		</tr>
	</thead>
	<tbody>
<?php
				foreach($listaDeportistas AS $deportista){

?>
		<tr>
			<td class="center"><?=$deportista['nombre']?></td>
			<td class="center"><?=$deportista['apellido']?></td>
			<td class="center"><?=$deportista['fechaNacimiento']?></td>
			<td class="center"><?=$deportista['genero']?></td>
			<td class="center"><?=$deportista['pais']?></td>
			<td class="center"><?=$deportista['posicion']?></td>
			<td class="center"><?=$deportista['numero']?></td>
			<td>
				<div class="right">
					<a href="index.php?r=<?=$rutaPagina?>&accion=editar&deportista=<?=$deportista['nombre']?>" class="waves-effect waves-light btn blue darken-4">
						<i class="material-icons">edit</i>
					</a>
					<a href="index.php?r=<?=$rutaPagina?>&accion=borrar&deportista=<?=$deportista['nombre']?>" class="waves-effect waves-light btn red">
						<i class="material-icons">delete</i>
					</a>
				<div>
			</td>
		</tr>
<?php
	}
?>

		<tr class="blue darken-4">
			<td colspan="8">
				<ul class="pagination center">
					<li class="waves-effect">
						<a href="index.php?r=<?=$rutaPagina?>&pagina=1&buscador=<?=$buscar?>" class="white-text">
							<i class="material-icons">arrow_back</i>
						</a>
					</li>
					<li class="waves-effect">
						<a href="index.php?r=<?=$rutaPagina?>&pagina=<?=$paginaAnterior?>&buscador=<?=$buscar?>" class="white-text">
							<i class="material-icons">chevron_left</i>
						</a>
					</li>
					
<?php
					for($i = 1; $i <= $totalMaximo; $i++){
						$class = "waves-effect";
						$classText = "white-text";
						if($i == $pagina){
							$class = "active";
							$classText = "red-text";
						}
?>
					<li class="<?=$class?>" >
						<a href="index.php?r=<?=$rutaPagina?>&pagina=<?=$i?>&buscador=<?=$buscar?>" class="<?=$classText?>"><?=$i?></a>
					</li>

<?PHP
					}
?>
					<li class="waves-effect" >
						<a href="index.php?r=<?=$rutaPagina?>&pagina=<?=$paginaSiguente?>&buscador=<?=$buscar?>" class="white-text">
							<i class="material-icons">chevron_right</i>
						</a>
					</li>
					<li class="waves-effect">
						<a href="index.php?r=<?=$rutaPagina?>&pagina=<?=$totalMaximo?>&buscador=<?=$buscar?>" class="white-text">
							<i class="material-icons">arrow_forward</i>
						</a>
					</li>
				</ul>
			</td>
		</tr>
	</tbody>
</table>