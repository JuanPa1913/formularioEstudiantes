<?php
require_once('../../styles.php');
require_once('../../Usuarios/Modelo/usuarios.php');
require_once('../Modelo/estudiantes.php');
require_once('../../metodos.php');

$ModeloUsuarios = new Usuarios();
$ModeloUsuarios->validateSession();

$Modelo = new Estudiantes();
$id = $_GET['id'];
$InformacionEstudiantes = $Modelo->getById($id);

$ModeloMetodos = new Metodos();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Notas</title>
</head>

<body>
    <h1>Editar Estudiante</h1>
    <style>
        .form-control-custom {
            width: auto;
            /* Ajusta el ancho del input */
            display: inline-block;
            /* Asegura que el tamaño sea relativo al contenido */
            max-width: 300px;
            /* Ancho máximo similar a los inputs normales */
        }
    </style>

    <form method="POST" action="../Controladores/edit.php">
        <?php
        if ($InformacionEstudiantes != null) {
            foreach ($InformacionEstudiantes as $Info) {
        ?>
                <div class="mb-3">
                    <input type="hidden" class="form-control form-control-custom" name="id" value="<?php echo $id ?>">
                </div>

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control form-control-custom" id="nombre" name="nombre" required autocomplete="off" placeholder="nombre" value="<?php echo $Info['NOMBRE'] ?>">
                </div>

                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control form-control-custom" id="apellido" name="apellido" required autocomplete="off" placeholder="apellido" value="<?php echo $Info['APELLIDO'] ?>">
                </div>

                <div class="mb-3">
                    <label for="documento" class="form-label">Documento</label>
                    <input type="text" class="form-control form-control-custom" id="documento" name="documento" required autocomplete="off" placeholder="documento" value="<?php echo $Info['DOCUMENTO'] ?>">
                </div>

                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" class="form-control form-control-custom" id="correo" name="correo" required autocomplete="off" placeholder="correo" value="<?php echo $Info['CORREO'] ?>">
                </div>

                <div class="mb-3">
                    <label for="materia" class="form-label">Materia</label>
                    <select class="form-select form-control-custom" id="materia" name="materia" required>
                        <option value="<?php echo $Info['MATERIA'] ?>"><?php echo $Info['MATERIA'] ?></option>
                        <?php
                        $Materias = $ModeloMetodos->getMaterias();
                        if ($Materias != null) {
                            foreach ($Materias as $Materia) {
                        ?>
                                <option value="<?php echo $Materia['MATERIA'] ?>"><?php echo $Materia['MATERIA'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="docente" class="form-label">Docente</label>
                    <select class="form-select form-control-custom" id="docente" name="docente" required>
                        <option value="<?php echo $Info['DOCENTE'] ?>"><?php echo $Info['DOCENTE'] ?></option>
                        <?php
                        $Docentes = $ModeloMetodos->getDocentes();
                        if ($Docentes != null) {
                            foreach ($Docentes as $Docente) {
                        ?>
                                <option value="<?php echo $Docente['NOMBRE'] . ' ' . $Docente['APELLIDO'] ?>"><?php echo $Docente['NOMBRE'] . ' ' . $Docente['APELLIDO'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="promedio" class="form-label">Promedio</label>
                    <input type="number" class="form-control form-control-custom" id="promedio" name="promedio" required autocomplete="off" placeholder="promedio" value="<?php echo $Info['PROMEDIO'] ?>">
                </div>
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