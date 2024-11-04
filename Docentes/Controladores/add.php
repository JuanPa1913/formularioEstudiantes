<?php

require_once('../Modelo/docentes.php');

if($_POST){
    $ModeloDocentes = new Docentes();
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $ModeloDocentes->add($nombre,$apellido,$usuario,$password);
}else{
    header('Location:../../index.php');
}