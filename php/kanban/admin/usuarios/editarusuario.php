<?php

include("../../../admin/conn.php");
session_start();

$id = $_POST['id'];
$name   = $_POST['name'];
$lastname = $_POST['lastname'];
$rol = $_POST['rol'];
$dpto = $_POST['dpto'];
$area = $_POST['area'];
$sede = $_POST['sede'];

if(isset($id) && isset($name) && isset($lastname) && isset($rol) && isset($dpto) && isset($area) && isset($sede)) {

$query = "UPDATE colaboradores SET name_colaborador = '$name', lastname_colaborador = '$lastname', roles_id = '$rol', departamento_id = '$dpto', area_id = '$area', sede_id = '$sede' WHERE id_colaborador = '$id'";

if($_SESSION['id_colaborador'] <> $id){

    if($conn->query($query)){
        echo "Operacion Exitosa!";
    }else{
        echo $conn->error;  
    }

}else{ echo "No puedes editar tu usuario actual!";}

}else{ echo "Llene todos los campos!";}

$conn->close();