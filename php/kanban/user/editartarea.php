<?php

include('../../admin/conn.php');
session_start();

$user = $_SESSION['id_colaborador'];
$sesionarea = $_SESSION['area_id'];
$sesiondpto = $_SESSION['departamerto_id'];
$sesionempresa = $_SESSION['empresa_id'];
$sesionsede = $_SESSION['sede_id'];

$id = $_POST['id'];
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
    $sql = "UPDATE tareas SET desc_tarea = '$desc', f_f_estimado = '$fin', tipo_tarea_id ='$ttarea' WHERE id_tarea ='$id'";
    if($conn->query($sql)){
        echo "Operacion Exitosa";
    }else { $conn->error; }
}

//Nivel 2

if($permiso == 4){
    $sql = "UPDATE tareas SET desc_tarea = '$desc', f_f_estimado = '$fin', tipo_tarea_id ='$ttarea', area_id= '$area' WHERE id_tarea ='$id' ";
    if($conn->query($sql)){
        echo "Operacion Exitosa";
    }else { $conn->error; }
}

//Nivel 3

if($permiso == 5){
    $sql = "UPDATE tareas SET desc_tarea = '$desc', f_f_estimado = '$fin', tipo_tarea_id ='$ttarea', area_id= '$area', departamento_id = '$dpto' WHERE id_tarea ='$id' ";
    if($conn->query($sql)){
        echo "Operacion Exitosa";
    }else { $conn->error; }
}

//Nivel 4

if($permiso == 6){
    $sql = "UPDATE tareas SET desc_tarea = '$desc', f_f_estimado = '$fin', tipo_tarea_id ='$ttarea', area_id= '$area', departamento_id = '$dpto', sede_id ='$sede' WHERE id_tarea ='$id' ";
    if($conn->query($sql)){
        echo "Operacion Exitosa";
    }else { echo $conn->error; }
}