<?php
    require 'conexionBD.php';
    session_start();

    $cod_noticia=$_POST['cod_noticia'];
    $sql = "DELETE FROM noticias WHERE cod_noticia='$cod_noticia';";
    if(mysqli_query($conn, $sql)){
        echo "Datos Borrados!";
    }else{
        echo "Los Datos NO se Borraron!";
    }
    $conn->close();
?>