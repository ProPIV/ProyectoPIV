<?php
    require_once("../modeloAbstractoDB.php");
    class Admin extends ModeloAbstractoDB {
		private $id_empleado;
		private $tipo_documento;
		private $documento;
		private $nombre_empleado;
		private $apellido;
		private $usuario;
		private $password;
		private $direccion;
		private $telefono;
		private $id_ciudad;
		private $id_unidad_organizacional;
		private $id_rol;
		private $id_empresa;
		private $id_permiso;
		private $pass_cifrado;
		
		function __construct() {
			//$this->db_name = '';
		}

		public function getid_empleado(){
			return $this->id_empleado;
		}

		public function gettipo_documento(){
			return $this->tipo_documento;
		}
		
		public function getdocumento(){
			return $this->documento;
		}

		public function getnombre_empleado(){
			return $this->nombre_empleado;
		}

		public function getapellido(){
			return $this->apellido;
		}

		public function getusuario(){
			return $this->usuario;
		}

		public function getpassword(){
			return $this->password;
		}

		public function getdireccion(){
			return $this->direccion;
		}

		public function gettelefono(){
			return $this->telefono;
		}

		public function getid_ciudad(){
			return $this->id_ciudad;
		}

		public function getnombre_proveedor(){
			return $this->nombre_proveedor;
		}
		
		public function getid_unidad_organizacional(){
			return $this->id_unidad_organizacional;
		}

		public function getid_rol(){
			return $this->id_rol;
		}

		public function getid_empresa(){
			return $this->id_empresa;
		}

		public function getid_permiso(){
			return $this->id_permiso;
		}
		
		public function consultar($id_empleado='') {
			if($id_empleado !=''):
				$this->query = "
				SELECT *
				FROM empleado
				WHERE id_empleado = '$id_empleado' order by id_empleado
				";
				$this->obtener_resultados_query();
			endif;
			if(count($this->rows) == 1):
				foreach ($this->rows[0] as $propiedad=>$valor):
					$this->$propiedad = $valor;
				endforeach;
			endif;
		}
		
		public function lista() {
			$this->query = "
			SELECT id_empleado, tipo_documento, documento, nombre_empleado, apellido, usuario, password, direccion, telefono, c.nombre_ciudad, u.nombre_unidad_organizacional, r.nombre_rol, em.nombre_empresa, p.nombre_permiso
			FROM empleado as e 
			inner join ciudad as c ON (e.id_ciudad = c.id_ciudad)
			inner join unidad_organizacional as u ON (e.id_unidad_organizacional = u.id_unidad_organizacional )
			inner join rol as r ON (e.id_rol  = r.id_rol ) 
			inner join empresa as em ON (e.id_empresa  = em.id_empresa ) 
            inner join permiso as p ON (e.id_permiso  = p.id_permiso ) 
			order by id_empleado
			";
			$this->obtener_resultados_query();
			return $this->rows;
			
		}
		
		public function nuevo($datos=array()) {
			if(array_key_exists('id_empleado', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$pass_cifrado=password_hash($password, PASSWORD_DEFAULT);
				$id_empleado= utf8_decode($id_empleado);
				$this->query = "
					INSERT INTO empleado
					(tipo_documento, documento, nombre_empleado, apellido, usuario, password, direccion, telefono, id_ciudad, id_unidad_organizacional, id_rol, id_empresa, id_permiso)
					VALUES
					('$tipo_documento','$documento','$nombre_empleado','$apellido','$usuario','$pass_cifrado','$direccion','$telefono','$id_ciudad','$id_unidad_organizacional','$id_rol','$id_empresa','$id_permiso')
					";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$nombre_proveedor= utf8_decode($nombre_proveedor);
			$this->query = "
			UPDATE empleado
			SET tipo_documento='$tipo_documento',
			documento='$documento',
			nombre_empleado='$nombre_empleado',
			apellido='$apellido',
			telefono='$telefono',
			id_ciudad='$id_ciudad',
			id_unidad_organizacional='$id_unidad_organizacional',
			id_rol='$id_rol',
			WHERE id_empleado = '$id_empleado'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($id_empleado='') {
			$this->query = "
			DELETE FROM empleado
			WHERE id_empleado = '$id_empleado'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function ciudad() {
			$this->query = "
			SELECT *
			FROM ciudad 
			";
			$this->obtener_resultados_query();
			return $this->rows;
		}

		public function unidad() {
			$this->query = "
			SELECT *
			FROM unidad_organizacional 
			";
			$this->obtener_resultados_query();
			return $this->rows;
		}

		public function rol() {
			$this->query = "
			SELECT *
			FROM rol 
			";
			$this->obtener_resultados_query();
			return $this->rows;
		}

		public function empresa() {
			$this->query = "
			SELECT *
			FROM empresa 
			";
			$this->obtener_resultados_query();
			return $this->rows;
		}

		public function permiso() {
			$this->query = "
			SELECT *
			FROM permiso 
			";
			$this->obtener_resultados_query();
			return $this->rows;
		}

		function __destruct() {
			//unset($this);
		}
	}
?>