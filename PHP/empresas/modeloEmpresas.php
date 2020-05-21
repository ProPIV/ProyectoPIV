<?php
    require_once("../modeloAbstractoDB.php");
    class Empresas extends ModeloAbstractoDB {
		private $id_empresa;
		private $nombre_empresa;
		private $id_sede;
		private $id_proveedor;
		
		function __construct() {
			//$this->db_name = '';
		}

		public function getid_empresa(){
			return $this->id_empresa;
		}

		public function getnombre_empresa(){
			return $this->nombre_empresa;
		}
		
		public function getid_sede(){
			return $this->id_sede;
		}

		public function getid_proveedor(){
			return $this->id_proveedor;
		}

		public function consultar($id_empresa='') {
			if($id_empresa !=''):
				$this->query = "
				SELECT id_empresa, nombre_empresa, id_sede, id_proveedor
				FROM empresa
				WHERE id_empresa = '$id_empresa' order by id_empresa
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
			FROM empresa
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}
		
		public function nuevo($datos=array()) {
			if(array_key_exists('id_empresa', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$id_empresa= utf8_decode($nombre_empresa);
				$this->query = "
					INSERT INTO empresa
					(id_empresa, nombre_empresa, id_sede, id_proveedor)
					VALUES
					('$id_empresa', '$nombre_empresa', '$id_sede', '$id_proveedor')
					";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$id_empresa= utf8_decode($id_empresa);
			$this->query = "
			UPDATE empresa
			SET nombre_empresa='$nombre_empresa', id_sede='$id_sede', id_proveedor='$id_proveedor'
			WHERE id_empresa = '$id_empresa'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($id_empresa='') {
			$this->query = "
			DELETE FROM empresa
			WHERE id_empresa = '$id_empresa'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		function __destruct() {
			//unset($this);
		}

		
	}
	
?>
