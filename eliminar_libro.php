<?php
include('../conexion.php');

if(isset($_GET['libro_id'])) {
    $libro_id = $_GET['libro_id'];

    $conexion = conectar();

    $sql = "DELETE FROM libro WHERE libro_id = $libro_id";

    $resultado = mysqli_query($conexion, $sql);

    desconectar($conexion);

    header('Location: libros.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Libro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
</head>
<body>
    <div class="container">
        <h1>Eliminar Libro</h1>
        <p>¿Esta seguro de que desea eliminar este libro?</p>
        <div>
            <a href="libros.php" class="btn btn-default">Cancelar</a>
            <a href="eliminar_libro.php?libro_id=<?php echo $libro_id; ?>" class="btn btn-danger">Eliminar</a>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html> 