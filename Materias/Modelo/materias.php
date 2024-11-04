<?php

require_once('../../conexion.php');
class Materias extends Conexion{
    public function __construct(){
        parent::__construct();
    }

    public function add($materia){
        $statement = $this->db->prepare("INSERT INTO materias (MATERIA)
         VALUES (:materia)");
        $statement->bindParam(':materia',$materia);
        if($statement->execute()){
            header('Location: ../Vista/index.php');
        }else{
            header('Location: ../Vista/add.php');
        }
    }

    //Info de los administradores
    public function get(){
        $rows = [];// Crea el arreglo
        $statement = $this->db->prepare("SELECT * FROM materias");
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
        $statement = $this->db->prepare("SELECT * FROM materias WHERE ID_MATERIA = :id");
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

    public function update($id,$materia){
        $statement = $this->db->prepare("UPDATE materias SET MATERIA = :materia
        WHERE ID_MATERIA = :id");
        $statement->bindParam(':id',$id);
        $statement->bindParam(':materia',$materia);
        if($statement->execute()){
            header('Location: ../Vista/index.php');
        }else{
            header('Location: ../Vista/edit.php');
        }
    }

    public function delete($id){
        $statement = $this->db->prepare("DELETE FROM materias WHERE ID_MATERIA = :id");
        $statement->bindParam(':id',$id);
        if($statement->execute()){
            header('Location: ../Vista/index.php');
        }else{
            header('Location: ../Vista/delete.php');
        }
    }
}
