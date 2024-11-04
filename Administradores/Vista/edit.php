<?php
require_once('../../Usuarios/Modelo/usuarios.php');
require_once('../Modelo/administradores.php');

$ModeloUsuarios = new Usuarios();
$ModeloUsuarios->validateSession();

$ModeloAdministradores = new Administradores();
$id = $_GET['id'];
$Administradores = $ModeloAdministradores->getById($id);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Notas</title>
</head>

<body>
    <h1>Editar Administradores</h1>
    <form method="POST" action="../Controladores/edit.php">
        <?php
        if ($Administradores != null) {
            foreach ($Administradores as $Administrador) {
        ?>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                Nombre<br>
                <input type="text" name="nombre" id="nombre" required="" autocomplete="off" placeholder="Nombre" value="<?php echo $Administrador['NOMBRE'] ?>"><br><br>
                Apellido <br>
                <input type="text" name="apellido" id="apellido" required="" autocomplete="off" placeholder="Apellido" value="<?php echo $Administrador['APELLIDO'] ?>"> <br><br>
                Usuario <br>
                <input type="text" name="usuario" id="usuario" required="" autocomplete="off" placeholder="Usuario" value="<?php echo $Administrador['USUARIO'] ?>"> <br><br>
                Password <br>
                <input type="password" name="password" id="password" required="" autocomplete="off" placeholder="Contraseña" value="<?php echo $Administrador['PASSWORD'] ?>"> <br><br>
                Estado <br>
                <select name="estado" id="estado" required="">
                    <option value="<?php echo $Administrador['ESTADO'] ?>"><?php echo $Administrador['ESTADO'] ?></option>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select> <br><br>
                <input type="submit" value="Editar">
        <?php
                # code...
            }
        }
        ?>
    </form>
    <button type="button" class="btn btn-success">
        <a href="../Vista/index.php" target="_blank" style="color: black; text-decoration: none; font-weight: bold;">
            Volver
        </a>
    </button>
</body>

</html>