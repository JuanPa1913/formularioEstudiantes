<?php
require_once('../Modelo/docentes.php');

if($_POST){
    $ModeloDocentes = new Docentes();
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $estado = $_POST['estado'];
    $ModeloDocentes->update($id,$nombre,$apellido,$usuario,$password,$estado);
}else{
    header('Location: ../../index.php');
}