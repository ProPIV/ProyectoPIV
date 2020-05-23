<?php
    require_once("../modeloAbstractoDB.php");
    class Admin extends ModeloAbstractoDB {
		private $id_empleado;
		private $tipo_documento;
		private $documento;
		private $nombre_empleado;
		private $apellido;
		private $direccion;
		private $telefono;
		private $id_ciudad;
		private $id_unidad_organizacional;
		private $id_rol;

		
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
			SELECT id_empleado, tipo_documento, documento, nombre_empleado, apellido, direccion, telefono, c.nombre_ciudad, id_unidad_organizacional, id_rol
            FROM empleado as e inner join ciudad as c
			ON (e.id_ciudad = c.id_ciudad) order by id_empleado
			";
			$this->obtener_resultados_query();
			return $this->rows;
			
		}
		
		public function nuevo($datos=array()) {
			if(array_key_exists('id_empleado', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$id_empleado= utf8_decode($id_empleado);
				$this->query = "
					INSERT INTO empleado
					(tipo_documento, documento, nombre_empleado, apellido, direccion, telefono, id_ciudad, id_unidad_organizacional, id_rol)
					VALUES
					('$tipo_documento','$documento','$nombre_empleado','$apellido','$direccion','$telefono','$id_ciudad','$id_unidad_organizacional','$id_rol')
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
		
		function __destruct() {
			//unset($this);
		}
	}
?>