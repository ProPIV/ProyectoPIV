<?php
try{
$login=$_POST['usernamelg'];
$password=$_POST['passwordlg'];

$contador=0;

$base= new PDO("mysql:host=localhost; dbname=proyectopiv" , "root", "");

$mysqli="SELECT * FROM empleado WHERE usuario= :login";

$resultado=$base->prepare($mysqli);

$resultado->execute(array(":login"=>$login));

    while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){

        //echo "Usuario: " . $registro['usuario'] . " Contraseña: " . $registro['password'] . "<br>";

        if(password_verify($password, $registro['password'])){
            
            $contador++;        
        }
    }

$resultado->closeCursor();
}catch(Exception $e){
	
	die("Error: " . $e->getMessage());
	
	
	
}

if($contador>0){
require 'conexion.php';
sleep(2);
$usuarios = $mysqli->query("
Select usuario, id_permiso
FROM empleado
WHERE usuario = '".$_POST['usernamelg']."'");
if($usuarios->num_rows == 1):
    $datos = $usuarios->fetch_assoc();
    echo json_encode(array('error' => false, 'tipo' => $datos['id_permiso']));
else:
    echo json_encode(array('error' => true));
endif;

$mysqli->close();
}else{
    echo "Error";
}
?>