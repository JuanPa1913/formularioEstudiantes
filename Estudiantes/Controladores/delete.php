<?php
    require_once('../Modelo/estudiantes.php');

    if($_POST){
        $ModeloEstudiantes = new Estudiantes();
        $id = $_POST['id'];
        $ModeloEstudiantes->delete($id);
    }else{
        header('Location: ../../index.php');
    }