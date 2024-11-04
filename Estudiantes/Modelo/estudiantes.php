<?php

require_once('../../conexion.php');
class Estudiantes extends Conexion{
    public function __construct(){
        parent::__construct();
    }

    public function add($nombre,$apellido,$documento,$correo,$materia,$docente,$promedio,$fecha){
        $statement = $this->db->prepare("INSERT INTO estudiantes (NOMBRE,APELLIDO,DOCUMENTO,
        CORREO,MATERIA,DOCENTE,PROMEDIO,FECHA_REGISTRO)
        VALUES (:nombre, :apellido, :documento, :correo,:materia,:docente,:promedio,:fecha)");
        $statement->bindParam(':nombre',$nombre);
        $statement->bindParam(':apellido',$apellido);
        $statement->bindParam(':documento',$documento);
        $statement->bindParam(':correo',$correo);
        $statement->bindParam(':materia',$materia);
        $statement->bindParam(':docente',$docente);
        $statement->bindParam(':promedio',$promedio);
        $statement->bindParam(':fecha',$fecha);
        if($statement->execute()){
            header('Location: ../Vista/index.php');
        }else{
            header('Location: ../Vista/add.php');
        }
    }

    //Info de los administradores
    public function get(){
        $rows = [];// Crea el arreglo
        $statement = $this->db->prepare("SELECT * FROM estudiantes");
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
        $statement = $this->db->prepare("SELECT * FROM estudiantes WHERE ID_ESTUDIANTE = :id");
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

    public function update($id,$nombre,$apellido,$documento,$correo,$materia,$docente,$promedio,$fecha){
        $statement = $this->db->prepare("UPDATE estudiantes SET NOMBRE = :nombre,
        APELLIDO = :apellido, DOCUMENTO = :documento, CORREO = :correo,
        MATERIA = :materia, DOCENTE = :docente, PROMEDIO = :promedio, FECHA_REGISTRO = :fecha
        WHERE ID_ESTUDIANTE = :id");
        $statement->bindParam(':id',$id);
        $statement->bindParam(':nombre',$nombre);
        $statement->bindParam(':apellido',$apellido);
        $statement->bindParam(':documento',$documento);
        $statement->bindParam(':correo',$correo);
        $statement->bindParam(':materia',$materia);
        $statement->bindParam(':docente',$docente);
        $statement->bindParam(':promedio',$promedio);
        $statement->bindParam(':fecha',$fecha);
        if($statement->execute()){
            header('Location: ../Vista/index.php');
        }else{
            header('Location: ../Vista/edit.php');
        }
    }

    public function delete($id){
        $statement = $this->db->prepare("DELETE FROM estudiantes WHERE ID_ESTUDIANTE = :id");
        $statement->bindParam(':id',$id);
        if($statement->execute()){
            header('Location: ../Vista/index.php');
        }else{
            header('Location: ../Vista/delete.php');
        }
    }
}

