<?php
    require 'conexionBD.php';
    session_start();

    $cod_autor=$_SESSION['autorID'];

    $titulo=$_POST['titulo'];
    $contenido=$_POST['contenido'];
    $enlace=$_POST['enlace'];
    $categoria=$_POST['categoria'];    
    $date = date('Y-m-d H:i:s');

    $sql = "INSERT INTO noticias(titulo, contenido, fecha_publicacion, enlace_noticia,cod_categoria,cod_autor) 
            VALUES ('$titulo','$contenido','$date','$enlace','$categoria', '$cod_autor')";
    if(mysqli_query($conn, $sql)){
        return 'Noticia Publicada!';
    }else{
        return 'Noticia NO Publicada!';
    }
    $conn->close();
?>