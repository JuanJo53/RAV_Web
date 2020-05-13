<?php
    require 'conexionBD.php';

    $nomb=$_POST['nombre'];
    $email=$_POST['correo'];
    $mensaje=$_POST['mensaje'];
    $date = date('Y-m-d H:i:s');
    
    $sql = "INSERT INTO mensajes(escritor_nombre, escritor_correo, mensaje, fecha) VALUES ('$nomb','$email','$mensaje','$date')";
    if(mysqli_query($conn, $sql)){
        return "Mensaje Enviado";
    }else{
        return "ERROR: Mensaje no Enviado";
    }
    $conn->close();
?>