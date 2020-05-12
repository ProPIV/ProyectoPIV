<?php
    require_once("../modeloAbstractoDB.php");
    class departamento extends ModeloAbstractoDB {
		private $id_departamento;
		private $nombre_departamento;
		//private $id_pais;
		
		function __construct() {
			//$this->db_name = '';
		}

		public function getnombre_departamento(){
			return $this->nombre_departamento;
		}
		

		public function getid_departamento(){
			return $this->id_departamento;
		}

		public function getid_pais(){
			return $this->id_pais;
		}



		public function consultar($id_departamento='') {
			if($id_departamento !=''):
				$this->query = "
				SELECT id_departamento, nombre_departamento, id_pais
				FROM departamento
				WHERE id_departamento = '$id_departamento' order by id_departamento
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
			SELECT id_departamento,nombre_departamento,id_pais 
			FROM departamento ORDER BY id_departamento
					
			";
			
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}
		
		public function nuevo($datos=array()) {
			if(array_key_exists('id_departamento', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$id_departamento= utf8_decode($id_departamento);
				$this->query = "
					INSERT INTO departamento
					(id_departamento, nombre_departamento,id_pais)
					VALUES
					('$id_departamento', '$nombre_departamento', '$id_pais')
					";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$nombre_departamento= utf8_decode($nombre_departamento);
			$this->query = "
			UPDATE departamento
			SET nombre_departamento='$nombre_departamento', id_pais='$id_pais'
			WHERE id_departamento = '$id_departamento'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($id_departamento='') {
			$this->query = "
			DELETE FROM departamento
			WHERE id_departamento = '$id_departamento'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		function __destruct() {
			//unset($this);
		}
	}
?>