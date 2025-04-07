<?php
require_once 'conexion.php';

if (isset($_POST['enviando_peliculas'])) {
    $peliculas = trim($_POST["peliculas$peliculas"]); // Elimina espacios en blanco

    // Verificar que el campo no esté vacío
    if ($peliculas == "") {
        echo "Error: El campo no puede estar vacío.";
        exit;
    }

    // Consulta SQL simple
    $sql = "INSERT INTO t_peliculas (titulo_pelicula) VALUES ('$peliculas')";

    if (mysqli_query($conexion, $sql)) {
        echo "Almacenado";
    } else {
        echo "Error al insertar: " . mysqli_error($conexion);
    }

    // Redirigir después de procesar
    header("Location: index.php");
    exit;
}
?>