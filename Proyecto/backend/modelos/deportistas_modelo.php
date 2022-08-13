<?php

echo("hola");

	require_once("modelos/generico_modelo.php");
	class deportistas_modelo extends generico_modelo{


		protected $nombre;

		protected $apellido;

		protected $fechaNacimiento;

		protected $genero;
	
		protected $pais;

		protected $posicion;

		protected $numero;

		private $totalEnLista = 7;


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
		public function obtenerPais(){
			return $this->Pais;	
		}
		public function obtenerPosicion(){
			return $this->Posicion;	
		}
		public function obtenerNumero(){
			return $this->Numero;	
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
		}

// Funcion ingresar
		public function ingresar(){

			$arrayRespuesta = array("codigo"=>"", "mensaje"=>"");
			$sqlDuplicado = "SELECT count(*) AS total FROM deportistas WHERE nombre = :nombre";
			$arrayDuplicado = array("nombre" => $this->nombre);
			$lista = $this->traerListado($sqlDuplicado, $arrayDuplicado);
			$totalRegistros = $lista[0]['total'];
			
			if($totalRegistros > 0){
				$arrayRespuesta['codigo'] = "Error";
				$arrayRespuesta['mensaje'] = "Error el nombre ya se encuentra registrado";
				return $arrayRespuesta;
			}

			if(strlen($this->nombre) < 5 || strlen($this->nombre) > 10){
				$arrayRespuesta['codigo'] = "Error";
				$arrayRespuesta['mensaje'] = "El nombre tiene que ser mayor a 5 digitos y menos a 10 digitos";
				return $arrayRespuesta;
			}



			$sql = "INSERT INTO deportistas SET
						nombre = :nombre,
						apellido = :apellido,
						fechaNacimiento = :fechaNacimiento,
						genero = :genero,
						pais = :pais,
						posicion = :posicion,
						numero = :numero;
						estado = 1;";

			$arrayDatos = array(

				"nombre" 				=> $this->nombre,
				"apellido" 				=> $this->apellido,
				"fechaNacimiento" 		=> $this->fechaNacimiento,
				"genero" 				=> $this->genero,
				"pais" 					=> $this->pais,
				"posicion" 				=> $this->posicion,
				"numero" 				=> $this->numero,

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
		public function cargar($nombre){
			

			$sql = "SELECT * FROM deportistas WHERE nombre = :nombre";
			$arrayDatos = array("nombre" => $nombre);
			$lista = $this->traerListado($sql, $arrayDatos);

			if(isset($lista[0])){
				$this->nombre 				= $lista[0]['nombre'];
				$this->apellido 			= $lista[0]['apellido'];
				$this->fechaNacimiento 		= $lista[0]['fechaNacimiento'];
				$this->genero 				= $lista[0]['genero'];
				$this->pais 				= $lista[0]['pais'];	
				$this->posicion 			= $lista[0]['posicion'];	
				$this->numero				= $lista[0]['numero'];	
			}

		}

// Funcion borrar
		public function borrar(){
			
			$sql = "UPDATE deportistas SET estado = 0 WHERE nombre = :nombre";
			$arrayDatos = array("nombre" => $this->nombre);
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
			$sqlDuplicado = "SELECT count(*) AS total FROM deportistas WHERE nombre = :nombre";
			$arrayDuplicado = array("nombre" => $this->nombre);
			$lista = $this->traerListado($sqlDuplicado, $arrayDuplicado);
			$totalRegistros = $lista[0]['total'];
			
			if($totalRegistros == 0){
				$arrayRespuesta['codigo'] = "Error";
				$arrayRespuesta['mensaje'] = "Error el nombre no se encuentra registrado";
				return $arrayRespuesta;
			}

			if(strlen($this->nombre) < 5 || strlen($this->nombre) > 10){
				$arrayRespuesta['codigo'] = "Error";
				$arrayRespuesta['mensaje'] = "El nombre tiene que ser mayor a 5 digitos y menos a 10 digitos";
				return $arrayRespuesta;
			}

			$sql = "UPDATE deportistas SET
						nombre 		= :nombre,
						apellido	= :apellido,
						fechaNacimiento = :fechaNacimiento
					WHERE nombre = :nombre;";
			$arrayDatos = array(				
				"nombre" 		=> $this->nombre,
				"apellido" 		=> $this->apellido,
				"fechaNacimiento" => $this->fechaNacimiento,
			);
			$respuesta = $this->ejecutarConsulta($sql, $arrayDatos);

			if($respuesta){
				$arrayRespuesta['codigo'] = "OK";
				$arrayRespuesta['mensaje'] = "Deportista editado correctamente";
			}else{
				$arrayRespuesta['codigo'] = "Error";
				$arrayRespuesta['mensaje'] = "Error editanto deportista";
			}
			return $arrayRespuesta;


		}

// Funcion listar
		public function listar($filtros = array()){
			
			$sql = "SELECT * FROM deportistas WHERE estado = 1 ";

			// SELECT * FROM deportistas LIMIT 0,3
			// SELECT * FROM deportistas LIMIT 3,3
			// SELECT * FROM deportistas LIMIT 6,3
			if(isset($filtros['buscar']) && $filtros['buscar'] != ""){

				$sql .= " AND (nombre LIKE ('%".$filtros['buscar']."%')
							OR apellido LIKE ('%".$filtros['buscar']."%')
							OR nombre LIKE ('%".$filtros['buscar']."%')
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
							OR nombre LIKE ('%".$filtros['buscar']."%')
						)
					";
			}

			$lista = $this->traerListado($sql);
			$totalRegistros = $lista[0]['total'];
			$totalPaginas = ceil($totalRegistros/$this->totalEnLista);
			return $totalPaginas;

		}


	}






?>







