<?php

require_once('Conexion.php');
class Metodos extends Conexion{
    public function __construct(){
        parent::__construct();
    }
    //Info de los administradores
    public function getMaterias(){
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

    public function getDocentes(){
        $rows = [];// Crea el arreglo
        $statement = $this->db->prepare("SELECT * FROM usuarios WHERE PERFIL = 'Docente'");
        $statement->execute();
        //Recorre los resultados y se usa while porque no
        //sabemos la cantidad de recorrido sobre una sentencia
        while($result = $statement->fetch()){
            //Lo que nos traiga lo guardamos en result y luego en rows
            $rows[] = $result;
        }
        return $rows;
    }
}
