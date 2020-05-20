<?php
 
require_once 'proceso_modelo.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $proceso = new Proceso();
        $resultado = $proceso->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $proceso = new Proceso();
		$resultado = $proceso->nuevo($datos);
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
		$proceso = new Proceso();
		$resultado = $proceso->borrar($datos['codigo']);
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
        $proceso = new Proceso();
        $proceso->consultar($datos['codigo']);

        if($proceso->getID_PROCESO() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codigo' => $proceso->getID_PROCESO(),
                'nombre_proceso' => $proceso->getNOMBRE_PROCESO(),
                'Descripcion' =>$proceso->getDESCRIPCION(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $proceso = new Proceso();
        $listado = $proceso->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;
}
?>
