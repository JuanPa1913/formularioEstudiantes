<?php
require_once('../Modelo/administradores.php');

if($_POST){
    $ModeloAdministradores = new Administradores();
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $estado = $_POST['estado'];
    $ModeloAdministradores->update($id,$nombre,$apellido,$usuario,$password,$estado);
}else{
    header('Location:../../index.php');
}
