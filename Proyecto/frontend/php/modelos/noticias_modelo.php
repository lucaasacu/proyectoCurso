<?php


	require_once("php/modelos/generico_modelo.php");
	class noticias_modelo extends generico_modelo{


		protected $id;

		protected $categoria;

		protected $titulo;

		protected $noticia;
	
		protected $estado;
		
		protected $imagen;

		protected $fechaPublicacion;

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
		public function obtenerImagen(){
			return $this->imagen;	
		}
		public function obtenerFechaPublicacion(){
			return $this->fechaPublicacion;	
		}

// Funcion constructor
		public function constructor($data = array()){

			$this->id					= $data['id'];
			$this->categoria			= $data['categoria'];
			$this->titulo 				= $data['titulo'];
			$this->noticia				= $data['noticia'];
			$this->fechaPublicacion		= $data['fechaPublicacion'];
			$this->imagen 				= $data['imagen'];
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
				$this->fechaPublicacion 	= $lista[0]['fechaPublicacion'];
				$this->imagen 				= $lista[0]['imagen'];	

			}

		}
// Funcion listar
		public function listar($filtros = array()){
			
			$sql = "SELECT * FROM noticias WHERE estado = 1 ";
			
			if(isset($filtros['buscar']) && $filtros['buscar'] != ""){

				$sql .= " AND (titulo LIKE ('%".$filtros['buscar']."%')
							OR categoria LIKE ('%".$filtros['buscar']."%')
							OR id LIKE ('%".$filtros['buscar']."%')
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

		public function listaCategorias(){

			$arrayCategoria = array();
			$arrayCategoria['Resultados'] 		= "Resultados";
			$arrayCategoria['Jugadores'] 		= "Jugadores";
			$arrayCategoria['Internacional'] 	= "Internacional";
			$arrayCategoria['Mercado'] 			= "Mercado";
			$arrayCategoria['Sociales'] 		= "Sociales";
			return $arrayCategoria;
	
		}


		public function listaCat(){

			$arrayNoticia=array();

			$sql = "SELECT * FROM noticias WHERE estado = 1 ";
			$lista = $this->traerListado($sql);

			foreach($lista as $noticia){

				$clave = strtolower(trim($noticia['categoria']));

				$arrayNoticia[$clave][$noticia['id']]=$noticia;

			}



			return $arrayNoticia;





		}


}

?>







