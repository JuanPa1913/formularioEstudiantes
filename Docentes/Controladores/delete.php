<?php

require_once('../Modelo/docentes.php');

if ($_POST) {
    $ModeloDocentes = new Docentes();
    $id = $_POST['id'];
    $ModeloDocentes->delete($id);
} else {
    header('Location: ../../index.php');
}
