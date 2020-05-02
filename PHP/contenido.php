<?php 
  $contenidoAdmin = file_get_contents('contenidoAdmin.php');
  $rol = "admin";
?>
<div class="container-fluid">
    <?php 
        if ($rol="admin") {
            echo $contenidoAdmin;
        }elseif (condition) {
            echo "Error";
        }
    ?>    
</div>