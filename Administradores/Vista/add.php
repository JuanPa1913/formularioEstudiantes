<?php
require_once('../../Usuarios/Modelo/usuarios.php');
require_once('../Modelo/administradores.php');

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
    <h1>Registrar Administradores</h1>
    <form method="POST" action="../Controladores/add.php">
        <input type="hidden" name="id" value="">
        Nombre <br>
        <input type="text" name="nombre" required="" autocomplete="off" placeholder="Nombre"> <br><br>
        Apellido <br>
        <input type="text" name="apellido" required="" autocomplete="off" placeholder="Apellido"> <br><br>
        Usuario <br>
        <input type="text" name="usuario" required="" autocomplete="off" placeholder="Usuario"> <br><br>
        Password <br>
        <input type="password" name="password" required="" autocomplete="off" placeholder="Contraseña"> <br><br>
        <input type="submit" value="Registrar">
    </form>
    <button type="button" class="btn btn-success">
        <a href="../Vista/index.php" target="_blank" style="color: black; text-decoration: none; font-weight: bold;">
            Volver
        </a>
    </button>
</body>

</html>