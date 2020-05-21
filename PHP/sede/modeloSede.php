<?php
    require_once("../modeloAbstractoDB.php");
    class Sede extends ModeloAbstractoDB {
		private $id_sede;
		private $nombre_sede;
		private $id_municipio;
		
		function __construct() {
			//$this->db_name = '';
		}

		public function getid_sede(){
			return $this->id_sede;
		}

		public function getnombre_sede(){
			return $this->nombre_sede;
		}

		public function getid_municipio(){
			return $this->id_municipio;
		}
		


		public function consultar($id_sede='') {
			if($id_sede !=''):
				$this->query = "
				SELECT id_sede, nombre_sede, id_municipio
				FROM sede
				WHERE id_sede = '$id_sede' order by id_sede
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
			FROM sede
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}
		
		public function nuevo($datos=array()) {
			if(array_key_exists('id_sede', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$id_sede= utf8_decode($nombre_sede);
				$this->query = "
					INSERT INTO sede
					(id_sede, nombre_sede, id_municipio)
					VALUES
					('$id_sede', '$nombre_sede', '$id_municipio')
					";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$id_sede= utf8_decode($id_sede);
			$this->query = "
			UPDATE sede
			SET nombre_sede='$nombre_sede', id_municipio='$id_municipio'
			WHERE id_sede = '$id_sede'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($id_sede='') {
			$this->query = "
			DELETE FROM sede
			WHERE id_sede = '$id_sede'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		function __destruct() {
			//unset($this);
		}

		
	}
	
?>
