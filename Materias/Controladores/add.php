<?php
require_once('../Modelo/materias.php');

if($_POST){
    $ModeloMaterias = new Materias();
    $materia = $_POST['materia'];
    $ModeloMaterias->add($materia);
}else{
    header('Location:../../index.php');
}