<?php
 
require_once 'modelopais.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $pais = new Pais();
        $resultado = $pais->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $pais = new Pais();
		$resultado = $pais->nuevo($datos);
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
		$pais = new Pais();
		$resultado = $pais->borrar($datos['codigo']);
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
        $pais = new Pais();
        $pais->consultar($datos['codigo']);

        if($pais->getid_pais() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codigo' => $pais->getid_pais(),
                'nombre_pais' => $pais->getnombre_pais(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $pais = new Pais();
        $listado = $pais->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
        break;
}
?>