<?php
include('../conexion.php');

// Abrimos la conexion a la BD MySql
$conexion = conectar();

// Definimos la consulta SQL
$sql = 'SELECT libro.libro_id, libro.titulo, autor.nombres, libro.anio, libro.especialidad, libro.editorial, libro.enlace
FROM libro
INNER JOIN autor ON libro.autor_id = autor.autor_id';

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
    <title>Libros</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
</head>
<body>
    <div class="container">
        <h1>Libros</h1>
        <div>
            <a href="agregar.html" class="btn btn-primary">Nuevo Libro</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Titulo</th>
                        <th>Autor</th>
                        <th>Año</th>
                        <th>Especialidad</th>
                        <th>Editorial</th>
                        <th>URL</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($libro = mysqli_fetch_array($resultado)){
                            $libro_id = $libro['libro_id'];
                            $titulo = $libro['titulo'];
                            $nombres = $libro['nombres'];
                            $anio = $libro['anio'];
                            $especialidad = $libro['especialidad'];
                            $editorial = $libro['editorial'];
                            $enlace = $libro['enlace'];

                            echo '<tr>';
                            echo '<td>' . $libro_id . '</td>';
                            echo '<td>' . $titulo . '</td>';
                            echo '<td>' . $nombres . '</td>';
                            echo '<td>' . $anio . '</td>';
                            echo '<td>' . $especialidad . '</td>';
                            echo '<td>' . $editorial . '</td>';
                            echo '<td><a href="' . $enlace . '">' . $enlace . '</a></td>';
                            echo '<td><a href="editar_libro.php?libro_id=' . $libro_id . '" class="btn btn-primary btn-sm">Editar</a></td>';
                            echo '<td><a href="eliminar_libro.php?libro_id=' . $libro_id . '" class="btn btn-danger btn-sm">Eliminar</a></td>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>