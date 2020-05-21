<?php
 
require_once 'tipo_contrato_modelo.php';
$datos = $_GET;
switch ($_GET['accion']){
   
    case 'consultar':
        $tipo_contrato = new Tipo_Contrato();
        $tipo_contrato->consultar($datos['codigo']);

        if($tipo_contrato->getID_TIPO_CONTRATO() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codigo' => $tipo_contrato->getID_TIPO_CONTRATO(),
                'nombre de tipo contrato' => $tipo_contrato->getNOMBRE_TIPO_CONTRATO(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $tipo_contrato = new Tipo_Contrato();
        $listado = $tipo_contrato->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;
}
?>
