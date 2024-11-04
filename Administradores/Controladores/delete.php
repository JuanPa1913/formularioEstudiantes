<?php
require_once('../Modelo/administradores.php');

if($_POST){
    $ModeloAdministradores = new Administradores();
    $id = $_POST['id'];
    $ModeloAdministradores->delete($id);
}else{
    header('Location:../../index.php');
}
