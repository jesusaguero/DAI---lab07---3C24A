<?php
include('../conexion.php');

if(isset($_GET['autor_id'])) {
    
    $autor_id = $_GET['autor_id'];

    
    $conexion = conectar();

    
    $sql = "DELETE FROM autor WHERE autor_id = $autor_id";

    
    if(mysqli_query($conexion, $sql)) {
        
        header("Location: autores.php");
    } else {
        
        $error = "Error al eliminar al autor: " . mysqli_error($conexion);
    }

    
    desconectar($conexion);
} else {
    
    $error = "No se ha especificado el autor a eliminar";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Autor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
</head>
<body>
    <div class="container">
        <h1>Eliminar Autor</h1>
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } else { ?>
            <div class="alert alert-success">El autor ha sido eliminado correctamente</div>
        <?php } ?>
        <a href="autores.php" class="btn btn-primary">Volver a autores</a>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>