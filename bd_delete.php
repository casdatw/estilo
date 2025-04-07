<?php
    require_once 'conexion.php' ;

    $id = $_GET['id'] ;
    $sql = "DELETE FROM `t_peliculas` WHERE ID = '$id'" ;

    if(mysqli_query($conexion , $sql)) {
        echo "Almacenado" ;
    } else {
        echo "Fallido" ;
    }

    echo "<script> location.href = 'index.php' </script>"
?>