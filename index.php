<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de notas</title>
</head>
<body>
    <h1>Inicio de Sesión</h1>
    <form method="POST" action="Usuarios/Controladores/login.php">
    Usuario <br>
    <input type="text" name="usuario" required="" autocomplete="off" placeholder="Usuario" > <br><br>
    Contraseña <br>
    <input type="password" name="contrasena" required="" autocomplete="off" placeholder="Contraseña"><br><br>
    <input type="submit" value="Iniciar Sesión">
</form>
</body>
</html>