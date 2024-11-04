<?php
require_once('../../usuarios/Modelo/usuarios.php');

$ModeloUsuarios = new Usuarios();
$ModeloUsuarios->validateSession();

$id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Notas</title>
</head>

<body>
    <h1>Eliminar Estudiante</h1>
    <form method="POST" action="../Controladores/delete.php">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <p>¿Estas seguro que quieres eliminar el estudiante?</p>
        <input type="submit" value="Eliminar">
    </form>
    <button type="button" class="btn btn-success">
        <a href="../Vista/index.php" target="_blank" style="color: black; text-decoration: none; font-weight: bold;">
            Volver
        </a>
    </button>
</body>

</html>