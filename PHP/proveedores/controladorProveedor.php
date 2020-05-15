<?php
 
require_once 'proveedor_modelo.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $proveedor = new Proveedor();
        $resultado = $proveedor->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $proveedor = new Proveedor();
		$resultado = $proveedor->nuevo($datos);
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
		$proveedor = new Proveedor();
		$resultado = $proveedor->borrar($datos['id_proveedor']);
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
        $proveedor = new Proveedor();
        $proveedor->consultar($datos['id_proveedor']);

        if($proveedor->getid_proveedor() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'id_proveedor' => $proveedor->getid_proveedor(),
                'nombre_proveedor' => $proveedor->getnombre_proveedor(),
                'telefono' =>$proveedor->gettelefono(),
                'direccion' =>$proveedor->getdireccion(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $proveedor = new Proveedor();
        $listado = $proveedor->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;
}
?>
