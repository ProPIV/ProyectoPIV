<?php 
  $contenidoAdmin = file_get_contents('contenidoAdmin.php');
  $rol = "admon";
?>
<div class="container-fluid">
    <?php 
        if ($rol="admon") {
            echo $contenidoAdmin;
        }elseif (condition) {
            echo "Error";
        }
    ?>    
</div>