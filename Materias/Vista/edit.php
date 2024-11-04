<?php
require_once('../../Usuarios/Modelo/usuarios.php');
require_once('../Modelo/materias.php');

$ModeloUsuarios = new Usuarios();
$ModeloUsuarios->validateSession();

$ModeloMaterias = new Materias();
$id = $_GET['id'];
$InformacionMaterias = $ModeloMaterias->getById($id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Notas</title>
</head>

<body>
    <h1>Editar Materias</h1>
    <form method="POST" action="../Controladores/edit.php">
        <input type="hidden" class="form-control form-control-custom" name="id" value="<?php echo $id ?>">
        <?php
        if ($InformacionMaterias != null) {
            foreach ($InformacionMaterias as $Info) {
        ?>
                Nombre <br>
                <input type="text" name="materia" id="materia" required="" autocomplete="off" placeholder="materia" value="<?php echo $Info['MATERIA'] ?>"> <br><br>
                <input type="submit" value="Editar">
        <?php
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