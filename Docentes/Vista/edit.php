<?php
require_once('../../Usuarios/Modelo/usuarios.php');
require_once('../Modelo/docentes.php');


$ModeloUsuarios = new Usuarios();
$ModeloUsuarios->validateSession();

$ModeloDocentes = new Docentes();
$id = $_GET['id'];
$Docentes = $ModeloDocentes->getById($id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Notas</title>
</head>

<body>
    <h1>Editar Docente</h1>
    <form method="POST" action="../Controladores/edit.php">
        <?php
        if ($Docentes != null) {
            foreach ($Docentes as $Docente) {
        ?>
                <input type="hidden" class="form-control form-control-custom" name="id" value="<?php echo $id ?>">

                Nombre <br>
                <input type="text" name="nombre" id="nombre" required="" autocomplete="off" placeholder="nombre" value="<?php echo $Docente['NOMBRE'] ?>"> <br><br>
                Apellido <br>
                <input type="text" name="apellido" id="apellido" required="" autocomplete="off" placeholder="apellido" value="<?php echo $Docente['APELLIDO'] ?>"> <br><br>
                Usuario <br>
                <input type="text" name="usuario" id="usuario" required="" autocomplete="off" placeholder="usuario" value="<?php echo $Docente['USUARIO'] ?>"> <br><br>
                Password <br>
                <input type="password" name="password" id="password" required="" autocomplete="off" placeholder="password" value="<?php echo $Docente['PASSWORD'] ?>"> <br><br>
                Estado <br>
                <select name="estado" id="estado" required="">
                    <option>Seleccione</option>
                    <option value="<?php echo $Docente['ESTADO'] ?>"><?php echo $Docente['ESTADO'] ?></option>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select> <br><br>
                <input type="submit" value="Editar">
                <button type="button" class="btn btn-success">
                    <a href="../Vista/index.php" target="_blank" style="color: black; text-decoration: none; font-weight: bold;">
                        Volver
                    </a>
                </button>
        <?php
            }
        }
        ?>
    </form>
</body>

</html>