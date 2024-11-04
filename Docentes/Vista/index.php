<?php
require_once('../../styles.php');
require_once('../../Usuarios/Modelo/usuarios.php');
require_once('../Modelo/docentes.php');


$ModeloUsuarios = new Usuarios();
$ModeloUsuarios->validateSessionAdministrator();
$ModeloDocentes = new Docentes();

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

    <h1>Docentes</h1>
    <a href="add.php" target="_blank">Registrar Docentes</a><br><br>
    <button type="button" class="btn btn-success">
        <a href="../../Administradores/Vista/index.php" target="_blank" style="color: black; text-decoration: none; font-weight: bold;">
        Volver
        </a>
    </button>
    <button type="button" class="btn btn-success">
        <a href="../../Usuarios/Controladores/salir.php" target="_blank" style="color: black; text-decoration: none; font-weight: bold;">
            SALIR
        </a>
    </button>
    <table class="table table-striped border">
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
            $Docentes= $ModeloDocentes->get();
            if($Docentes != null){
                foreach($Docentes as $Docente){
            ?>
        <tr>
            <td><?php echo $Docente['ID_USUARIO']; ?></td>
            <td><?php echo $Docente['NOMBRE']; ?></td>
            <td><?php echo $Docente['APELLIDO']; ?></td>
            <td><?php echo $Docente['USUARIO']; ?></td>
            <td><?php echo $Docente['PERFIL']; ?></td>
            <td><?php echo $Docente['ESTADO']; ?></td>
            <td>
                <a href="edit.php?id=<?php  echo $Docente['ID_USUARIO'] ?>" target="_blank"><i class="bi bi-pencil-square"></i></i></a>
                <a href="delete.php?id=<?php  echo $Docente['ID_USUARIO'] ?>" target="_blank"><i class="bi bi-trash3-fill" style="color: red;"></i></a>
            </td>
            <?php
                }
            }
            ?>
        </tr>
    </table>
</body>
</html>