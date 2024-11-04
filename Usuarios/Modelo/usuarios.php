<?php

require_once('../../conexion.php');
//Hace uso de las variables de session
session_start();
class Usuarios extends Conexion {
    public function __construct() {
        parent::__construct();
    }

    public function login($usuario, $password){
        $statement = $this->db->prepare("SELECT * FROM usuarios WHERE USUARIO = :usuario AND PASSWORD = :password");
        // Asignar valores
        $statement->bindParam(':usuario',$usuario);
        $statement->bindParam(':password',$password);
        // Ejecuta la sentencia
        $statement->execute();
        // Solo trae un valor
        if($statement->rowCount() == 1){
            // Trae la info en arreglo
            $result = $statement->fetch();
            $_SESSION['NOMBRE'] = $result['NOMBRE'] . " " . $result['APELLIDO'];
            $_SESSION['ID'] = $result['ID_USUARIO'];
            $_SESSION['PERFIL'] = $result['PERFIL'];
            return true;
        }
        return false;
    }

    //Si existe la sesión
    public function getNombre(){
        return $_SESSION['NOMBRE'];
    }

    public function getId(){
        return $_SESSION['ID'];
    }

    public function getPerfil(){
        return $_SESSION['PERFIL'];
    }

    //Validar sesion

    public function validateSession(){
        //Si no existe una función de manda al inicio de sesión
        if($_SESSION['ID'] == null){
            header('Location: ../../index.php');
        }
    }

    public function validateSessionAdministrator(){
        // Si hay una sesión mostrar el perfil
        if($_SESSION['ID'] != null){
            if($_SESSION['PERFIL'] == 'Docente'){
                header('Location ../../Estudiantes/Vista/index.php');
            }
        }
    }

    public function salir(){
        // Si hay una sesión mostrar el perfil
        $_SESSION['ID'] = null;
        $_SESSION['NOMBRE'] = null;
        $_SESSION['PERFIL'] = null;
        session_destroy();
        header('Location: ../../index.php');
    }
}

