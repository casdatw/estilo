<?php
require_once 'conexion.php';

if (isset($_POST['peliculas']) && isset($_POST['persona'])) {
    $IDpeliculas = $_POST['peliculas'];
    $IDpersona = $_POST['persona'];

    // Validación de datos
    if (empty($IDpeliculas) || empty($IDpersona)) {
        echo "Error: Debes seleccionar una tarea y una persona.";
        exit;
    }

    // Ejecutar la actualización en la base de datos
    $sql = "UPDATE t_peliculas SET FK_ID_persona = '$IDpersona' WHERE ID = '$IDpeliculas'";

    if (mysqli_query($conexion, $sql)) {
        // Redirigir a la página principal después de la actualización
        header("Location: index.php");
        exit;
    } else {
        echo "Error al actualizar: " . mysqli_error($conexion);
    }
} else {
    echo "Error: No se recibieron datos.";
}
?>
