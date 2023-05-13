<?php

include('../conexion.php');

// Abrimos la conexion a la BD MySql
$conexion = conectar();

// Definimos la consulta SQL
$sql = 'SELECT autor_id, nombres, ape_paterno, ape_materno FROM autor';

// Ejecutamos el query en la conexion abierta
$resultado = mysqli_query($conexion, $sql);

// Cerramos la conexion
desconectar($conexion);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autores</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
</head>
<body>
    <div class="container">
        <h1>Autores</h1>
        <div>
            <a href="agregar.html" class="btn btn-primary">Nuevo autor</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombres</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($autor = mysqli_fetch_array($resultado)){
                            $autor_id = $autor['autor_id'];
                            $nombres = $autor['nombres'];
                            $ape_paterno = $autor['ape_paterno'];
                            $ape_materno = $autor['ape_materno'];

                            echo '<tr>';
                            echo '<td>' . $autor_id . '</td>';
                            echo '<td>' . $nombres . '</td>';
                            echo '<td>' . $ape_paterno . '</td>';
                            echo '<td>' . $ape_materno . '</td>';
                            echo '<td><a href="editar_autor.php?autor_id=' . $autor_id . '" class="btn btn-primary btn-sm">Editar</a></td>';
                            echo '<td><a href="eliminar_autor.php?autor_id=' . $autor_id . '" class="btn btn-danger btn-sm">Eliminar</a></td>';
                        }
                    ?>
                </tbody>    
            </table>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>