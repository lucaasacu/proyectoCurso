<?php

	require_once("php/modelos/generico_modelo.php");
	class usuarios_modelo extends generico_modelo{

		protected $email;

		protected $nombre;

		protected $apellido;

		protected $estado;

		private $totalEnLista = 6;


		public function obtenerEmail(){
			return $this->email;	
		}
		public function obtenerNombre(){
			return $this->nombre;	
		}
		public function obtenerApellido(){
			return $this->apellido;	
		}


		public function constructor($data = array()){

			$this->email 			= $data['email'];
			$this->nombre 			= $data['nombre'];
			$this->apellido 		= $data['apellido'];

		}


		public function ingresar(){

			$arrayRespuesta = array("codigo"=>"", "mensaje"=>"");
			$sqlDuplicado = "SELECT count(*) AS total FROM usuarios WHERE email = :email";
			$arrayDuplicado = array("email" => $this->email);
			$lista = $this->traerListado($sqlDuplicado, $arrayDuplicado);
			$totalRegistros = $lista[0]['total'];
			
			if($totalRegistros > 0){
				$arrayRespuesta['codigo'] = "Error";
				$arrayRespuesta['mensaje'] = "Error el usuario ya se encuentra registrado";
				return $arrayRespuesta;
			}



			$sql = "INSERT INTO usuarios SET
						email		= :email,
						nombre 		= :nombre,
						apellido	= :apellido,
						estado 		= 1;";
			$arrayDatos = array(

				"email" 		=> $this->email,
				"nombre" 		=> $this->nombre,
				"apellido" 		=> $this->apellido,

			);
			$respuesta = $this->ejecutarConsulta($sql, $arrayDatos);

			
			if($respuesta){
				$arrayRespuesta['codigo'] = "OK";
				$arrayRespuesta['mensaje'] = "Se registro el usuario correctamente";
			}else{
				$arrayRespuesta['codigo'] = "Error";
				$arrayRespuesta['mensaje'] = "Error al registrar el usuario";
			}
			return $arrayRespuesta;


		}

		public function cargar($email){
			

			$sql = "SELECT * FROM usuarios WHERE email = :email";
			$arrayDatos = array("email" => $email);
			$lista = $this->traerListado($sql, $arrayDatos);

			if(isset($lista[0])){
				$this->email 			= $lista[0]['email'];
				$this->nombre 			= $lista[0]['nombre'];
				$this->apellido 		= $lista[0]['apellido'];
				$this->estado 			= $lista[0]['estado'];	
			}

		}

		public function editar(){

			$arrayRespuesta = array("codigo"=>"", "mensaje"=>"");
			$sqlDuplicado = "SELECT count(*) AS total FROM usuarios WHERE email = :email";
			$arrayDuplicado = array("email" => $this->email);
			$lista = $this->traerListado($sqlDuplicado, $arrayDuplicado);
			$totalRegistros = $lista[0]['total'];
			
			if($totalRegistros == 0){
				$arrayRespuesta['codigo'] = "Error";
				$arrayRespuesta['mensaje'] = "Error el email no se encuentra registrado";
				return $arrayRespuesta;
			}

			$sql = "UPDATE usuarios SET
						nombre 		= :nombre,
						apellido	= :apellido,
					WHERE email = :email;";
			$arrayDatos = array(				
				"nombre" 		=> $this->nombre,
				"apellido" 		=> $this->apellido,
				"email" 		=> $this->email,
			);
			$respuesta = $this->ejecutarConsulta($sql, $arrayDatos);

			if($respuesta){
				$arrayRespuesta['codigo'] = "OK";
				$arrayRespuesta['mensaje'] = "Usuario editado correctamente";
			}else{
				$arrayRespuesta['codigo'] = "Error";
				$arrayRespuesta['mensaje'] = "Error editando el usuario";
			}
			return $arrayRespuesta;


		}

		/*public function listaTipoDocumento(){

			$arrayTipoDocumento = array();
			$arrayTipoDocumento['CI'] = "CI";
			$arrayTipoDocumento['Pasaporte'] = "Pasaporte";
			return $arrayTipoDocumento;

		}*/

		public function login($email, $clave){

			$claveMD5 = md5($clave);
			$sql = "SELECT * FROM usuarios WHERE email = :email AND clave = :clave";
			$arrayDatos = array("email" => $email, "clave" => $claveMD5);
			$lista = $this->traerListado($sql, $arrayDatos);

			if(isset($lista[0])){
				$this->nombre 			= $lista[0]['nombre'];
				$this->apellido 		= $lista[0]['apellido'];
				$this->email 			= $lista[0]['email'];
				$this->estado 			= $lista[0]['estado'];	
				$retorno = true;
			}else{
				$retorno = false;
			}
			return $retorno;

		}

	}


?>








