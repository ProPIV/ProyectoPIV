<?php
    require_once("../modeloAbstractoDB.php");
    class Organizaciones extends ModeloAbstractoDB {
		private $id_unidad_organizacional;
		private $nombre_unidad_organizacional;
		private $nombre_empresa;
		
		function __construct() {
			//$this->db_name = '';
		}

		public function getid_unidad_organizacional(){
			return $this->id_unidad_organizacional;
		}

		public function getnombre_unidad_organizacional(){
			return $this->nombre_unidad_organizacional;
		}

		public function getnombre_empresa(){
			return $this->nombre_empresa;
		}
		


		public function consultar($id_unidad_organizacional='') {
			if($id_unidad_organizacional !=''):
				$this->query = "
				SELECT id_unidad_organizacional, nombre_unidad_organizacional, id_empresa
				FROM unidad_organizacional
				WHERE id_unidad_organizacional = '$id_unidad_organizacional' order by id_unidad_organizacional
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
			SELECT id_unidad_organizacional, nombre_unidad_organizacional, em.nombre_empresa
			FROM unidad_organizacional as e 
            inner join empresa as em ON (em.id_empresa  = e.id_empresa ) 
			order by id_unidad_organizacional
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}
		
		public function nuevo($datos=array()) {
			if(array_key_exists('id_unidad_organizacional', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$id_unidad_organizacional= utf8_decode($nombre_unidad_organizacional);
				$this->query = "
					INSERT INTO unidad_organizacional
					(id_unidad_organizacional, nombre_unidad_organizacional, id_empresa)
					VALUES
					('$id_unidad_organizacional', '$nombre_unidad_organizacional', '$id_empresa')
					";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$id_unidad_organizacional= utf8_decode($id_unidad_organizacional);
			$this->query = "
			UPDATE unidad_organizacional
			SET nombre_unidad_organizacional='$nombre_unidad_organizacional', id_empresa='$id_empresa'
			WHERE id_unidad_organizacional = '$id_unidad_organizacional'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($id_unidad_organizacional='') {
			$this->query = "
			DELETE FROM unidad_organizacional
			WHERE id_unidad_organizacional = '$id_unidad_organizacional'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		function __destruct() {
			//unset($this);
		}

		
	}
	
?>
