<?php
    require_once 'conexion.php' ;  

    $sql = "SELECT ID, titulo_pelicula FROM t_peliculas WHERE FK_ID_persona IS NULL OR FK_ID_persona = 0" ;
    $resultado = mysqli_query($conexion , $sql) or die (mysqli_error($conexion)) ;

    $sql = "SELECT ID , nombre FROM t_persona" ;
    $resultado2 = mysqli_query($conexion , $sql) or die (mysqli_error($conexion)) ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&display=swap" rel="stylesheet">
    <style>
        body{
            font-weight: 400;
            font-style: normal;
            background-image: url(./img/cinema-movie-horizontal-banner-corn-cartoon-style-vector.jpg) ;
            color: black;
            background-size: cover;  /* Cubre todo el fondo */
            background-position: center; /* Centra la imagen */
            background-repeat: no-repeat; /* No repite la imagen */
            background-attachment: fixed; /* Fondo fijo */

        }
        div{
            background-color: rgba(255, 253, 253, 0.42);
        }
        button{
            background-color: #f39c12;
            color: white;
            padding: 7px 14px;
            font-size: 10px;
            border: none;
            border-radius: 6px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra */
            cursor: pointer;
            transition: all 0.2s ease;
        }
        h2{
            font-family: "Bungee Spice", sans-serif;
            font-weight: 400;
            font-style: normal;
        }
       
    </style>
</head>
<body>
    <div>
        <h2>¿Qué película vemos?</h2>

        <fieldset>
            <form action="bd_insert_films.php" method = "POST">
                <input type="text" name="peliculas" id="peliculas" class="peliculas">
                <button type="submit" name="enviando_peliculas">Agregar nueva película:</button>
            </form>

            <form action="bd_insert_persona.php" method = "POST">
                <input type="text" name="persona" id="persona" class="persona">
                <button type="submit" name="enviando_persona">Agregar nueva persona</button>
            </form>
        </fieldset>

        <h2>Lista de películas</h2>

        <fieldset>
            <form action="bd_update_FK_ID_persona.php" method = "POST">
                <label for="persona">Personas:</label>
                <select name="persona" id="persona">
                <?php
                    if (mysqli_num_rows($resultado) > 0) {
                        while($fila = mysqli_fetch_array($resultado2)) {
                            echo "<option value='{$fila['ID']}'>{$fila['nombre']}</option>"; ;
                        }
                    } else {
                        echo "<option value='' disabled>Nadie quiere ver esta película.</option>";
                    }
                    ?>
                </select>

               
                
                <label for="peliculas">Quiere ver la película:</label>
                <select name="peliculas" id="peliculas">
                    <?php
                        if (mysqli_num_rows($resultado) > 0) {
                            while ($fila = mysqli_fetch_array($resultado)) {
                                echo "<option value='{$fila['ID']}'>{$fila['titulo_pelicula']}</option>";
                            }
                        } else {
                            echo "<option value='' disabled>No hay películas disponibles</option>";
                        }
                    ?>
                </select>
                        <button type="submit" id="enviar" >Asignar persona a película</button>
                
            </form>
        </fieldset>

        <?php
            // PELÍCULAS POR VER
            print("<h2> Películas que no hemos visto </h2>") ;

            $sql = "SELECT titulo_pelicula FROM t_peliculas WHERE FK_ID_persona IS NULL OR FK_ID_persona = 0" ;
            $resultado3 = mysqli_query($conexion , $sql) or die (mysqli_Error($conexion)) ;

                echo "<table class = 'white'>" ;
                echo "<thead>" ;
                echo "<tr>" ;
                echo "<td><strong>Películas</strong></td>" ;
                echo "</tr>" ;
                echo  "</thead>" ;
                $n = 0 ;
                
                while($fila = mysqli_fetch_array($resultado3)) {
                    echo "<tr>" ;
                    echo "<td> {$fila['titulo_pelicula']} </td>" ;
                    echo "</tr>"  ;

                    $n++ ;
                }

                echo "</table>" ;

                if($n == 0) {
                    echo "<span> SIN VALORES </span>" ;
                }

            // PELÍCULAS NO VISTAS
            print("<h2> Películas que queremos ver </h2>") ;

            $sql = "SELECT t_peliculas.ID, t_peliculas.titulo_pelicula, t_persona.nombre FROM t_peliculas JOIN t_persona ON t_peliculas.FK_ID_persona = t_persona.ID WHERE t_peliculas.FK_ID_persona IS NOT NULL AND t_peliculas.FK_ID_persona != 0 AND `vista` = 0 " ;
            $resultado4 = mysqli_query($conexion , $sql) or die (mysqli_error($conexion)) ;
    
                echo "<table class = 'white'>" ;
                echo "<thead>" ;
                echo "<tr>" ;
                echo "<td><strong>Películas</strong></td>" ;
                echo "<td><strong>Persona</strong></td>" ;
                echo "<td><strong></strong></td>" ;
                echo "</tr>" ;
                echo  "</thead>" ;
                $n = 0 ;
                    
                while($fila = mysqli_fetch_array($resultado4)) {
                    echo "<tr>" ;
                    echo "<td> {$fila['titulo_pelicula']} </td>" ;
                    echo "<td> {$fila['nombre']} </td> " ;
                    echo "<td><a href= 'bd_update_pelicula_vista.php?id=" . $fila['ID'] . "'><button>Marcar como vista</button></a></td>" ;
                    echo "</tr>"  ;
    
                    $n++ ;
                }
    
                echo "</table>" ;
                    
                if($n == 0) {
                    echo "<span> SIN VALORES </span>" ;
                }

            // PELÍCULAS VISTAS
            print("<h2> Películas vistas </h2>") ;

            $sql = "SELECT t_peliculas.ID, t_peliculas.titulo_pelicula, t_persona.nombre FROM t_peliculas LEFT JOIN t_persona ON t_peliculas.FK_ID_persona = t_persona.id WHERE t_peliculas.vista = 1" ;
            $resultado5 = mysqli_query($conexion , $sql) or die (mysqli_Error($conexion)) ;
        
                echo "<table class = 'white'>" ;
                echo "<thead>" ;
                echo "<tr>" ;
                echo "<td><strong>Película</strong></td>" ;
                echo "<td><strong>Persona</strong></td>" ;
                echo "<td><strong></strong></td>" ;
                echo "</tr>" ;
                echo  "</thead>" ;
                $n = 0 ;
                        
                while($fila = mysqli_fetch_array($resultado5)) {
                    echo "<tr>" ;
                    echo "<td> {$fila['titulo_pelicula']} </td>" ;
                    echo "<td> {$fila['nombre']} </td> " ;
                    echo "<td><a href= 'bd_delete.php?id=" . $fila['ID'] . "'><button>Borrar</button></a></td>" ;
                    echo "</tr>"  ;
        
                    $n++ ;
                }
                
                echo "</table>" ;
                        
                if($n == 0) {
                    echo "<span> SIN VALORES </span>" ;
                }
        ?>
    </div>
</body>
</html>
</body>
</html>