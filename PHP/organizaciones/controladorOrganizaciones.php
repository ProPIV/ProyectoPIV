<?php
 
require_once 'organizaciones_modelo.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $organizacion = new Organizacion();
        $resultado = $organizacion->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $organizacion = new Organizacion();
		$resultado = $organizacion->nuevo($datos);
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
		$organizacion = new Organizacion();
		$resultado = $organizacion->borrar($datos['codigo']);
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
        $organizacion = new Organizacion();
        $organizacion->consultar($datos['codigo']);

        if($organizacion->getComu_codi() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codigo' => $organizacion->getComu_codi(),
                'organizacion$organizacion' => $organizacion->getComu_nomb(),
                'municipio' =>$organizacion->getMuni_codi(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $organizacion = new Organizacion();
        $listado = $organizacion->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;
}
?>
