<?php
    require_once('../Modelo/estudiantes.php');

    if($_POST){
        $ModeloEstudiantes = new Estudiantes();

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $documento = $_POST['documento'];
        $correo = $_POST['correo'];
        $materia = $_POST['materia'];
        $docente = $_POST['docente'];
        $promedio = $_POST['promedio'];
        $fecha = date('Y-m-d');

        $ModeloEstudiantes->add($nombre,$apellido,$documento,
        $correo,$materia,$docente,$promedio,$fecha);
    }else{
        header('Location: ../../index.php');
    }