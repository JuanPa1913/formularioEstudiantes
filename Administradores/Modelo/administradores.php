<?php

require_once('../../conexion.php');
class Administradores extends Conexion{
    public function __construct(){
        parent::__construct();
    }

    public function add($nombre,$apellido,$usuario,$password){
        $statement = $this->db->prepare("INSERT INTO usuarios (NOMBRE,APELLIDO,USUARIO,
        PASSWORD,PERFIL,ESTADO) VALUES (:nombre, :apellido, :usuario, :password,
         'Administrador','Activo')");
        $statement->bindParam(':nombre',$nombre);
        $statement->bindParam(':apellido',$apellido);
        $statement->bindParam(':usuario',$usuario);
        $statement->bindParam(':password',$password);
        if($statement->execute()){
            header('Location: ../Vista/index.php');
        }else{
            header('Location: ../Vista/add.php');
        }
    }

    //Info de los administradores
    public function get(){
        $rows = [];// Crea el arreglo
        $statement = $this->db->prepare("SELECT * FROM usuarios WHERE PERFIL = 'Administrador'");
        $statement->execute();
        //Recorre los resultados y se usa while porque no
        //sabemos la cantidad de recorrido sobre una sentencia
        while($result = $statement->fetch()){
            //Lo que nos traiga lo guardamos en result y luego en rows
            $rows[] = $result;
        }
        return $rows;
    }

        //Info de 1 administrador

    public function getById($id){
        $rows = [];// Crea el arreglo
        $statement = $this->db->prepare("SELECT * FROM usuarios WHERE PERFIL = 'Administrador' AND ID_USUARIO = :id");
        $statement->bindParam(':id',$id);
        $statement->execute();
        //Recorre los resultados y se usa while porque no
        //sabemos la cantidad de recorrido sobre una sentencia
        while($result = $statement->fetch()){
            //Lo que nos traiga lo guardamos en result y luego en rows
            $rows[] = $result;
        }
        return $rows;
    }

    public function update($id,$nombre,$apellido,$usuario,$password,$estado){
        $statement = $this->db->prepare("UPDATE usuarios SET NOMBRE = :nombre,
        APELLIDO = :apellido, USUARIO = :usuario, PASSWORD = :password, ESTADO = :estado
        WHERE ID_USUARIO = :id");
        $statement->bindParam(':id',$id);
        $statement->bindParam(':nombre',$nombre);
        $statement->bindParam(':apellido',$apellido);
        $statement->bindParam(':usuario',$usuario);
        $statement->bindParam(':password',$password);
        $statement->bindParam(':estado',$estado);
        if($statement->execute()){
            header('Location: ../Vista/index.php');
        }else{
            header('Location: ../Vista/edit.php');
        }
    }

    public function delete($id){
        $statement = $this->db->prepare("DELETE FROM  usuarios WHERE ID_USUARIO = :id");
        $statement->bindParam(':id',$id);
        if($statement->execute()){
            header('Location: ../Vista/index.php');
        }else{
            header('Location: ../Vista/delete.php');
        }
    }
}
