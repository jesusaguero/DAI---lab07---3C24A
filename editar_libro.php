<?php
include('../conexion.php');

$conexion = conectar();

if(isset($_GET['libro_id'])){
    $libro_id = $_GET['libro_id'];

    $sql = 'SELECT libro.libro_id, libro.titulo, autor.nombres, libro.anio, libro.especialidad, libro.editorial, libro.enlace
    FROM libro
    INNER JOIN autor ON libro.autor_id = autor.autor_id
    WHERE libro.libro_id = ' . $libro_id;

    $resultado = mysqli_query($conexion, $sql);

    $libro = mysqli_fetch_array($resultado);
    $titulo = $libro['titulo'];
    $nombres = $libro['nombres'];
    $anio = $libro['anio'];
    $especialidad = $libro['especialidad'];
    $editorial = $libro['editorial'];
    $enlace = $libro['enlace'];
}

if(isset($_POST['nombres'])){
    $titulo = $_POST['titulo'];
    $nombres = $_POST['nombres'];
    $anio = $_POST['anio'];
    $especialidad = $_POST['especialidad'];
    $editorial = $_POST['editorial'];
    $enlace = $_POST['enlace'];

    $sql = "UPDATE libro 
        SET titulo = '$titulo', 
            autor_id = (SELECT autor_id FROM autor WHERE nombres = '$nombres'), 
            anio = '$anio', 
            especialidad = '$especialidad', 
            editorial = '$editorial', 
            enlace = '$enlace'
        WHERE libro_id = $libro_id";

    $resultado = mysqli_query($conexion, $sql);

    header('Location: libros.php');
    exit();
}

desconectar($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Libro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
</head>
<body>
    <div class="container">
        <h1>Editar Libro</h1>
        <form method="POST" action="">
        <div class="form-group">
                <label for="titulo">Titulo:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $titulo; ?>">
            </div>
            <div class="form-group">
                <label for="nombres">Autor:</label>
                <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $nombres; ?>">
            </div>
            <div class="form-group">
                <label for="anio">Año:</label>
                <input type="text" class="form-control" id="anio" name="anio" value="<?php echo $anio; ?>">
            </div>
            <div class="form-group">
                <label for="especialidad">Especialidad:</label>
                <input type="text" class="form-control" id="especialidad" name="especialidad" value="<?php echo $especialidad; ?>">
            </div>
            <div class="form-group">
                <label for="editorial">Editorial:</label>
                <input type="text" class="form-control" id="editorial" name="editorial" value="<?php echo $editorial; ?>">
            </div>
            <div class="form-group">
                <label for="enlace">URL:</label>
                <input type="text" class="form-control" id="enlace" name="enlace" value="<?php echo $enlace; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>