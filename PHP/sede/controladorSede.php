<?php
 
require_once 'modeloSede.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $sede = new Sede();
        $resultado = $sede->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $sede = new Sede();
		$resultado = $sede->nuevo($datos);
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
		$sede = new Sede();
		$resultado = $sede->borrar($datos['codigo']);
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
        $sede = new Sede();
        $sede->consultar($datos['codigo']);

        if($sede->getid_sede() == null)
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codigo' => $sede->getid_sede(),
                'nombre_sede' => $sede->getnombre_sede(),
                'id_municipio' => $sede->getid_municipio(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $sede = new Sede();
        $listado = $sede->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
        break;
}
?>