<?php

require_once('../../styles.php');
require_once('../../Usuarios/Modelo/usuarios.php');
require_once('../../metodos.php');

$ModeloUsuarios = new Usuarios();
$ModeloUsuarios->validateSession();

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
    <h1>Registrar Estudiante</h1>
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

    <form method="POST" action="../Controladores/add.php">
        <input type="hidden" name="id" value="">

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control form-control-custom" id="nombre" name="nombre" required autocomplete="off" placeholder="Nombre">
        </div>

        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control form-control-custom" id="apellido" name="apellido" required autocomplete="off" placeholder="Apellido">
        </div>

        <div class="mb-3">
            <label for="documento" class="form-label">Documento</label>
            <input type="text" class="form-control form-control-custom" id="documento" name="documento" required autocomplete="off" placeholder="Documento">
        </div>

        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" class="form-control form-control-custom" id="correo" name="correo" required autocomplete="off" placeholder="Correo">
        </div>

        <div class="mb-3">
            <label for="materia" class="form-label">Materia</label>
            <select class="form-select form-control-custom" id="materia" name="materia" required>
                <option selected>Seleccione</option>
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
                <option selected>Seleccione</option>
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
            <input type="number" class="form-control form-control-custom" id="promedio" name="promedio" required autocomplete="off" placeholder="Promedio">
        </div>

        <button type="submit" class="btn btn-primary">Registrar</button>
        <button type="button" class="btn btn-primary">
            <a href="index.php" target="_blank" style="color: white; text-decoration: none;">
                Regresar
            </a>
        </button>
    </form>

</body>

</html>