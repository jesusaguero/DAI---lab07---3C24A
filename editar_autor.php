<?php

include('../conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $autor_id = $_POST['autor_id'];
    $nombres = $_POST['nombres'];
    $ape_paterno = $_POST['ape_paterno'];
    $ape_materno = $_POST['ape_materno'];

    
    $conexion = conectar();

    
    $sql = "UPDATE autor SET nombres = '$nombres', ape_paterno = '$ape_paterno', ape_materno = '$ape_materno' WHERE autor_id = $autor_id";

    
    if (mysqli_query($conexion, $sql)) {
        
        desconectar($conexion);

        
        header('Location: autores.php');
        exit;
    } else {
        $error = 'Error al actualizar al autor: ' . mysqli_error($conexion);
    }
} else {
    
    $autor_id = $_GET['autor_id'];

    
    $conexion = conectar();

    
    $sql = "SELECT nombres, ape_paterno, ape_materno FROM autor WHERE autor_id = $autor_id";

    
    $resultado = mysqli_query($conexion, $sql);

    
    $autor = mysqli_fetch_array($resultado);

    
    desconectar($conexion);

    
    $nombres = $autor['nombres'];
    $ape_paterno = $autor['ape_paterno'];
    $ape_materno = $autor['ape_materno'];
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Autor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
</head>
<body>
    <div class="container">
        <h1>Editar Autor</h1>
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="nombres">Nombre del autor:</label>
                <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $nombres; ?>">
            </div>
            <div class="form-group">
                <label for="ape_paterno">Apellido Paterno:</label>
                <input type="text" class="form-control" id="ape_paterno" name="ape_paterno" value="<?php echo $ape_paterno; ?>">
            </div>
            <div class="form-group">
                <label for="ape_materno">Apellido Materno:</label>
                <input type="text" class="form-control" id="ape_materno" name="ape_materno" value="<?php echo $ape_materno; ?>">
            </div>
            <input type="hidden" name="autor_id" value="<?php echo $autor_id; ?>">
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>