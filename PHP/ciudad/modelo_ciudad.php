<?php
    require_once("../modeloAbstractoDB.php");
    class ciudad extends ModeloAbstractoDB {
		private $id_ciudad;
		private $nombre_ciudad;
		//private $id_pais;
		
		function __construct() {
			//$this->db_name = '';
		}

		public function getnombre_ciudad(){
			return $this->nombre_ciudad;
		}
		

		public function getid_ciudad(){
			return $this->id_ciudad;
		}

		public function getid_pais(){
			return $this->id_pais;
		}



		public function consultar($id_ciudad='') {
			if($id_ciudad !=''):
				$this->query = "
				SELECT id_ciudad, nombre_ciudad, id_pais
				FROM ciudad
				WHERE id_ciudad = '$id_ciudad' order by id_ciudad
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
			SELECT id_ciudad,nombre_ciudad, id_pais 
			FROM ciudad 
	
			";
			$this->obtener_resultados_query();
			return $this->rows;
			
		}


		
		public function nuevo($datos=array()) {
			if(array_key_exists('id_ciudad', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$id_ciudad= utf8_decode($id_ciudad);
				$this->query = "
					INSERT INTO ciudad
					(id_ciudad, nombre_ciudad,id_pais)
					VALUES
					('$id_ciudad', '$nombre_ciudad', '$id_pais')
					";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$nombre_ciudad= utf8_decode($nombre_ciudad);
			$this->query = "
			UPDATE ciudad
			SET nombre_ciudad='$nombre_ciudad', id_pais='$id_pais'
			WHERE id_ciudad = '$id_ciudad'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($id_ciudad='') {
			$this->query = "
			DELETE FROM ciudad
			WHERE id_ciudad = '$id_ciudad'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		function __destruct() {
			//unset($this);
		}
	}
?>