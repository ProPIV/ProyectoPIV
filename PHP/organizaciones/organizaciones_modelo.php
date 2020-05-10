<?php
    require_once("../modeloAbstractoDB.php");
    class Organizacion extends ModeloAbstractoDB {
		private $id_unidad_organizacional;
		private $nombre_unidad_organizacional;
		private $id_empresa;
		
		function __construct() {
			//$this->db_name = '';
		}

		public function getid_unidad_organizacional(){
			return $this->id_unidad_organizacional;
		}

		public function getnombre_unidad_organizacional(){
			return $this->nombre_unidad_organizacional;
		}
		
		public function getid_empresa(){
			return $this->id_empresa;
		}

		public function consultar($comu_codi='') {
			if($comu_codi !=''):
				$this->query = "
				SELECT comu_codi, comu_nomb, muni_codi
				FROM tb_comuna
				WHERE comu_codi = '$comu_codi' order by comu_codi
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
			SELECT id_unidad_organizacional, nombre_unidad_organizacional, m.id_empresa
			FROM unidad_organizacional as c inner join empresa as m
			ON (c.id_empresa = m.id_empresa) order by id_unidad_organizacional
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}
		
		public function nuevo($datos=array()) {
			if(array_key_exists('comu_codi', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$comu_nomb= utf8_decode($comu_nomb);
				$this->query = "
					INSERT INTO tb_comuna
					(comu_codi, comu_nomb, muni_codi)
					VALUES
					(NULL, '$comu_nomb', '$muni_codi')
					";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$comu_nomb= utf8_decode($comu_nomb);
			$this->query = "
			UPDATE tb_comuna
			SET comu_nomb='$comu_nomb',
			muni_codi='$muni_codi'
			WHERE comu_codi = '$comu_codi'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($comu_codi='') {
			$this->query = "
			DELETE FROM tb_comuna
			WHERE comu_codi = '$comu_codi'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		function __destruct() {
			//unset($this);
		}
	}
?>