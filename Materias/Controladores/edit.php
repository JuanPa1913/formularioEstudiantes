<?php
require_once('../Modelo/materias.php');

if($_POST){
    $ModeloMaterias = new Materias();
    $id = $_POST['id'];
    $materia = $_POST['materia'];
    $ModeloMaterias->update($id,$materia);
}else{
    header('Location: ../../index.php');
}
