<?php

include('../conexion.php');

// Obtenemos la informacion del alumno
$nombres = $_POST['nombres'];
$ape_paterno = $_POST['ape_paterno'];
$ape_materno = $_POST['ape_materno'];

// Abrimos la conexion a la base de datos
$conexion = conectar();

// formamos la consulta SQL
$sql = "INSERT INTO autor (nombres, ape_paterno, ape_materno) VALUES ('$nombres', '$ape_paterno', '$ape_materno')";

// Ejecutamos la instruccion SQL
$resultado = mysqli_query($conexion, $sql);

//Cerramos la conexion
desconectar($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Autor</title>
</head>
<body>
    <h1>Nuevo Autor</h1>
    <h3>
    <?php
        if (!$resultado){
            echo 'No se ha podido registrar al autor';
        }
        else{
            echo 'Autor registrado';
        }
    ?>
    </h3>
    <a href="autores.php">Regresar</a>
</body>
</html>