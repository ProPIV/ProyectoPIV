<?php 
  $contenidoAdmin = file_get_contents('contenidoAdmin.php');
  $rol = 'admon';
    if ($rol='admon') {
        echo $contenidoAdmin;
    }elseif (condition) {
        echo 'Error';
    }
?>
