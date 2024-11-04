<?php

    require_once('../Modelo/usuarios.php');

    //Validar que si se haga el POST
    if($_POST){
        $usuario = $_POST['usuario'];
        $password = $_POST['contrasena'];

        //Crear objeto de la clase usuarios
        $Modelo = new Usuarios();
        //Para acceder a los metodos se usa ->
        if($Modelo->login($usuario, $password)){
            header('Location: ../../Estudiantes/Vista/index.php');
        }else{
            header('Location: ../../index.php');
        }

    }else{
       header('Location: ../../index.php');
    }

