<?php
    require 'conexionBD.php';
    session_start();

    $correo=$_POST['correo'];
    $contraseña=$_POST['contraseña'];

    $sql = 'SELECT * FROM autor WHERE correo="'.$correo.'"';
    $result = $conn->query($sql);

    if ($result) { 
        if ($result->num_rows > 0) { 
            while ($row = $result->fetch_array()) { 
                if($contraseña==$row['password']){
                    $cod_usuario=$row['cod_autor'];                          
                    $_SESSION['autorID']=$cod_usuario;
                    $_SESSION['correo']=$correo;
                    $_SESSION['contraseña']=$row['password'];
                    // header('Location: registro_noticias.php');
                }else{
                    echo "Usuario o contraseña incorrecta";
                    header('Location: index.php');
                } 
            } 
            $result->free(); 
        }else{ 
            echo "No se encontro al usuario"; 
            header('Location: index.php');
        } 
    } else { 
        echo "ERROR: No se pudo ejecutar $sql. ".$conn->error; 
        header('Location: index.php');
    } 
    $conn->close();
?>