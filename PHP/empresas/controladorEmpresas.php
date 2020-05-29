<?php
 
require_once 'modeloEmpresas.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $empresas = new Empresas();
        $resultado = $empresas->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $empresas = new Empresas();
		$resultado = $empresas->nuevo($datos);
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
		$empresas = new Empresas();
		$resultado = $empresas->borrar($datos['codigo']);
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
        $empresas = new Empresas();
        $empresas->consultar($datos['codigo']);

        if($empresas->getid_empresa() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codigo' => $empresas->getid_empresa(),
                'nombre_empresa' => $empresas->getnombre_empresa(),
                'nombre_sede' => $empresas->getnombre_sede(),
                'id_proveedor'=> $empresas->getid_proveedor(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $empresas = new Empresas();
        $listado = $empresas->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
        break;
}
?>