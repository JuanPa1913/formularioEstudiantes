<?php

require_once('../Modelo/administradores.php');

if($_POST){
    $ModeloAdministradores = new Administradores();
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $ModeloAdministradores->add($nombre,$apellido,$usuario,$password);
}else{
    header('Location:../../index.php');
}

