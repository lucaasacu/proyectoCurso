<?php


	require_once("modelos/generico_modelo.php");
	class noticias_modelo extends generico_modelo{


		protected $id;

		protected $categoria;

		protected $titulo;

		protected $noticia;
	
		protected $estado;

		private $totalEnLista = 4;


		public function obtenerId(){
			return $this->id;	
		}
		public function obtenerCategoria(){
			return $this->categoria;	
		}
		public function obtenerTitulo(){
			return $this->titulo;	
		}
		public function obtenerNoticia(){
			return $this->noticia;	
		}

// Funcion constructor
		public function constructor($data = array()){

			$this->id					= $data['id'];
			$this->categoria			= $data['categoria'];
			$this->titulo 				= $data['titulo'];
			$this->noticia				= $data['noticia'];
		}

// Funcion ingresar
		public function ingresar(){

			$arrayRespuesta = array("codigo"=>"", "mensaje"=>"");
			$sqlDuplicado = "SELECT count(*) AS total FROM noticias WHERE id = :id";
			$arrayDuplicado = array("id" => $this->id);
			$lista = $this->traerListado($sqlDuplicado, $arrayDuplicado);
			$totalRegistros = $lista[0]['total'];
			
			if($totalRegistros > 0){
				$arrayRespuesta['codigo'] = "Error";
				$arrayRespuesta['mensaje'] = "Error la noticia ya se encuentra guardada";
				return $arrayRespuesta;
			}
			$sql = "INSERT INTO noticias SET
						id 			= :id,
						categoria 	= :categoria,
						titulo		= :titulo,
						noticia 	= :noticia,
						estado = 1;";

			$arrayDatos = array(

				"id" 					=> $this->id,
				"categoria" 			=> $this->categoria,
				"titulo" 				=> $this->titulo,
				"noticia" 				=> $this->noticia,
			);

			$respuesta = $this->ejecutarConsulta($sql, $arrayDatos);

			
			if($respuesta){
				$arrayRespuesta['codigo'] = "OK";
				$arrayRespuesta['mensaje'] = "La noticia fue ingresada";
			}else{
				$arrayRespuesta['codigo'] = "Error";
				$arrayRespuesta['mensaje'] = "Error al ingresar la noticia";
			}
			return $arrayRespuesta;
		}
// Funcion cargar
		public function cargar($id){
			

			$sql = "SELECT * FROM noticias WHERE id = :id";
			$arrayDatos = array("id" => $id);
			$lista = $this->traerListado($sql, $arrayDatos);

			if(isset($lista[0])){
				$this->id 					= $lista[0]['id'];
				$this->categoria			= $lista[0]['categoria'];
				$this->titulo 				= $lista[0]['titulo'];
				$this->noticia 				= $lista[0]['noticia'];
				$this->estado 				= $lista[0]['estado'];	

			}

		}

// Funcion borrar
		public function borrar(){
			
			$sql = "UPDATE noticias SET estado = 0 WHERE id = :id";
			$arrayDatos = array("id" => $this->id);
			$respuesta = $this->ejecutarConsulta($sql, $arrayDatos);
			
			if($respuesta){
				$arrayRespuesta['codigo'] = "OK";
				$arrayRespuesta['mensaje'] = "Noticia eliminada correctamente";
			}else{
				$arrayRespuesta['codigo'] = "Error";
				$arrayRespuesta['mensaje'] = "Error eliminando la noticia";
			}
			return $arrayRespuesta;

		}
// Funcion editar
		public function editar(){

			$arrayRespuesta = array("codigo"=>"", "mensaje"=>"");
			$sqlDuplicado = "SELECT count(*) AS total FROM noticias WHERE id = :id";
			$arrayDuplicado = array("id" => $this->id);
			$lista = $this->traerListado($sqlDuplicado, $arrayDuplicado);
			$totalRegistros = $lista[0]['total'];
			
			if($totalRegistros == 0){
				$arrayRespuesta['codigo'] = "Error";
				$arrayRespuesta['mensaje'] = "Error la noticia no se encuentra registrada";
				return $arrayRespuesta;
			}

			$sql = "UPDATE noticias SET
						categoria 		= :categoria,
						titulo			= :titulo,
						noticia			= :noticia
					WHERE id = :id;";
			$arrayDatos = array(
				"id" 					=> $this->id,
				"categoria" 			=> $this->categoria,
				"titulo" 				=> $this->titulo,
				"noticia" 				=> $this->noticia,
			);
			$respuesta = $this->ejecutarConsulta($sql, $arrayDatos);

			if($respuesta){
				$arrayRespuesta['codigo'] = "OK";
				$arrayRespuesta['mensaje'] = "Se edito la noticia correctamente";
			}else{
				$arrayRespuesta['codigo'] = "Error";
				$arrayRespuesta['mensaje'] = "Error al editar la noticia";
			}
			return $arrayRespuesta;
		}

// Funcion listar
		public function listar($filtros = array()){
			
			$sql = "SELECT * FROM noticias WHERE estado = 1 ";
			
			if(isset($filtros['buscar']) && $filtros['buscar'] != ""){

				$sql .= " AND (nombre LIKE ('%".$filtros['buscar']."%')
							OR apellido LIKE ('%".$filtros['buscar']."%')
							OR numero LIKE ('%".$filtros['buscar']."%')
						)
					";
			}

			if(isset($filtros['pagina']) && $filtros['pagina'] != ""){
				$pagina = $filtros['pagina'] * $this->totalEnLista;
				$sql .= " LIMIT ".$pagina.",".$this->totalEnLista."";
			}else{
				$sql .= " LIMIT 0,".$this->totalEnLista;
			}
			$lista = $this->traerListado($sql);
			return $lista;

		}
// Funcion total de paginas
		public function totalPaginas($filtros = array()){

			$sql = "SELECT count(*)  total FROM noticias 
						WHERE estado = 1 ";

			if(isset($filtros['buscar']) && $filtros['buscar'] != ""){

				$sql .= " AND (titulo LIKE ('%".$filtros['buscar']."%')
							OR categoria LIKE ('%".$filtros['buscar']."%')
						)
					";
			}

			$lista = $this->traerListado($sql);
			$totalRegistros = $lista[0]['total'];
			$totalPaginas = ceil($totalRegistros/$this->totalEnLista);
			return $totalPaginas;

		}

/* LISTA PARA CATEGORIAS

		public function listaTipoGenero(){

			$arrayGenero = array();
			$arrayGenero['Masculino'] = "Masculino";
			$arrayGenero['Femenino'] = "Femenino";
			$arrayGenero['Otros'] = "Otros";
			return $arrayGenero;
	
		}

	}

*/



}

?>







