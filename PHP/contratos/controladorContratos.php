<?php
 
require_once 'contratos_modelo.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $contratos = new Contratos();
        $resultado = $contratos->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $contratos = new Contratos();
		$resultado = $contratos->nuevo($datos);
        if($resultado > 0) {
            $respuesta = array(
                'respuesta' => 'correcto'
            );
        }  else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        echo json_encode($respuesta);
        break;
    case 'borrar':
		$contratos = new Contratos();
		$resultado = $contratos->borrar($datos['codigo']);
        if($resultado > 0) {
            $respuesta = array(
                'respuesta' => 'correcto'
            );
        }  else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'consultar':
        $contratos = new Contratos();
        $contratos->consultar($datos['codigo']);

        if($contratos->getID_CONTRATO() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codigo' => $contratos->getID_CONTRATO(),
                'id_empleado' => $contratos->getID_EMPLEADO(),
                'fecha_ini' =>$contratos->getFECHA_INI(),
                'fecha_fin' =>$contratos->getFECHA_FIN(),
                'id_tipo_contrato' =>$contratos->getID_TIPO_CONTRATO(),
                'id_proveedor' =>$contratos->getID_PROVEEDOR(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $contratos = new Contratos();
        $listado = $contratos->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;
}
?>
