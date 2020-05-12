<?php
 
require_once 'modelo_departamento.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $departamento = new Departamento();
        $resultado = $departamento->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $departamento = new Departamento();
		$resultado = $departamento->nuevo($datos);
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
		$departamento = new Departamento();
		$resultado = $departamento->borrar($datos['codigo']);
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
        $departamento = new Departamento();
        $departamento->consultar($datos['codigo']);

        if($departamento->getid_departamento() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codigo' => $departamento->getid_departamento(),
                'nombre_departamento' => $departamento->getnombre_departamento(),
                'id_pais' => $departamento->getid_pais(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $departamento = new Departamento();
        $listado = $departamento->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
        break;
}
?>
