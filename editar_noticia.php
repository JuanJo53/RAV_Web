<?php
    require 'conexionBD.php';
    session_start();

    $cod_autor=$_SESSION['autorID'];
    $cod_noticia=$_POST['cod_noticia'];
    $titulo=$_POST['titulo'];
    $contenido=$_POST['contenido'];
    $enlace=$_POST['enlace'];
    $categoria=$_POST['categoria'];
    $cat = "SELECT * FROM categorias_noticias WHERE categoria='$categoria'";
    $dataResultCat = $conn->query($cat);
    if($dataResultCat->num_rows>0){
        while($rowCat=$dataResultCat->fetch_array()){
            $cod_categoria=$rowCat['cod_categoria'];
        }
    }
    $sql="UPDATE noticias 
        SET titulo='$titulo',contenido='$contenido',enlace_noticia='$enlace',cod_categoria='$cod_categoria' 
        WHERE cod_noticia='$cod_noticia'";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo 'Datos Actualizados!';
    }else{
        echo 'Datos No Actualizados!';
    }
    $conn->close();
?>