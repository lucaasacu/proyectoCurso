<?php


	require_once("modelos/generico_modelo.php");
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

// Funcion ingresar
		public function ingresar(){

			$arrayRespuesta = array("codigo"=>"", "mensaje"=>"");
			$sqlDuplicado = "SELECT count(*) AS total FROM deportistas WHERE numero = :numero";
			$arrayDuplicado = array("numero" => $this->numero);
			$lista = $this->traerListado($sqlDuplicado, $arrayDuplicado);
			$totalRegistros = $lista[0]['total'];
			
			if($totalRegistros > 0){
				$arrayRespuesta['codigo'] = "Error";
				$arrayRespuesta['mensaje'] = "Error el numero ya se encuentra registrado";
				return $arrayRespuesta;
			}
			$sql = "INSERT INTO deportistas SET
						nombre 		= :nombre,
						apellido = :apellido,
						fechaNacimiento = :fechaNacimiento,
						genero = :genero,
						pais = :pais,
						posicion = :posicion,
						numero = :numero,
						imagen 	= :imagen,
						estado = 1;";

			$arrayDatos = array(

				"nombre" 				=> $this->nombre,
				"apellido" 				=> $this->apellido,
				"fechaNacimiento" 		=> $this->fechaNacimiento,
				"genero" 				=> $this->genero,
				"pais" 					=> $this->pais,
				"posicion" 				=> $this->posicion,
				"numero" 				=> $this->numero,
				"imagen" 				=> $this->imagen,

			);

			$respuesta = $this->ejecutarConsulta($sql, $arrayDatos);

			
			if($respuesta){
				$arrayRespuesta['codigo'] = "OK";
				$arrayRespuesta['mensaje'] = "El deportista fue ingresado";
			}else{
				$arrayRespuesta['codigo'] = "Error";
				$arrayRespuesta['mensaje'] = "Error al ingresar deportista";
			}
			return $arrayRespuesta;
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

// Funcion borrar
		public function borrar(){
			
			$sql = "UPDATE deportistas SET estado = 0 WHERE numero = :numero";
			$arrayDatos = array("numero" => $this->numero);
			$respuesta = $this->ejecutarConsulta($sql, $arrayDatos);
			
			if($respuesta){
				$arrayRespuesta['codigo'] = "OK";
				$arrayRespuesta['mensaje'] = "Deportista eliminado correctamente";
			}else{
				$arrayRespuesta['codigo'] = "Error";
				$arrayRespuesta['mensaje'] = "Error al eliminar deportista";
			}
			return $arrayRespuesta;

		}
// Funcion editar
		public function editar(){

			$arrayRespuesta = array("codigo"=>"", "mensaje"=>"");
			$sqlDuplicado = "SELECT count(*) AS total FROM deportistas WHERE numero = :numero";
			$arrayDuplicado = array("numero" => $this->numero);
			$lista = $this->traerListado($sqlDuplicado, $arrayDuplicado);
			$totalRegistros = $lista[0]['total'];
			
			if($totalRegistros == 0){
				$arrayRespuesta['codigo'] = "Error";
				$arrayRespuesta['mensaje'] = "Error el numero no se encuentra registrado";
				return $arrayRespuesta;
			}

			$sql = "UPDATE deportistas SET
						nombre 		= :nombre,
						apellido	= :apellido,
						posicion	= :posicion
					WHERE numero = :numero;";
			$arrayDatos = array(				
				"nombre" 		=> $this->nombre,
				"apellido" 		=> $this->apellido,
				"posicion" 		=> $this->posicion,
				"numero" 		=> $this->numero,
			);
			$respuesta = $this->ejecutarConsulta($sql, $arrayDatos);

			if($respuesta){
				$arrayRespuesta['codigo'] = "OK";
				$arrayRespuesta['mensaje'] = "Se edito el deportista correctamente";
			}else{
				$arrayRespuesta['codigo'] = "Error";
				$arrayRespuesta['mensaje'] = "Error al editar deportista";
			}
			return $arrayRespuesta;
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

	}








?>







