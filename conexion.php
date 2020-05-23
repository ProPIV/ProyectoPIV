<?php
    $mysqli = new mysqli('localhost','root', '', 'proyectopiv');
    if($mysqli->connect_errno):
        echo "Error al conectase con MySQL debido al error ".$mysqli->connect_error;
    endif;

?>