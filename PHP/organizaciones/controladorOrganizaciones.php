<?php
 
require_once 'organizaciones_modelo.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $organizaciones = new Organizaciones();
        $resultado = $organizaciones->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $organizaciones = new Organizaciones();
		$resultado = $organizaciones->nuevo($datos);
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
		$organizaciones = new Organizaciones();
		$resultado = $organizaciones->borrar($datos['codigo']);
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
        $organizaciones = new Organizaciones();
        $organizaciones->consultar($datos['codigo']);

        if($organizaciones->getComu_codi() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codigo' => $organizaciones->getComu_codi(),
                'organizaciones$organizaciones' => $organizaciones->getComu_nomb(),
                'municipio' =>$organizaciones->getMuni_codi(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $organizaciones = new Organizaciones();
        $listado = $organizaciones->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
        break;
}
?>
