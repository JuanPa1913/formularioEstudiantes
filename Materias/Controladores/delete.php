<?php
require_once('../Modelo/materias.php');

if($_POST){
    $ModeloMaterias = new Materias();
    $id = $_POST['id'];
    $ModeloMaterias->delete($id);
}else{
    header('Location: ../../index.php');
}
