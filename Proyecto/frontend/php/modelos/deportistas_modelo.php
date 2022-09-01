<?php


	require_once("php/modelos/generico_modelo.php");
	class deportistas_modelo extends generico_modelo{


		protected $nombre;

		protected $apellido;

		protected $fechaNacimiento;

		protected $genero;
	
		protected $pais;

		protected $posicion;

		protected $numero;

		protected $estado;

		protected $imagen;

		private $totalEnLista = 4;


		public function obtenerNombre(){
			return $this->nombre;	
		}
		public function obtenerApellido(){
			return $this->apellido;	
		}
		public function obtenerfechaNacimiento(){
			return $this->fechaNacimiento;	
		}
		public function obtenerGenero(){
			return $this->genero;	
		}
		public function obtenerTipoGenero(){
			return $this->tipoGenero;	
		}
		public function obtenerPais(){
			return $this->pais;	
		}
		public function obtenerPosicion(){
			return $this->posicion;	
		}
		public function obtenerNumero(){
			return $this->numero;	
		}
		public function obtenerImagen(){
			return $this->imagen;	
		}
// Funcion constructor
		public function constructor($data = array()){

			$this->nombre 				= $data['nombre'];
			$this->apellido 			= $data['apellido'];
			$this->fechaNacimiento 		= $data['fechaNacimiento'];
			$this->genero 				= $data['genero'];
			$this->pais 				= $data['pais'];
			$this->posicion 			= $data['posicion'];
			$this->numero 				= $data['numero'];
			$this->imagen 				= $data['imagen'];
		}


// Funcion cargar
		public function cargar($numero){
			

			$sql = "SELECT * FROM deportistas WHERE numero = :numero";
			$arrayDatos = array("numero" => $numero);
			$lista = $this->traerListado($sql, $arrayDatos);

			if(isset($lista[0])){
				$this->nombre 				= $lista[0]['nombre'];
				$this->apellido 			= $lista[0]['apellido'];
				$this->fechaNacimiento 		= $lista[0]['fechaNacimiento'];
				$this->genero 				= $lista[0]['genero'];
				$this->pais 				= $lista[0]['pais'];	
				$this->posicion 			= $lista[0]['posicion'];	
				$this->numero				= $lista[0]['numero'];
				$this->estado 				= $lista[0]['estado'];	
				$this->imagen 				= $lista[0]['imagen'];
			}

		}
// Funcion listar
		public function listar($filtros = array()){
			
			$sql = "SELECT * FROM deportistas WHERE estado = 1 ";
			
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

			$sql = "SELECT count(*)  total FROM deportistas 
						WHERE estado = 1 ";

			if(isset($filtros['buscar']) && $filtros['buscar'] != ""){

				$sql .= " AND (nombre LIKE ('%".$filtros['buscar']."%')
							OR apellido LIKE ('%".$filtros['buscar']."%')
							OR numero LIKE ('%".$filtros['buscar']."%')
						)
					";
			}

			$lista = $this->traerListado($sql);
			$totalRegistros = $lista[0]['total'];
			$totalPaginas = ceil($totalRegistros/$this->totalEnLista);
			return $totalPaginas;

		}
		public function listaTipoGenero(){

			$arrayGenero = array();
			$arrayGenero['Masculino'] = "Masculino";
			$arrayGenero['Femenino'] = "Femenino";
			$arrayGenero['Otros'] = "Otros";
			return $arrayGenero;
	
		}



		public function listarPosicion(){

			$arrayDeportista=array();

			$sql = "SELECT * FROM deportistas WHERE estado = 1 ";
			$lista = $this->traerListado($sql);

			foreach($lista as $deportista){

				$clave = strtolower(trim($deportista['posicion']));

				$arrayDeportista[$clave][$deportista['numero']]=$deportista;

			}



			return $arrayDeportista;





		}

	}

	






?>







