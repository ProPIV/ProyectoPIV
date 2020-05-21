<?php
 
require_once 'modeloOrganizaciones.php';
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

        if($organizaciones->getid_unidad_organizacional() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codigo' => $organizaciones->getid_unidad_organizacional(),
                'nombre_unidad_organizacional' => $organizaciones->getnombre_unidad_organizacional(),
                'id_empresa' => $organizaciones->getid_empresa(),
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