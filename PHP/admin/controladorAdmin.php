<?php
 
require_once 'admin_modelo.php';
$datos = $_GET;
switch ($_GET['accion']) {
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
        if ($resultado > 0) {
            $respuesta = array(
                'respuesta' => 'correcto'
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        echo json_encode($respuesta);
        break;
    case 'borrar':
        $id_empleado = new Admin();
        $resultado = $id_empleado->borrar($datos['id_empleado']);
        if ($resultado > 0) {
            $respuesta = array(
                'respuesta' => 'correcto'
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'consultar':
        $id_empleado = new Admin();
        $id_empleado->consultar($datos['id_empleado']);

        if ($id_empleado->getid_empleado() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        } else {
            $respuesta = array(
                'id_empleado' => $id_empleado->getid_empleado(),
                'tipo_documento' => $id_empleado->gettipo_documento(),
                'documento' => $id_empleado->getdocumento(),
                'nombre_empleado' => $id_empleado->getnombre_empleado(),
                'apellido' => $id_empleado->getapellido(),
                'usuario' => $id_empleado->getusuario(),
                'password' => $id_empleado->getpassword(),
                'direccion' => $id_empleado->getdireccion(),
                'telefono' => $id_empleado->gettelefono(),
                'id_ciudad' => $id_empleado->getid_ciudad(),
                'id_unidad_organizacional' => $id_empleado->getid_unidad_organizacional(),
                'id_rol' => $id_empleado->getid_rol(),
                'id_empresa' => $id_empleado->getid_empresa(),
                'id_permiso' => $id_empleado->getid_permiso(),
                'respuesta' => 'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $id_empleado = new Admin();
        $listado = $id_empleado->lista();
        echo json_encode(array('data' => $listado), JSON_UNESCAPED_UNICODE);
        break;

    case 'ciudad':
        $id_empleado = new Admin();
        $listado = $id_empleado->ciudad();
        echo json_encode(array('data' => $listado), JSON_UNESCAPED_UNICODE);
        break;

    case 'unidad':
        $id_empleado = new Admin();
        $listado = $id_empleado->unidad();
        echo json_encode(array('data' => $listado), JSON_UNESCAPED_UNICODE);
        break;

    case 'rol':
        $id_empleado = new Admin();
        $listado = $id_empleado->rol();
        echo json_encode(array('data' => $listado), JSON_UNESCAPED_UNICODE);
        break;

    case 'empresa':
        $id_empleado = new Admin();
        $listado = $id_empleado->empresa();
        echo json_encode(array('data' => $listado), JSON_UNESCAPED_UNICODE);
        break;
        

    case 'permiso':
        $id_empleado = new Admin();
        $listado = $id_empleado->permiso();
        echo json_encode(array('data' => $listado), JSON_UNESCAPED_UNICODE);
        break;
}
?>
