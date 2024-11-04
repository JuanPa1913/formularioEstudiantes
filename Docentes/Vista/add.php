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
    <h1>Registrar Docente</h1>
    <form action="../Controladores/add.php" method="POST">
        Nombre <br>
        <input type="text" name="nombre" id="nombre" required="" autocomplete="off" placeholder="Nombre"> <br><br>
        Apellido <br>
        <input type="text" name="apellido" id="apellido" required="" autocomplete="off" placeholder="Apellido"> <br><br>
        Usuario <br>
        <input type="text" name="usuario" id="usuario" required="" autocomplete="off" placeholder="Usuario"> <br><br>
        Password <br>
        <input type="password" name="password" id="password" required="" autocomplete="off" placeholder="Contraseña"> <br><br>
        <input type="submit" value="Registrar">
    </form>
    <button type="button" class="btn btn-success">
        <a href="../Vista/index.php" target="_blank" style="color: black; text-decoration: none; font-weight: bold;">
            Volver
        </a>
    </button>
</body>

</html>