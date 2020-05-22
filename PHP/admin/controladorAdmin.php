<?php
 
require_once 'admin_modelo.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $id_empleado = new Admin();
        $resultado = $id_empleado->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $id_empleado = new Admin();
		$resultado = $id_empleado->nuevo($datos);
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
		$id_empleado = new Admin();
		$resultado = $id_empleado->borrar($datos['id_empleado']);
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
        $id_empleado = new Admin();
        $id_empleado->consultar($datos['id_empleado']);

        if($id_empleado->getid_empleado() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'id_empleado' => $id_empleado->getid_empleado(),
                'tipo_documento' => $id_empleado->gettipo_documento(),
                'documento' =>$id_empleado->getdocumento(),
                'nombre_empleado' =>$id_empleado->getnombre_empleado(),
                'apellido' =>$id_empleado->getapellido(),
                'direccion' =>$id_empleado->getdireccion(),
                'telefono' =>$id_empleado->gettelefono(),
                'ciudad' =>$id_empleado->getciudad(),
                'id_unidad_organizacional' =>$id_empleado->getid_unidad_organizacional(),
                'id_rol' =>$id_empleado->getid_rol(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $id_empleado = new Admin();
        $listado = $id_empleado->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;
}
?>
