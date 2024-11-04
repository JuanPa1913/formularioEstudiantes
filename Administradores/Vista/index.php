<?php
require_once('../../styles.php');
require_once('../../Usuarios/Modelo/usuarios.php');
require_once('../Modelo/administradores.php');

$ModeloUsuarios = new Usuarios();
$ModeloUsuarios->validateSessionAdministrator();


$ModeloAdministradores = new Administradores();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Notas</title>
</head>

<body>
<h3>Bienvenido: <?php echo $ModeloUsuarios->getNombre(); ?> - <?php echo $ModeloUsuarios->getPerfil(); ?></h3>

    <h1>Administradores</h1>
    <a href="add.php" target="_blank">Registrar Administrador</a><br><br>
    <button type="button" class="btn btn-success">
        <a href="../../Estudiantes/Vista/index.php" target="_blank" style="color: black; text-decoration: none; font-weight: bold;">
            Estudiantes
        </a>
    </button>

    <button type="button" class="btn btn-success">
        <a href="../../Docentes\Vista\index.php" target="_blank" style="color: black; text-decoration: none; font-weight: bold;">
            Docentes
        </a>
    </button>
    <button type="button" class="btn btn-success">
        <a href="../../Administradores\Vista\index.php" target="_blank" style="color: black; text-decoration: none; font-weight: bold;">
            Administradores
        </a>
    </button>
    <button type="button" class="btn btn-success">
        <a href="../../Usuarios/Controladores/salir.php" target="_blank" style="color: black; text-decoration: none; font-weight: bold;">
            SALIR
        </a>
    </button>

    <button type="button" class="btn btn-success">
        <a href="../../Administradores/Vista/index.php" target="_blank" style="color: black; text-decoration: none; font-weight: bold;">
            Volver
        </a>
    </button>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Usuario</th>
            <th>Perfil</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        <?php
        $Administrador = $ModeloAdministradores->get();
        if ($Administrador != null) {
            foreach ($Administrador as $Administradores) {
        ?>
                <tr>
                    <td><?php echo $Administradores['ID_USUARIO'] ?></td>
                    <td><?php echo $Administradores['NOMBRE'] ?></td>
                    <td><?php echo $Administradores['APELLIDO'] ?></td>
                    <td><?php echo $Administradores['USUARIO'] ?></td>
                    <td><?php echo $Administradores['PERFIL'] ?></td>
                    <td><?php echo $Administradores['ESTADO'] ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $Administradores['ID_USUARIO'] ?>" target="_blank">Editar</a>
                        <a href="delete.php?id=<?php echo $Administradores['ID_USUARIO'] ?>" target="_blank">Eliminar</a>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </table>
</body>

</html>