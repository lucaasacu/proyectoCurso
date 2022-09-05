<?php
	require_once("modelos/noticias_modelo.php");
	$rutaPagina = "noticias";
	$objNoticias = new noticias_modelo();

//Ingresar (Constructor)

	$respuesta = array();
	if(isset($_POST["accion"]) && $_POST['accion'] == "ingresar" ){

		
		$archivo = $objNoticias->subirImagen($_FILES['imagen'], "800","600");
		if($archivo){

		$datos = array();
		$datos['id'] 							= isset($_POST['txtId'])?$_POST['txtId']:"";		
		$datos['titulo'] 						= isset($_POST['txtTitulo'])?$_POST['txtTitulo']:"";
		$datos['categoria']						= isset($_POST['txtCategoria'])?$_POST['txtCategoria']:"";
		$datos['noticia'] 						= isset($_POST['txtNoticia'])?$_POST['txtNoticia']:"";
		$datos['imagen'] 						= $archivo;

		$objNoticias->constructor($datos);
		$respuesta = $objNoticias->ingresar();

	}else{
		$respuesta = array();
		$respuesta['codigo'] = "Error";
		$respuesta['mensaje'] = "Error al subir la imagen";
		}
	}	

//Editar (Constructor)
	if(isset($_POST["accion"]) && $_POST['accion'] == "editar" ){
		
		print_r($_FILES);

		$datos = array();
		$datos['id'] 							= isset($_POST['txtId'])?$_POST['txtId']:"";		
		$datos['titulo'] 						= isset($_POST['txtTitulo'])?$_POST['txtTitulo']:"";
		$datos['categoria']						= isset($_POST['txtCategoria'])?$_POST['txtCategoria']:"";
		$datos['noticia'] 						= isset($_POST['txtNoticia'])?$_POST['txtNoticia']:"";
		



		$archivo = $objNoticias->subirImagen($_FILES['imagen'], "800","600");
		if($archivo){
			
			$datos['imagen'] 	= $archivo;
			
		}else{

			$datos['imagen'] 	= "";

		}
		$objNoticias->constructor($datos);
		$respuesta = $objNoticias->editar();

	}

//Borrar (Constructor)
	if(isset($_POST["accion"]) && $_POST['accion'] == "borrar" && isset($_POST["id"]) && $_POST['id'] != ""){

		$id = $_POST['id'];
		$objNoticias->cargar($id);
		$respuesta = $objNoticias->borrar();

	}

//Buscador (Constructor)
	$buscar = isset($_POST['buscador'])?$_POST['buscador']:"";
	if($buscar == "" && isset($_GET['buscador']) && $_GET['buscador'] != ""){
		$buscar = $_GET['buscador'];
	}

	$arrayFiltros = array("buscar"=>$buscar);

	$totalMaximo = $objNoticias->totalPaginas($arrayFiltros);
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
	$listaNoticias = $objNoticias->listar($arrayFiltros);
	$listaCategoria = $objNoticias->listaCategorias();
	


?>
<h1>Noticias</h1>
<style>
	.dropdown-content {
    background-color: #003062;
	}
	.div-padre{
   background-color: transparent;
}
</style>

<!-- FORMULARIO DE INGRESO DE NOTICIAS  -->
<div id="modal1" class="modal modal-fixed-footer">
	<div class="modal-content">
		<h3>Ingresar noticia</h3>
		<br>
		<div class="row">
			<form action="index.php?r=<?=$rutaPagina?>" enctype="multipart/form-data" method="POST" class="col s12">
				<div class="row">
					<div class="input-field col s6">
					<input placeholder="Titulo" id="titulo" type="text" class="validate" name="txtTitulo">
						<label for="titulo">Titulo de la noticia</label>
					</div>
					<div class="input-field col s6">
						<select name="txtCategoria">
							<option value="">Seleccione una opcion</option>
								<?php foreach($listaCategoria as $clave => $valor){

								?>
									<option value="<?=$clave?>"><?=$valor?></option>
								<?PHP
									}
								?>
						</select>
						<label for="genero">Categoria</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s6">
						<input placeholder="Noticia" id="Noticia" type="text" class="validate" name="txtNoticia">
						<label for="Noticia">Noticia</label>
					</div>
				</div>
				<div class="file-field input-field">
					<div class="btn">
						<span>Imagen</span>
						<input type="file" name="imagen" multiple>
					</div>
					<div class="file-path-wrapper">
						<input class="file-path validate" type="text" placeholder="Subir un archivo">
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


<!-- Funcionamiento -->		


<?php
	if(isset($respuesta['codigo']) && $respuesta['codigo'] == "Error"  ){
?>
	<div class="red center-align">	
		<h3><?=$respuesta['mensaje']?></h3>
	</div>
<?php
	}
?>
<?php
	if(isset($respuesta['codigo']) && $respuesta['codigo'] == "OK"  ){
?>
	<div class="green center-align">	
		<h3><?=$respuesta['mensaje']?></h3>
	</div>
<?php
	}
?>

<!-- FORMULARIO PARA EDITAR NOTICIAS  -->
<?php
	if(isset($_GET['accion']) && $_GET['accion'] == "editar" && isset($_GET['noticia']) && $_GET['noticia'] != ""  ){
		$objNoticias->cargar($_GET['noticia']);

?>
	<div class="grey lighten-3 center-align">	
		<h3>Editar Noticias</h3>
		<form action="index.php?r=<?=$rutaPagina?>" enctype="multipart/form-data" method="POST" class="container col s10">
		<div class="row">
				<div class="input-field col s12">
					<input placeholder="Id" id="Id" type="text" class="validate" value="<?=$objNoticias->obtenerId()?>" disabled>
					<input type="hidden" name="txtId" value="<?=$objNoticias->obtenerId()?>">
					<label for="Id">ID</label>
				</div>
			</div>
			<div class="row">
			<form action="index.php?r=<?=$rutaPagina?>" enctype="multipart/form-data" method="POST" class="col s12">
				<div class="row">
					<div class="input-field col s6">
					<input placeholder="Titulo" id="titulo" type="text" class="validate" name="txtTitulo" value="<?=$objNoticias->obtenerTitulo()?>">
						<label for="titulo">Titulo de la noticia</label>
					</div>
					<div class="input-field col s6">
						<select name="txtCategoria">
							<option value="">Seleccione una opcion</option>
								<?php foreach($listaCategoria as $clave => $valor){

								?>
									<option value="<?=$clave?>"><?=$valor?></option>
								<?PHP
									}
								?>
						</select>
						<label for="genero">Categoria</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s6">
						<input placeholder="Noticia" id="Noticia" type="text" class="validate" name="txtNoticia" value="<?=$objNoticias->obtenerNoticia()?>">
						<label for="Noticia">Noticia</label>
					</div>
				</div>
				<div class="file-field input-field">
					<div class="btn">
						<span>Imagen</span>
						<input type="file" name="imagen" multiple>
					</div>
					<div class="file-path-wrapper">
						<input class="file-path validate" type="text" placeholder="Subir un archivo">
					</div>
		    	</div>
				<button class="btn waves-effect waves-light" type="submit" name="accion" value="editar">Enviar
					<i class="material-icons right">send</i>
				</button>
			</form>
		</div>
	</div>
		</form>
	
	</div>
<?php
	}
?>
<!-- BORRAR -->
<?PHP 
	if(isset($_GET['accion']) && $_GET['accion'] == "borrar" && isset($_GET['noticia']) && $_GET['noticia'] != ""){
?>
	<div class="grey lighten-3 center-align">	
		<form action="index.php?r=<?=$rutaPagina?>" method="POST" class="col s12">
			<h3>Borrar Noticia</h3>
			<h4>Desea borrar la noticia<b><?=$_GET['noticia']?></b>?</h4>
			<input type="hidden" name="id" value="<?=$_GET['noticia']?>">
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
<!-- LISTAR -->
<table class="striped">
	<thead>

		<tr>
			<th class="" colspan=4>
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
			<th class="center">Titulo</th>
			<th class="center">Categoria</th>
			<th class="center">Noticia</th>
			<th class="center">ID</th>
			<th class="center">Imagen</th>
			<th class="center" style="width:200px">Botones</th>
		</tr>
	</thead>
	<tbody>
<?php
				foreach($listaNoticias AS $noticias){

?>
		<tr>
			<td class="center"><?=$noticias['titulo']?></td>
			<td class="center"><?=$noticias['categoria']?></td>
			<td class="center">
				<a class="waves-effect waves-light btn modal-trigger blue darken-5" href="#modal3">Noticia</a>
				<div id="modal3" class="modal">
					<div class="modal-content">
					<h4><b><?=$noticias['titulo']?></b></h4>
					<p><?=$noticias['noticia']?></p>
					</div>
					<div class="modal-footer">
					<a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
					</div>
				</div>		
			</td>
			<td class="center"><?=$noticias['id']?></td>
			<td class="center div-padre">
				<img src="archivos/imagenes/<?=$noticias['imagen']?>" style="width:280px;height:200px;">
			</td>
			<td>
				<div class="right">
					<a href="index.php?r=<?=$rutaPagina?>&accion=editar&noticia=<?=$noticias['id']?>" class="waves-effect waves-light btn blue darken-5">
						<i class="material-icons">edit</i>
					</a>
					<a href="index.php?r=<?=$rutaPagina?>&accion=borrar&noticia=<?=$noticias['id']?>" class="waves-effect waves-light btn red">
						<i class="material-icons">delete</i>
					</a>
				<div>
			</td>
		</tr>
<?php
	}
?>
<!-- BUSCAR -->
		<tr class="blue darken-4">
			<td colspan="6">
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