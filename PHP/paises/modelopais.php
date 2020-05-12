<?php
    require_once("../modeloAbstractoDB.php");
    class Pais extends ModeloAbstractoDB {
		private $id_pais;
		private $nombre_pais;
		
		function __construct() {
			//$this->db_name = '';
		}

		public function getid_pais(){
			return $this->id_pais;
		}

		public function getnombre_pais(){
			return $this->nombre_pais;
		}
		


		public function consultar($id_pais='') {
			if($id_pais !=''):
				$this->query = "
				SELECT id_pais, nombre_pais
				FROM pais
				WHERE id_pais = '$id_pais' order by id_pais
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
			FROM pais
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}
		
		public function nuevo($datos=array()) {
			if(array_key_exists('id_pais', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$id_pais= utf8_decode($nombre_pais);
				$this->query = "
					INSERT INTO pais
					(id_pais, nombre_pais)
					VALUES
					('$id_pais', '$nombre_pais')
					";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$id_pais= utf8_decode($id_pais);
			$this->query = "
			UPDATE pais
			SET nombre_pais='$nombre_pais'
			WHERE id_pais = '$id_pais'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($id_pais='') {
			$this->query = "
			DELETE FROM pais
			WHERE id_pais = '$id_pais'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		function __destruct() {
			//unset($this);
		}
	}
?>