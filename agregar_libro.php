<?php

include('../conexion.php');

$titulo = $_POST["titulo"];
$nombres = $_POST["nombres"];
$anio = $_POST["anio"];
$especialidad = $_POST["especialidad"];
$editorial = $_POST["editorial"];
$enlace = $_POST["enlace"];

$conexion = conectar();

$sql = "SELECT autor_id FROM autor WHERE nombres = '$nombres'";
$result = mysqli_query($conexion, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $autor_id = $row["autor_id"];
} else {
    echo "No se encontro al autor.";
    mysqli_close($conexion);
    exit();
}

$sql = "INSERT INTO libro (titulo, autor_id, anio, especialidad, editorial, enlace)
        VALUES ('$titulo', '$autor_id', '$anio', '$especialidad', '$editorial', '$enlace')";

if (mysqli_query($conexion, $sql)) {
    echo "Libro agregado correctamente";
} else {
    echo "Error al agregar el libro: " . mysqli_error($conexion);
}

desconectar($conexion);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Libro</title>
</head>
<body>
    <h1>Nuevo Libro</h1>
    <h3>
    <?php
        if (mysqli_affected_rows($conexion) > 0){
            echo 'Libro registrado';
        }
        else{
            echo 'No se ha podido registrar el libro: ' . mysqli_error($conexion);
        }
    ?>
    </h3>
    <a href="libros.php">Regresar</a>
</body>
</html>