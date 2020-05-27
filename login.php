<?php
require 'conexion.php';
sleep(1);
$usuarios = $mysqli->query("
Select usuario, id_permiso
FROM empleado
WHERE usuario = '".$_POST['usernamelg']."'
AND password = '".$_POST['passwordlg']."'");
if($usuarios->num_rows == 1):
    $datos = $usuarios->fetch_assoc();
    echo json_encode(array('error' => false, 'tipo' => $datos['id_permiso']));
else:
    echo json_encode(array('error' => true));
endif;

$mysqli->close();
?>