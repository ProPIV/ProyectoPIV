<?php
    require_once("../modeloAbstractoDB.php");
    class Contratos extends ModeloAbstractoDB {
		private $id_contrato;
		private $id_empleado;
		private $fecha_ini;
		private $fecha_fin;
		private $id_tipo_contrato;
		private $id_proveedor;
		
		function __construct() {
			//$this->db_name = '';
		}

		public function getID_CONTRATO(){
			return $this->id_contrato;
		}

		public function getID_EMPLEADO(){
			return $this->id_empleado;
		}
		
		public function getFECHA_INI(){
			return $this->fecha_ini;
		}

		public function getFECHA_FIN(){
			return $this->fecha_fin;
		}

		public function getID_TIPO_CONTRATO(){
			return $this->id_tipo_contrato;
		}
		
		public function getID_PROVEEDOR(){
			return $this->id_proveedor;
		}

		public function consultar($id_contrato='') {
			if($id_contrato !=''):
				$this->query = "
				SELECT *
				FROM contrato
				WHERE id_contrato = '$id_contrato' order by id_contrato
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
			SELECT *
			FROM contrato 
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}
		
		public function nuevo($datos=array()) {
			if(array_key_exists('id_contrato', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$id_empleado= utf8_decode($id_empleado);
				$this->query = "
					INSERT INTO contrato
					(id_contrato, id_empleado, fecha_ini, fecha_fin, id_tipo_contrato, id_proveedor)
					VALUES
					(NULL, '$id_empleado', '$fecha_ini', '$fecha_fin', '$id_tipo_contrato', '$id_proveedor')
					";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$id_empleado= utf8_decode($id_empleado);
			$this->query = "
			UPDATE contrato
			SET id_empleado='$id_empleado',
			fecha_ini='$fecha_ini',
			fecha_fin='$fecha_fin',
			id_tipo_contrato='$id_tipo_contrato',
			id_proveedor='$id_proveedor'
			WHERE id_contrato = '$id_contrato'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($id_contrato='') {
			$this->query = "
			DELETE FROM contrato
			WHERE id_contrato = '$id_contrato'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		function __destruct() {
			//unset($this);
		}
	}
?>