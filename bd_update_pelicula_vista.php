<?php
    require_once 'conexion.php' ;

    $id = intval($_GET['id']) ;
    $sql = "UPDATE t_peliculas SET vista = 1 WHERE id = $id" ;

    if(mysqli_query($conexion , $sql)) {
        echo "Almacenado" ;
    } else {
        echo "Fallido" ;
    }

        echo "<script> location.href = 'index.php' </script>"
?>