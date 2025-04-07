<?php
    $servidor = "localhost";
    $usuario = "root";
    $pass = "";
    $basedatos = "films";

    $conexion = mysqli_connect($servidor,$usuario,$pass) or
    die ("Error de conexión con el servidor");

    mysqli_select_db($conexion,$basedatos);
?>