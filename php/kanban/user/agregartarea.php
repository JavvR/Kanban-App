<?php

include('../../admin/conn.php');
session_start();

$user = $_SESSION['id_colaborador'];
$sesionarea = $_SESSION['area_id'];
$sesiondpto = $_SESSION['departamento_id'];
$sesionempresa = $_SESSION['empresa_id'];
$sesionsede = $_SESSION['sede_id'];


$desc = $_POST['desc'];
$ttarea = $_POST['ttarea'];
$sede   = $_POST['sede'];
$dpto = $_POST['dpto'];
$area = $_POST['area'];
$asig = $_POST['asig'];
$fin = $_POST['fin'];

$permiso = $_POST['permiso'];

//Nivel 1
if($permiso == 3){
    $sql = "INSERT INTO tareas VALUES (NULL, '$desc', '$asig', NULL, '$fin', NULL, NULL, '$sesionarea', '$sesiondpto', '$sesionempresa', '$ttarea', 1, '$sesionsede' )";
    if($conn->query($sql)){
        echo "Operacion Exitosa";
    }else { $conn->error; }
}

//Nivel 2

if($permiso == 4){
    $sql = "INSERT INTO tareas VALUES (NULL, '$desc', '$asig', NULL, '$fin', NULL, NULL, '$area', '$sesiondpto', '$sesionempresa', '$ttarea', 1, '$sesionsede')";
    if($conn->query($sql)){
        echo "Operacion Exitosa";
    }else { $conn->error; }
}

//Nivel 3

if($permiso == 5){
    $sql = "INSERT INTO tareas VALUES (NULL, '$desc', '$asig', NULL, '$fin', NULL, NULL, '$area', '$dpto', '$sesionempresa', '$ttarea', 1, '$sesionsede')";
    if($conn->query($sql)){
        echo "Operacion Exitosa";
    }else { $conn->error; }
}

//Nivel 4

if($permiso == 6){
    $sql = "INSERT INTO tareas VALUES (NULL, '$desc', '$asig', NULL, '$fin', NULL, NULL, '$area', '$dpto', '$sesionempresa', '$ttarea', 1, '$sede')";
    if($conn->query($sql)){
        echo "Operacion Exitosa";
    }else { echo $conn->error; }
}
