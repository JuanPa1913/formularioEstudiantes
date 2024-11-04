<?php
require_once('../../Usuarios/Modelo/usuarios.php');

$ModeloUsuarios = new Usuarios();
$ModeloUsuarios->validateSession();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Notas</title>
</head>

<body>
    <h1>Registrar Materias</h1>
    <form method="POST" action="../Controladores/add.php">
        <input type="hidden" name="Id" value="">
        Nombre <br>
        <input type="text" name="materia" required="" autocomplete="off" placeholder="Nombre materia"> <br><br>
        <input type="submit" value="Registrar">
    </form>
    <button type="button" class="btn btn-success">
        <a href="../Vista/index.php" target="_blank" style="color: black; text-decoration: none; font-weight: bold;">
            Volver
        </a>
    </button>
</body>

</html>