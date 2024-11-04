<?php
require_once('../../styles.php');
require_once('../../Usuarios/Modelo/usuarios.php');
require_once('../Modelo/estudiantes.php');

//Crear objeto de la clase usuarios
$ModeloUsuarios = new Usuarios();
//Para acceder a los metodos se usa ->
//Controlar de que siempre inicie sesion y no entrar por url
$ModeloUsuarios->validateSession();
$Modelo = new Estudiantes();

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

    <button type="button" class="btn btn-success">
        <a href="../../Estudiantes/Vista/index.php" target="_blank" style="color: black; text-decoration: none; font-weight: bold;">
            Estudiantes
        </a>
    </button>
    <button type="button" class="btn btn-success">
        <a href="../../Usuarios/Controladores/salir.php" target="_blank" style="color: black; text-decoration: none; font-weight: bold;">
            SALIR
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

    <br><br>
    <table class="table table-striped" border="1">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Documento</th>
            <th>Correo</th>
            <th>Materia</th>
            <th>Docente</th>
            <th>Promedio</th>
            <th>Fecha de Regitro</th>
            <th>Acciones</th>
        </tr>
        <?php
        //Arreglo que trae los estudiantes de la bd
        $Estudiantes = $Modelo->get();
        //Verifica que existan estudiantes y se recorre
        if ($Estudiantes != null) {
            foreach ($Estudiantes as $Estudiante) {
        ?>
                <tr>
                    <td><?php echo $Estudiante['ID_ESTUDIANTE'] ?></td>
                    <td><?php echo $Estudiante['NOMBRE'] ?></td>
                    <td><?php echo $Estudiante['APELLIDO'] ?></td>
                    <td><?php echo $Estudiante['DOCUMENTO'] ?></td>
                    <td><?php echo $Estudiante['CORREO'] ?></td>
                    <td><?php echo $Estudiante['MATERIA'] ?></td>
                    <td><?php echo $Estudiante['DOCENTE'] ?></td>
                    <td><?php echo $Estudiante['PROMEDIO'] ?></td>
                    <td><?php echo $Estudiante['FECHA_REGISTRO'] ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $Estudiante['ID_ESTUDIANTE'] ?>" target="_blank"><i class="bi bi-pencil-square"></i></i></a>
                        <a href="delete.php?id=<?php echo $Estudiante['ID_ESTUDIANTE'] ?>" target="_blank"><i class="bi bi-trash3-fill" style="color: red;"></i></a>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </table>
</body>

</html>