<?php
require_once('../../Usuarios/Modelo/usuarios.php');
require_once('../Modelo/materias.php');

$ModeloUsuarios = new Usuarios();
$ModeloUsuarios->validateSessionAdministrator();

$ModeloMaterias = new Materias();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Notas</title>
</head>

<body>
    <h1>Materias</h1>
    <a href="add.php" target="_blank">Registrar Materias</a><br><br>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
        <?php
        $Materias = $ModeloMaterias->get();
        if ($Materias != null) {
            foreach ($Materias as $Materia) {
        ?>
        <tr>
            <td><?php echo $Materia['ID_MATERIA'] ?></td>
            <td><?php echo $Materia['MATERIA'] ?></td>
            <td>
                <a href="edit.php?id=<?php  echo $Materia['ID_MATERIA'] ?>" target="_blank">Editar</a>
                <a href="delete.php?id=<?php  echo $Materia['ID_MATERIA'] ?>" target="_blank">Eliminar</a>
            </td>
            <?php
            }
        }
            ?>
                </tr>
    </table>
</body>

</html>