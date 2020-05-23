<?php
require 'PHP/modeloAbstractoDB.php';
sleep(2);
$usuarios = $mysqli->query("
Select nombre_cuenta, id_permiso
FROM cuenta
WHERE nombre_cuenta = '".$_POST['usernamelg']."'
AND password = '".$_POST['passwordlg']."'");

if($usuarios->num_rows == 1):
    $datos = $usuarios->fetch_assoc();
    echo json_encode(array('error' => false, 'tipo' => $datos['id_permiso']));
else:
    echo json_encode(array('error' => true));
endif;

$mysqli->close();

?>