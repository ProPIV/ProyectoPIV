<?php
    require_once("../modeloAbstractoDB.php");
    class Proceso extends ModeloAbstractoDB {
		private $id_proceso;
		private $nombre_proceso;
		private $Descripcion;
		
		function __construct() {
			
		}

		public function getID_PROCESO(){
			return $this->id_proceso;
		}

		public function getNOMBRE_PROCESO(){
			return $this->nombre_proceso;
		}
		
		public function getDESCRIPCION(){
			return $this->Descripcion;
		}

		public function consultar($id_proceso='') {
			if($id_proceso !=''):
				$this->query = "
				SELECT id_proceso, nombre_proceso, Descripcion
				FROM proceso
				WHERE id_proceso = '$id_proceso' order by id_proceso
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
			FROM proceso
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}
		
		public function nuevo($datos=array()) {
			if(array_key_exists('id_proceso', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$nombre_proceso= utf8_decode($nombre_proceso);
				$this->query = "
					INSERT INTO proceso
					(id_proceso, nombre_proceso, Descripcion)
					VALUES
					('$id_proceso', '$nombre_proceso', '$Descripcion')
					";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$nombre_proceso= utf8_decode($nombre_proceso);
			$this->query = "
			UPDATE proceso
			SET nombre_proceso='$nombre_proceso', Descripcion='$Descripcion'
			WHERE id_proceso = '$id_proceso'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($id_proceso='') {
			$this->query = "
			DELETE FROM proceso
			WHERE id_proceso = '$id_proceso'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		function __destruct() {
			//unset($this);
		}
	}
?>