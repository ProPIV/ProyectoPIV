<?php
    require_once("../modeloAbstractoDB.php");
    class Tipo_Contrato extends ModeloAbstractoDB {
		private $id_tipo_contrato;
		private $nombre_tipo_contrato;

		function __construct() {
			//$this->db_name = '';
		}

		public function getID_TIPO_CONTRATO(){
			return $this->id_tipo_contrato;
		}

		public function getNOMBRE_TIPO_CONTRATO(){
			return $this->nombre_tipo_contrato;
		}

		public function consultar($id_tipo_contrato='') {
			if($id_tipo_contrato !=''):
				$this->query = "
				SELECT *
				FROM tipo_contrato
				WHERE id_tipo_contrato = '$id_tipo_contrato' order by id_tipo_contrato
				";
				$this->obtener_resultados_query();
			endif;
			if(count($this->rows) == 1):
				foreach ($this->rows[0] as $propiedad=>$valor):
					$this->$propiedad = $valor;
				endforeach;
			endif;
		}

		public function nuevo($datos=array()) {
			if(array_key_exists('Cliente_Codi', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$this->query = "
				INSERT INTO tb_cliente
				(Cliente_Codi, Cliente_Nom, Docu_Codi,Cliente_Apell,Documento,Cliente_Cel, Cliente_Direc,Cliente_Email)
				VALUES
				('$Cliente_Codi','$Cliente_Nom', '$Docu_Codi','$Cliente_Apell', '$Documento', '$Cliente_Cel', '$Cliente_Direc','$Cliente_Email')
				";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
		}

		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$this->query = "
			UPDATE tb_cliente
			SET Cliente_Nom='$Cliente_Nom', Cliente_Apell='$Cliente_Apell',Docu_Codi='$Docu_Codi',Documento='$Documento', Cliente_Cel='$Cliente_Cel',Cliente_Direc='$Cliente_Direc',Cliente_Email='$Cliente_Email'
			WHERE Cliente_Codi = '$Cliente_Codi'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($Cliente_Codi='') {
			$this->query = "
			DELETE FROM tb_cliente
			WHERE Cliente_Codi = '$Cliente_Codi'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		public function lista() {
			$this->query = "
			SELECT *
			FROM tipo_contrato 
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}
		
		function __destruct() {
			//unset($this);
		}
	}
?>